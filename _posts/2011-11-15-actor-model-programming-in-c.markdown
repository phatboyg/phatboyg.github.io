---
author: chris
comments: true
date: 2011-11-15 16:03:35+00:00
layout: post
slug: actor-model-programming-in-c
title: Actor Model Programming in C#
wordpress_id: 951
categories:
- .NET
- C#
tags:
- .NET
- concurrency
---

Last week, I had the pleasure of attending [Øredev](http://oredev.org/2011) in Malmö, Sweden. While at the conference, I presented two sessions -- including a new talk on [Actor Model Programming in C#](http://oredev.org/2011/sessions/actor-model-programming-in-c-). This was the first official presentation I've given on the subject, having done an ad-hoc version of the session at [Pablo's Fiesta](http://pablosfiesta.pbworks.com/w/page/46324025/Actor%20Style%20Programming) this year (which went fairly well, likely due to the awesome [Chicken and Waffles](http://24diner.com/wp-content/uploads/2011/02/waffle_staff.jpg) at [24 Diner](http://24diner.com/) the night before). Early feedback from the Øredev session was positive, which is encouraging since I will be giving an updated version of the talk at CodeMash 2.0.1.2 in January.




First, I wanted to share a few links to the content discussed in the session, including the [GitHub Project](http://github.com/phatboyg/Stact), the [NuGet package](http://nuget.org/List/Packages/Stact), and the [TeamCity build](http://teamcity.codebetter.com/viewType.html?buildTypeId=bt258&tab=buildTypeStatusDiv). I will update the post with the video link once the presentation video is available, along with the slide deck.




Second, I plan to post a series of blog posts explaining how actor model programming is a great model for building concurrent applications, despite the difficulties that the actor model has had in becoming more mainstream (some of those difficulties are explaining in [this article by Paul Mackay](http://www.doc.ic.ac.uk/~nd/surprise_97/journal/vol2/pjm2/)).




In the meantime, I'm going to take a hard look at how different languages have implemented the actor model (many of which have influenced the current syntax used in Stact). I'm also taking a step back and identifying other ways the model can be implemented the minimize many of the difficulties and bring some modern programming style to the model. Concurrency is certainly difficult, but I'm convinced that many aspects can be made more approachable by applying some existing idioms to the problem.




If you do take a look at Stact, please offer any feedback you have via Twitter (I'm [@PhatBoyG](https://twitter.com/#!/phatboyg)) or GitHub (using issues, whatever). If the traffic grows, we'll setup a Google group to keep things manageable.




Until next time...




 
