---
author: chris
comments: true
date: 2008-09-03 15:21:26+00:00
layout: post
slug: masstransit-03-released
title: MassTransit 0.3 Released
wordpress_id: 691
categories:
- .NET
- MassTransit
- MSMQ
tags:
- esb
- MassTransit
- MSMQ
---

[Download MassTransit 0.3 Here](http://code.google.com/p/masstransit/downloads/list)

Last night, Dru and I released version 0.3 of MassTransit. This is a pretty hefty milestone release with a lot of new functionality. I'm going to run down a list of some of the new features that made it into this version.



	
  * Fault Messages
If a Consumer throws an exception, a Fault<T> message will be published. The Fault envelope will contain the exception that was thrown, along with the message that caused the exception. 

	
  * Loopback Endpoint
To support in-process communication, a loopback endpoint was created. This is entirely in memory and does not have any persistence support. But it makes it easy to test features of the system without requiring MSMQ and also makes for some interesting application design choices for dispatching work.

	
  * Thread Pool Configuration
As part of the Windsor facility, the thread pool size for dispatching messages can be configured.

	
  * Batch Message Threading
Dispatching batch messages using Batch<T> now uses a separate thread for each batch being consumed instead of using one of the dispatcher threads. This should avoid thread starvation under heavy message loads.

	
  * Message Groups
To allow messages to be grouped and sent as a single message (a coarse-grained style of messaging outlined in Fowler's PoEAA), a new container-style MessageGroup allows a set of messages to be combined into one message and delivered. The consumer can then choose to handle the messages as a group (for unit-of-work style operations) or to split the messages out and dispatch them individually.

	
  * Saga Support
Long-lived transactions (Saga) are now supported and can be built using MassTransit. You can read all about that on my[ previous blog entry](http://blog.phatboyg.com/2008/08/28/managing-long-lived-transactions-with-masstransitsaga/). 

	
  * Grid Support
New support for distributed tasks via MassTransit has been added. This makes it easy to create distributed applications that process large amounts of data. A good sample is in the works, but presently it uses some fairly proprietary and confidential data so I can't just hand that out as a sample. The structure makes it fairly easy to write a MapReduce style log analyzer though, if that gives you any ideas.

	
  * Internal Changes
A number of internal, under-the-hood changes took place. The dispatchers were rewritten to be insulated from each bus instance to enable a shared type information cache. There were also some tweaks in how dispatchers are plugged into the pipeline to make it easier to open the extensibility model for new types of dispatchers (such as the saga dispatcher that was just added).

	
  * WinForm Sample
A new sample showing how the use the service bus in a WinForm application was built. This includes a nice visual SubscriptionManager GUI to help see the subscriptions as they are added and removed by an application.

	
  * Host Changes
To make it easier to build Windows services containing message handlers, the Host project was updated with a cleaner style. The PubSub and WinFormSample/SubscriptionManagerGUI have been converted to this new structure and it was pretty easy for me to add (having never seen it before).


Those are the big hits, I'm sure there are some minor things I've missed. We'll try to update the road map this week to give a picture of where we are and what we have left to get done. It's likely that 0.3 will get a few days of soak time before we gear up for the next release anyway.

It's important to note that all development is now being done in VS2008 (using .NET 3.5 for the test projects) but the main assemblies are still .NET 2.0 targets. It's like that this will change in the next version or two considering most of the projects are trending towards the new platform.
