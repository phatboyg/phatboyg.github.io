---
author: chris
comments: true
date: 2008-07-07 22:46:57+00:00
layout: post
slug: another-masstransit-release-coming-soon
title: Another MassTransit Release Coming Soon
wordpress_id: 656
categories:
- .NET
- C#
- MassTransit
- MSMQ
---

Over the past few weeks, Dru and I have been working on the next release of MassTransit. The current release (0.2) has been beat on pretty hard and is currently seeing some active use in the field. There were a few tweaks made after the initial 0.2 drop to address some issues that popped up.

One of the really cool new features coming in the next release is the ability to automatically wire publishing into the consumers. By implementing a new interface, the service bus will automatically attach the appropriate plumbing into the consumer at the time of creation to handle the publishing of messages back out of the consumer. The new Produces<T> interface helps to insulate your code from the IServiceBus interface by relying only on the new interface on your message handler class.

For example, take a look at the following class:

{% highlight csharp %}\npublic class OrderService :
Consumes.All,
Produces
{
private Consumes.All _orderCreatedConsumer;

public void Consume(CreateOrder message)
{
/* Do the order work here */
_orderCreatedConsumer.Consume(new OrderCreated());
}

public void Attach(Consumes.All consumer)
{
_orderCreatedConsumer = consumer;
}
}{% endhighlight %}

The ServiceBus will automatically call Attach() to connect a publishing consumer to the class when it is created from the container (so this only works with AddComponent<> style message handlers). These helpers classes will take the call to Consume(new OrderCreated()) and route it through the bus and out to any subscribed consumers without knowing about the actual bus itself. This also makes it easy to use the same message handler with multiple IServiceBus instances if you are listening to multiple endpoints.

This is just one of the new things coming soon that I'm pretty excited about. There are a few others, but that will be the subject of a later post.
