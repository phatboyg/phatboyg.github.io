---
author: chris
comments: true
date: 2007-02-27 16:35:57+00:00
layout: post
slug: microsoft-net-30-sdk
title: Microsoft .NET 3.0 SDK
wordpress_id: 482
categories:
- Software Development
- Vista
- Windows
---

Last night I pulled down the latest RTM version of the Microsoft .NET 3.0 SDK, along with the integration tools to VS2005. At the [TulsaDevelopers.NET](http://www.TulsaDevelopers.NET/) user group meeting, BJ Pohl gave a demo on Workflow Foundation. When I first saw the technology, it was still pretty green. The latest stuff he put on the screen seemed to have a little more life to it. Since you can also define workflow via XML, it makes me wonder how you could allow end-users to define their own workflow and then dynamically handle that workflow at runtime.

Of course, the real issue with workflow is the expiration-style rules, such as an item sitting in a state for too long. Once I figure that out, I might have to look at how this could be deployed for a scalable application with multiple clients -- each with their own idea of how workflow should (cough) work.

I've also been wanting to look at WCF and the dynamic bindings for internal communication over binary/TCP instead of dealing with the web service wrapper.
