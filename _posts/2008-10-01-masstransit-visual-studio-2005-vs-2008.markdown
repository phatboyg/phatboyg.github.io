---
author: chris
comments: true
date: 2008-10-01 17:53:40+00:00
layout: post
slug: masstransit-visual-studio-2005-vs-2008
title: MassTransit - Visual Studio 2005 vs. 2008
wordpress_id: 701
categories:
- MassTransit
tags:
- MassTransit
---

With the latest trunk of MassTransit, we are using Visual Studio 2008 for development. The resulting assemblies are still targeting .NET 2.0, allowing them to be used with Visual Studio 2005. The reason is that some of the newer features like WCF support were built with 3.5, along with the use of lambda expressions and other features in the source files.

My understanding is that the command-line build should still work even if you don't have Visual Studio 2008 as long as you have installed the Framework 3.5 via Windows Update.

We are using the assemblies built from 2008 in our development (which is still 2005) without any issues targeting .NET 2.0 and have recently upgraded our development trunk where we are using MassTransit to the latest build (previously we were on 0.1x). It was an interesting upgrade with a few changes required, but nothing too painful. Early testing shows everything is working as expected and I'm looking forward to taking advantage of some of the new features supported by the latest release.
