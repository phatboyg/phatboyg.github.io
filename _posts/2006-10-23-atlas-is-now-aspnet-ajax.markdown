---
author: chris
comments: true
date: 2006-10-23 03:05:21+00:00
layout: post
slug: atlas-is-now-aspnet-ajax
title: Atlas is now ASP.NET AJAX
wordpress_id: 410
categories:
- Software Development
---

Microsoft released ASP.NET AJAX, the official release of Atlas. In this release, they've broken the library up into multiple parts, focusing on releasing what works and continuing to refine what doesn't. Fortunately, they recognize the community needs for an easy-to-implement method of adding AJAX functionality to ASP.NET web applications.

The changes were hard on some of us that had seriously leveraged the Atlas framework in our applications. As such, I'm basically having to learn the core AJAX ASP.NET library from scratch. A huge number of root-level changes has managed to break a lot of code that had been written. I'm not saying the changes are bad, they are in fact very good and more friendly to accepted coding standards, but you take a hit when you get deep into something like Atlas.

Hopefully I can dig out in the next few days, but I've spent almost three days straight trying to work with the new release and found roadblock after roadblock. Better memory examination tools would most certainly help, but I feel like the new library is holding onto object references much longer than it should and it's breaking page functionality in my applications.

Don't take the obvious frustration at more than what it is -- frustration. I think the framework has a lot of potential and the changes recently show the level of focus the Atlas team has towards making it a first-class solution for AJAX. It's just a tough ride for those that got on the boat early!
