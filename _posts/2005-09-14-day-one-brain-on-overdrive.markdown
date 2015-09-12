---
author: chris
comments: true
date: 2005-09-14 03:53:13+00:00
layout: post
slug: day-one-brain-on-overdrive
title: Day One, Brain on Overdrive
wordpress_id: 158
categories:
- Software Development
---

First off, the keynote was great. A lot of good laps around the new features in that session alone. And it was quite comfortable, I might add. :)

Lunch was quick, and I then went into a detailed lap around the new WCF (Indigo) and how it works. This was interesting, a lot of neat ideas here on making applications and services that talk to each other. They even spent time talking about how to make it expose pure XML (ala RSS) and accept regular web service data from other locations (such as Amazon). Neat stuff.

The next session I attended had to do with the new service broker architecture on SQL Server 2005. This was interesting, they've implemented a complete queuing architecture on top of SQL Server. So you can (within a stored procedure, or whatever T-SQL) create a conversation and queue requests with it. After that, you can have the queued actions handled asynchronously by stored procedures, C# code, or even code running on another (yes, even non-SQL) machine. A neat idea to add SQL to the message queuing systems, but nothing that I would want to use in a highly transactional system. Why? Because the transaction continues even across the remove execution. It's early yet, but I'll keep an eye on how this develops and how it is used. One thing about it, however, it's very well thought out.

The final session for the day had to do with concurrent programming, particularly multithreading and dealing with locks between threads. It's interesting how the new processor architectures handle locks and threading. What was really interesting that without proper metrics on thread usage, it's impossible to be sure your locks are rescheduling properly. So that's an exercise for sure. Of course, it's "JustWorks" in .NET 2.0. A lot of low-level stuff here, some really good detail.

After the sessions, the expo reception featured a variety of food and other free drinks (coke on the rocks, my favorite). I spoke with a lot of vendors and got some interesting information on upcoming features (mostly from Microsoft). I also got some inside scoop on some things that are coming soon, and not so soon.

Today is a couple of keynotes and more sessions, so I'll report back more on that later in the day.



