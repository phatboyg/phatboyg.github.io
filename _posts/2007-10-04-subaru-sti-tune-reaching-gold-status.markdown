---
author: chris
comments: true
date: 2007-10-04 04:13:03+00:00
layout: post
slug: subaru-sti-tune-reaching-gold-status
title: Subaru STI Tune Reaching Gold Status
wordpress_id: 574
categories:
- STI
- Subaru
- WRX
---

My 2007 Subaru STI has been a love/hate affair since I got it. The car is awesome, all-wheel drive, loads of power and well, let's face it, it's got flair on all four corners. But the new '07 emission standards really put a damper on high-performance turbo cars. In fact, Mitsubishi chose to save face and not even release an '07 Evo because of the strict emission laws. Subaru went ahead with the '07 STI, and customers like me ended up with a gimped version of the STI compared to the previous model years.

Subaru is aware of the problem. They even issued a "fix" for the serious hesitation and drivability issues. But that fix didn't help most of us, in fact, we don't believe it helped anyone that has driven a prior year STI. I wasn't really bothered by the issue too much at the start because it was winter and I wasn't hammering the car until the sun started shining for more than a few hours a day. But once spring arrived, I knew something was wrong.

I immediately started visiting [Enginuity](http://www.enginuity.org/) to understand the tools used to monitor and tune the factory map for better performance. Once I had read endless posts by experts in the field, I realized I had no clue. Sure, I could log data and see the obvious problems that were being talked about on the forums, but I'm a complete idiot when it comes to forced-induction tuning. Cars just don't have carburetor jets and fuel trim screws anymore (could it be all ball bearings?).

Fortunately, an active member on [NASIOC](http://forums.nasioc.com/forums/) with the moniker "[Gabedude](http://forums.nasioc.com/forums/member.php?u=10108)" seemed to have a plan. He was an active tuner with his previous car, an 06 WRX. After that car met the end, he picked up an 07 STI. He's a regular on Enginuity as well, so I had read a lot of his posts. Gabedude, along with some of the very helpful people at Enginuity, had put in a lot of work to figure out the new '07 ECU. And it was not all good news. The ROM was very different from previous years, so different in fact that it was a huge effort to map out all the new tables and functions that Subaru added to handle the new emission standards.

I spent a lot of time this spring with IDA Pro taking apart the ROM. Once I found a few entry points, the disassembly started pouring out. The amount of code and data was overwhelming and having not been active in assembly for over a decade I was longing to get back into something more comfortable. So I gave up and let time pass.

Gabedude has managed to release several early ROMs for the '07 STI. The first efforts were minors changes to improve drivability and establish a solid base with which to tune. Those efforts were not very successful, but they helped a lot in understanding. After a huge amount of research (how much I cannot imagine) and several beta versions, a gold version of the new ROM is likely going to be released sometime this week. I'm currently running a revision of the beta and the difference compared to stock is amazing. Power is smooth, fast and strong. None of the jerkiness, hesitation, or stuttering of the stock map. In short, I absolutely love my STI now.

Check out the [thread](http://www.xpttuning.com/osecuroms/viewtopic.php?t=811) on [OSECUROMS](http://www.xpttuning.com/osecuroms/index.php) (hosted by XPT Tuning) and if you have an '07 STI, grab a copy of the ROM and go for it once the gold version is released. The difference is amazing. If you like the results, Gabedude suggests a [donation](http://www.enginuity.org/donate.php) to the Enginuity project to keep things moving. 
