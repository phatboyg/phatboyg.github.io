---
author: chris
comments: true
date: 2012-07-23 15:16:10+00:00
layout: post
slug: rebooting-topshelf-for-version-3
title: Rebooting Topshelf for Version 3
wordpress_id: 1220
categories:
- .NET
- OSS
- Topshelf
---

When we created Topshelf, one of the prime directives was ease of use. It had to be easy for the developer to add a reference and create a service. To keep it easy, we had another prime directive: the developer should only be required to reference a single assembly to get Topshelf to work. And that assembly should have no dependencies.




## Why?




Before NuGet, using open source was difficult for .NET developers. With so many different versions of assemblies and no single point of distribution, it was a continuous effort to get a solution with multiple open source dependencies to build properly. Fast forward to today, the NuGet world, and developers can simply add a reference using the NuGet package manager and all the dependencies come along for the ride. The migration of the community towards NuGet has made the directive of one assembly significantly less important.




This evolution of the open source community requires authors to re-imagine their products to fit properly in this new world. In order to keep Topshelf the best and easiest way to create Windows services, we are planning to do just that -- re-imagine the model for Topshelf going forward.




With the release of Topshelf 3.0, the main NuGet package will contain only the functionality necessary to create, install, and control your own service. By focusing on this single goal, the highest level of safety and stability can be attained. This allows allows us to keep the footprint of Topshelf as small as possible, reducing the surface area around your mission-critical services that are running on it.




Once we have the main Topshelf assembly stable and production tested, we will revisit the other features of Topshelf and look at how it they fit into the new direction. Some features may be discarded while others may be changed to be more operationally sustainable. These features, however, will not be included in the main package. Instead, they will sit on top of the stable and proved Topshelf assembly, ensuring that the core functionality remains solid.




## When?




I’ll be posting a prerelease version of 3.0 on the main NuGet feed in the next few days. This version will continue to support both .NET 3.5 and .NET 4.0, as well as .NET 4.5 once it is generally available (the 4.x version should work with 4.5 until then). The previous v2.x code branches will be renamed from (develop/master) for retention (v2_develop/v2_master).




Migration from previous versions should be fairly painless as the API is nearly identical. There are a few minor tweaks and some additional options for using the new features (such as the ability to control the host from the service, including the ability to stop the service -- a very requested feature), most of the settings such as service name and such are now entirely optional, with the default using the namespace of the hosting assembly for the service name.




That's the current roadmap for Topshelf. Hopefully you'll agree that this reboot makes sense, as the current codebase has completely outgrown what is needed to host a simple service. Using this additive approach should make it easier to build features on top of the solid core Topshelf service, without comprising the integrity of the base service host functionality.
