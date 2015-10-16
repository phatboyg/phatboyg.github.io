---
author: chris
comments: true
date: 2015-02-24 20:33:54+00:00
layout: post
slug: masstransit-v3-ga
title: MassTransit 3 General Availability
categories:
- .NET
- Azure Service Bus
- C#
- MassTransit
- RabbitMQ
---

MassTransit 3 has been generally available for over a week now, and the response has been very positive. Based on mailing list activity, direct email, and the overall feedback many developers are updating their applications to the new version.

It's a great feeling to roll out a release that has been years in the making.

## TL;DR I want the bits!

The packages are available on [NuGet](https://nuget.org/packages/MassTransit), you can search for the various transport and supporting packages.

The source is available on [GitHub](https://github.com/MassTransit), with tags on the versioned releases.

The documentation [has been updated](http://docs.masstransit-project.com/en/master/) with all the latest details, including an all new using section that covers many of the existing and new capabilities. So check it out.


## Three years in the making

Some of the first commits that formed the new messaging pipeline were first made over three years ago -- back in August of 2012. What started as an exploration leveraging the Task Parallel Library (TPL) to create a composable middleware pipeline ultimately became the foundation of an entire rewrite.

> The first MassTransit 2 release was in September, 2011.

MassTransit 3 is almost one-hundred-percent new code, there are few lines of the previous version that remain unchanged. While a rewrite of this scale is often a disaster, MassTransit 3 is proving to be solid and capable -- ready to take on a new era of asynchronous software development on the .NET platform.

Many of the new features that are integrated with MassTransit 3 came from separate projects that were built on top of v2. The scheduling integration with Quartz, routing slip coordination with Courier, the powerful state machine engine Automatonymous -- all of these are now built-in and first class features of MassTransit.


## Designed for modern deployment

So many applications are built and deployed in the cloud, and MassTransit is fully enabled to support SaaS strategies. In fact, MassTransit powers many cloud platforms in numerous market segments. Including health care, big shock!

The asynchronous underpinnings of MassTransit 3 are perfectly aligned with the distributed, transient nature of cloud-based applications, with support for RabbitMQ (including CloudAMQP) and Azure Service Bus (with on-premise Windows Service Bus support forthcoming).


## Speaking engagements

On a personal note, I will be speaking at [.NET Unboxed](http://www.letsunbox.net/) in a couple of weeks, showing how MassTransit can be used to break apart tightly-coupled systems into distributed applications using many of the new features to coordinate, track, and monitor the chaos of "micro-services."

I'll also be at the MVP Summit in November, so if you're in the Redmond area stop by and say, "Hi." Or, if you live in the Bay Area, check out the Bay.NET user group for an upcoming meetup.

## Enjoy!

