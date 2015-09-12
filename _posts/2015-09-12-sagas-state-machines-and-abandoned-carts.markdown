---
author: chris
comments: true
date: 2015-09-12 02:36:48+00:00
layout: post
slug: sagas-state-machines-and-abandoned-carts
title: Sagas, State Machines, and Abandoned Carts
wordpress_id: 2429
categories:
- General
---

A few weeks ago, there was a [post](http://joshkodroff.com/blog/2015/08/21/an-elegant-abandoned-cart-email-using-nservicebus/) on how to use a saga to coordinate the business requirement of sending an email when a shopping cart is abandoned by a user. The use case demonstrated is fairly common, particularly if you generalize the solution.





While a general solution can be extracted from the subject matter, I wanted to see how the same approach could be taken using an [Automatonymous](https://github.com/MassTransit/Automatonymous) state machine and [MassTransit](https://github.com/MassTransit/MassTransit).





TL;DR - [Go to the Sample Code](https://github.com/MassTransit/Sample-ShoppingWeb)





# The General Idea





The idea is that through purely observing the events of a shopping cart, an external system could determine when a potential customer has added items to their cart only to abandon the cart after a period of time. Once the cart was abandoned, a separate event would trigger a process to send the user an email asking them to come back and spend some of those hard earned dollars on some swag.





# The Implementation





The sample was built using MassTransit, RabbitMQ, and Automatonymous, as well as using Entity Framework to persist the _state_ of the state machine and using Quartz to schedule the timeout event.





## The Observed Events





A few events are needed to allow the cart activity to be observed. These would be produced by the web application, so a _Shopping.Web_ site was created in the sample. My UI chops are terrible, but what a beautiful web site the template generator creates! The _CartController_ is the majority of the work here. The events are simple interfaces, one for an item being added to the cart and another for when an order is submitted.




    
{% highlight csharp %}
public interface CartItemAdded
{
    DateTime Timestamp { get; }
    string UserName { get; }
}

public interface OrderSubmitted
{
    Guid OrderId { get; }
    DateTime Timestamp { get; }
    Guid CartId { get; }
    string UserName { get; }
}
{% endhighlight %}





## The State Machine





To design the business logic, a state machine is created using Automatonymous. The state machine defines the events observed, how the events are correlated, and the behavior of events in each state. But first, the actual state to be persisted should be defined.




    
{% highlight csharp %}
public class ShoppingCart :
    SagaStateMachineInstance
{
    public string CurrentState { get; set; }
    public string UserName { get; set; }
    public DateTime Created { get; set; }
    public DateTime Updated { get; set; }
    public Guid? ExpirationId { get; set; }
    public Guid? OrderId { get; set; }
    public Guid CorrelationId { get; set; }
}
{% endhighlight %}





The _ShoppingCart_ is a class, which will be persisted using Entity Framework. The code-first map is in the project, so you can check that out yourself. Now, the state machine.




    
{% highlight csharp %}
public class ShoppingCartStateMachine :
    MassTransitStateMachine<ShoppingCart>
{
    public ShoppingCartStateMachine()
    {
        InstanceState(x => x.CurrentState);
{% endhighlight %}





The state machine class, and the specification of the property for the current state of the machine are defined first.




    
{% highlight csharp %}
        Event(() => ItemAdded, x => x.CorrelateBy(cart => cart.UserName, context => context.Message.UserName)
            .SelectId(context => Guid.NewGuid()));
{% endhighlight %}





The event that is observed when an item is added to the cart, along with the correlation between the state machine instance and the message are defined. The id generator for the saga instance is also defined.




    
{% highlight csharp %}
        Event(() => Submitted, x => x.CorrelateById(context => context.Message.CartId));
{% endhighlight %}





The order submitted event, and the correlation for that order.




    
{% highlight csharp %}
        Schedule(() => CartExpired, x => x.ExpirationId, x =>
        {
            x.Delay = TimeSpan.FromSeconds(10);
            x.Received = e => e.CorrelateById(context => context.Message.CartId);
        });
{% endhighlight %}





In order to schedule the timeout, a schedule is defined, including the time delay for the scheduled event, and the correlation of the event back to the state machine.





Now, it is time for the actual behavior of the events and how they interact with the state of the _ShoppingCart_.




    
{% highlight csharp %}
        Initially(
            When(ItemAdded)
                .Then(context =>
                {
                    context.Instance.Created = context.Data.Timestamp;
                    context.Instance.Updated = context.Data.Timestamp;
                    context.Instance.UserName = context.Data.UserName;
                })
                .ThenAsync(context => Console.Out.WriteLineAsync($"Item Added: {context.Data.UserName} to {context.Instance.CorrelationId}"))
                .Schedule(CartExpired, context => new CartExpiredEvent(context.Instance))
                .TransitionTo(Active)
            );
{% endhighlight %}





Initially defined events that can create a state machine instance. In the above, the properties of the instance are initialized, and then the _CartExpired_ event is scheduled, after which the state is set to _Active_.




    
{% highlight csharp %}
        During(Active,
            When(Submitted)
                .Then(context =>
                {
                    if (context.Data.Timestamp > context.Instance.Updated)
                        context.Instance.Updated = context.Data.Timestamp;
                    context.Instance.OrderId = context.Data.OrderId;
                })
                .ThenAsync(context => Console.Out.WriteLineAsync($"Cart Submitted: {context.Data.UserName} to {context.Instance.CorrelationId}"))
                .Unschedule(CartExpired)
                .TransitionTo(Ordered),
{% endhighlight %}





While the shopping cart is active, if the order is submitted, the expiration is canceled (via _Unschedule_) and the state is set to Ordered.




    
{% highlight csharp %}
            When(ItemAdded)
                .Then(context =>
                {
                    if (context.Data.Timestamp > context.Instance.Updated)
                        context.Instance.Updated = context.Data.Timestamp;
                })
                .ThenAsync(context => Console.Out.WriteLineAsync($"Item Added: {context.Data.UserName} to {context.Instance.CorrelationId}"))
                .Schedule(CartExpired, context => new CartExpiredEvent(context.Instance)),
{% endhighlight %}





If another item is added to the cart, the _CartExpired_ event is scheduled, and the existence of a previously scheduled event (via the _ExpirationId_ property) is used to cancel the previously scheduled event.




    
{% highlight csharp %}
            When(CartExpired.Received)
                .ThenAsync(context => Console.Out.WriteLineAsync($"Item Expired: {context.Instance.CorrelationId}"))
                .Publish(context => new CartRemovedEvent(context.Instance))
                .Finalize()
            );
{% endhighlight %}





If the _CartExpired_ event is received, the cart removed event is published and the shopping cart is finalized.




    
{% highlight csharp %}
        SetCompletedWhenFinalized();
    }
{% endhighlight %}





Signals that the state machine instance should be deleted if it is finalized. This is used to tell Entity Framework to delete the row from the database.




    
{% highlight csharp %}
    public State Active { get; private set; }
    public State Ordered { get; private set; }
{% endhighlight %}





The states of the shopping cart (_Initial_ and _Final_ are built-in states).




    
{% highlight csharp %}
    public Schedule<ShoppingCart, CartExpired> CartExpired { get; private set; }
{% endhighlight %}





The schedule definition for the CartExpired event.




    
{% highlight csharp %}
    public Event<CartItemAdded> ItemAdded { get; private set; }
    public Event<OrderSubmitted> Submitted { get; private set; }
}
{% endhighlight %}





The events that are observed by the state machine (the correlations are defined earlier in the state machine).





## The Plumbing





To connect the state machine to a bus endpoint, the saga repository is declared, and then the machine and repository are connected to the receive endpoint.




    
{% highlight csharp %}
_machine = new ShoppingCartStateMachine();

SagaDbContextFactory sagaDbContextFactory = () => 
    new SagaDbContext<ShoppingCart, ShoppingCartMap>(SagaDbContextFactoryProvider.ConnectionString);

_repository = new Lazy<ISagaRepository<ShoppingCart>>(
    () => new EntityFrameworkSagaRepository<ShoppingCart>(sagaDbContextFactory));
{% endhighlight %}





Once the machine and repository are declared, the receive endpoint is declared on the bus configuration.




    
{% highlight csharp %}
_busControl = Bus.Factory.CreateUsingRabbitMq(x =>
{
    IRabbitMqHost host = x.Host(...);

    x.ReceiveEndpoint(host, "shopping_cart_state", e =>
    {
        e.PrefetchCount = 8;
        e.StateMachineSaga(_machine, _repository.Value);
    });

    x.ReceiveEndpoint(host, "scheduler", e =>
    {
        x.UseMessageScheduler(e.InputAddress);

        e.PrefetchCount = 1;

        e.Consumer(() => new ScheduleMessageConsumer(_scheduler));
        e.Consumer(() => new CancelScheduledMessageConsumer(_scheduler));
    });
});
{% endhighlight %}





There are two endpoints on the tracking service bus, and both are shown as the message scheduler needs to be setup (using Quartz). Refer to the source for the details of configuring and starting the Quartz scheduler, but multiple endpoints can be setup on the bus.





The key line is the registration:




    
{% highlight csharp %}
e.StateMachineSaga(_machine, _repository.Value);
{% endhighlight %}





That's where the state machine is connected to the endpoint. All of the events in the state machine are added to the exchange bindings in RabbitMQ so the events, when published, make it to the queue for processing by the state machine. It's important to point out that:




    
{% highlight csharp %}
x.UseMessageScheduler(e.InputAddress);
{% endhighlight %}





Is special, in that it's configuring the bus to use the message scheduler on the _scheduler_ receive endpoint. The subtle references to _x_ and _e_ aren't obvious, but the input address of the endpoint is passed to the bus. Configuration in MassTransit is evaluated _after_ it is all defined, so it's possible to do crazy stuff like this.





# Enough Already





This post has already gotten far too long, but I really wanted to share the experience of building an event-driven work flow using a state machine. I think the experience for a developer is pretty clean and easy to understand.





Check out the source: [Go to the Sample Code](https://github.com/MassTransit/Sample-ShoppingWeb)





Share your thoughts!
