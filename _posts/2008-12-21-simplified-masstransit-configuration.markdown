---
author: chris
comments: true
date: 2008-12-21 06:19:47+00:00
layout: post
slug: simplified-masstransit-configuration
title: Simplified MassTransit Configuration
wordpress_id: 732
categories:
- .NET
- MassTransit
---

One of the things I've missed since we integrated container support is the ability to quickly and easily create an instance of the ServiceBus. After Ayende agreed, I decided it was time to do something about it.

Behold the minimum amount of code necessary to create a service bus:

{% highlight csharp %}
	IObjectBuilder objectBuilder = YourContainer;

	IEndpointFactory endpointFactory = EndpointFactoryConfigurator.New(x =>
		{
			x.SetObjectBuilder(objectBuilder);
			x.RegisterTransport< MsmqEndpoint >();
		});

	// add the endpointFactory to your container

	IServiceBus bus = ServiceBusConfigurator.New(x => 
		{
			x.SetObjectBuilder(objectBuilder);
			x.ReceiveFrom("msmq://localhost/mt_client"); 
		});

{% endhighlight %}

That's it. In fact, you can easily mock out the container with some nifty Rhino.Mocks usage:

{% highlight csharp %}
	ObjectBuilder = MockRepository.GenerateMock< IObjectBuilder >();

	ISubscriptionCache subscriptionCache = new LocalSubscriptionCache();
	ObjectBuilder.Stub(x => x.GetInstance< ISubscriptionCache >())
		.Return(subscriptionCache);

	ITypeInfoCache typeInfoCache = new TypeInfoCache();
	ObjectBuilder.Stub(x => x.GetInstance< ITypeInfoCache >())
		.Return(typeInfoCache);

	ObjectBuilder.Stub(x => x.GetInstance< IEndpointFactory >())
		.Return(endpointFactory);

{% endhighlight %}

I'm starting to convert the tests to use the mocked container approach to reduce the runtime of the tests. But so far the HeavyLoad, Starbucks and WinFormSample samples have been verified to work with the new model. The Windsor facility is also using the new model (Dru is going to update the other two tomorrow).

I'm pretty happy with the new configuration syntax, it certainly makes it easier to setup a bus with zero XML abuse. Look for more of this style of configuration/extension in MT in the near future.
