---
author: chris
comments: true
date: 2012-03-12 13:50:45+00:00
layout: post
slug: restore-packages-using-nuget
title: Restore Packages using NuGet
wordpress_id: 1109
categories:
- NuGet
---

When you pull down the samples I've linked, the packages folder is not included (mostly because it is huge).




To restore, the packages folder in Visual Studio 2010, right-click on the Solution and Enable the Package Restore option. This is really useful for both these downloads, and if you are building your solutions on a CI server so that you don't need to check the packages folder into Git (saving space on your source code repository as well).




![Package Restore Option](/images/uploads/2012/03/PackageRestore.png)
