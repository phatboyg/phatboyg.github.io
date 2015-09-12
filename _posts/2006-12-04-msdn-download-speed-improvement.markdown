---
author: chris
comments: true
date: 2006-12-04 14:54:28+00:00
layout: post
slug: msdn-download-speed-improvement
title: MSDN Download Speed Improvement
wordpress_id: 425
categories:
- Technology
---

I nearly forgot where this way, so I figured i would mention it here and link it. When downloading from MSDN (to get Vista for instance), it seems that most of the time it starts off at around 75 KB/s. That's just not acceptable for downloading large files.

[This link](http://weblogs.asp.net/jamauss/archive/2005/06/07/410690.aspx) talks about how to update your hosts file so that download speed uses the entire pipe.

In your hosts file (typically C:\Windows\System32\Drivers\Etc\HOSTS), add the following entry:


`207.46.252.185      global.ds.microsoft.com`


This will select a US-based mirror site and typically gives me around 1 MB/second download (I have nearly a 8-megabit pipe). Bringing down Vista Ultimate in under 45 minutes, priceless.
