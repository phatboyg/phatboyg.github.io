---
author: chris
comments: true
date: 2006-06-25 14:36:52+00:00
layout: post
slug: dallas-code-camp-report
title: Dallas Code Camp Report
wordpress_id: 354
categories:
- Software Development
---

The [Dallas Code Camp](http://www.dallascodecamp.com/) on Saturday was a lot of fun, mixed with some good learning. There were roughly 100-150 people there, all developers working with Microsoft technologies (yes, even the Mono/Boo guy). The event took place at the Microsoft offices in Dallas (off Highway 161) -- a very nice facility on the west side of Dallas close to the DFW airport.

Logistics were great, the team did an excellent job of organizing the events, setting up the schedule, keeping people informed and generally making sure that everyone had what they needed to find their way around. Security was tight (wouldn't want to let that secret Vista ship date out of the bag I presume) and all attendees were escorted from the rooms to the elevators with no wandering around. The room setup was nice, Microsoft several classrooms size MPRs (multi-purpose rooms) with multiple adjacent "chalk-talk" rooms (linear table with power/network and a projector, lots of whiteboard space). Mixed in between those they had chat rooms, small rooms with whiteboards on the walls and a window to the world to allow people to work through a topic without disturbing others -- another way of fostering brainstorming in the workspace. Overall setup of the office was very nice, I was impressed.

A very interesting side discussion with some folks made me aware of something called [CruiseControl](http://cruisecontrol.sourceforge.net/). It is a open-source framework for a continuous build process. This is an aspect of agile software development that seems very appealing. It detects when developers check-in code, automatically builds the changes and runs NUnit tests to report any issues. [NUnit ](http://www.nunit.org/)is a unit-testing framework for all .Net languages. NUnit facilities test-driven development (TDD), a solid principle to maintain the functionality of your components and assemblies over the lifetime of a project. TDD involves writing the code to test the assembly first, followed by the the actual code itself. The test framework built into the code facilitates the automated testing in CruiseControl and contributes to greater overall stability in a code library and easier detection of defects. It also avoids the usual lack of testing at the end of a software development cycle. Something very useful for software organizations today who expect their code to live beyond the next year. Another piece to this puzzle is [Nant](http://nant.sourceforge.net/), a free open-source build tool for .Net technologies.

**Session 1: Asynchronous Web Services to Increase Scalability **(John Davis)**
**

The first session I attended was a talk about using the AsyncResult and BeginXXX and EndXXX calls in web service code. However, this really applies to any ASP.Net code that runs in an application pool. Basically, the thread pool for ASP.Net applications defaults to 25. If your pages are linking to external data sources (for instance, SQLReaders, FileReaders, Sockets, Web Services, etc.) and those sources can take any amount of time to return (on a dual-core 2.4 GHz CPU, 100ms is a lot of time) you should be using asynchronous method invocation to free the ASP.Net thread for other requests. By keeping the number of blocked threads in ASP.Net low, you increase the overall throughput of that individual web server. You also keep things more efficient by using the OS scheduler the way it was intended and has been using by numerous services in NT/2000/2003 to keep the internal OS features responsive. No slides, all whiteboard, good stuff.

**Session 2: Converting ASP to .NET 1.1 and 2.0 **(David Walker)

This session presented by Tulsa's own David Walker discussed the hurdles encountered converting an ASP web site to ASP.Net. This was a social session, no code and no slides, but an open exchange of problems encountered during the transition. The focus was more on the older web style having tons of code within the ASP pages themselves and moving that code to an n-tier model of putting the actual logic into components/assemblies to keep the code beside clean and free of business logic. Some good example cases were shared, including how to get code out of classic ASP quickly and into the .Net runtime. I'm going to try some of things that were discussed with our application to see if it really is that easy. If it really ends up being that easy, I'll be pleasantly surprised.

**Lunch Panel (everyone)**

During lunch (Subway was provided!), all the session hosts got together and talked a bit, took questions, and had an overall good time while at the same time providing some good information. Many of the speakers were Microsoft MVPs or at one time worked for Microsoft. Several were independent consultants, offering their knowledge to companies wanting to learn about their field of expertise.

**Session 3: Visual Studio Team System **(Dave McKinstry)

This was an interesting presentation, one that makes me wonder about how using VTS might help us. VTS is an enterprise-level system that includes everything from artifact tracking (SharePoint), Bug/Defect/Requirement work item tracking and workflow, source control, unit testing and more. It was reiterated that Visual SourceSafe is designed for development teams of five or less (ouch!) and becomes unstable when the database exceeds a few gigabytes. The cost of admission is high ($30,000 or so) so it is often difficult to justify the expense. With the highly available open-source solutions for unit testing, build automation, and source control, it becomes even more difficult to justify. However, VTS is actually being used by MS internally for several large projects whereas they have never used SourceSafe (they use SourceDepot). The discussion was fairly interactive with the product and I got to see some very useful features. It also has full build integration, but I don't think out-of-the-box it compares to using CruiseControl.

**Session 34 (don't ask): Enterprise Library **(Dave McKinstry)

This was an introduction to the Microsoft Enterprise Library. I try not to fault the presenter as it appeared he took this from something he did for another event, but too many slides. Just show the code next time, we only had 1:10 to cover it and we went over the limit. There were some nice things in the library, but the devil is always in the details. I'm sure that any .Net development we do will certainly take advantage of the Logging application block, that things flat-out rocks. The database block seems simple enough that it might be worth the use as well. I haven't checked out the security block, but it sounds like it's in the right places. Unfortunately that's all we got to see as time ran out.

**Wrap Up**

Once the sessions were done, we all met back up in the MPR for the drawings and closing comments. A ton of books were awarded (I got one, ASP.NET 2.0 something), some thumb drives, t-shirts, twinkies, a few copies of Infragistics (sp) tools for SharePoint ($1000/each retail), two copies of Visual Studio Professional (anyone check eBay yet?), a Weber charcoal grill (which I'm glad I didn't win, I drove the Spyder), and an XBOX 360 Premium (which would have been a nice win, but I didn't). Caleb Jenkins (Microsoft Developer Evangelist) did an excellent job running the event and provided a great pool of prizes.

Overall, it was well worth the drive to meet some new people, learn a few new things, and to partake in what I hope is the first of many regional developer events to come. I know there will be a Tulsa event in October, hosted by [TulsaDevelopers.net](http://www.tulsadevelopers.net/).

_[www.toaTalks.net](http://www.toaTalks.net) - Texas, Oklahoma, Arkansas developer groups and events information_
