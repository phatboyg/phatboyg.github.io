---
author: chris
comments: true
date: 2007-10-10 04:25:18+00:00
layout: post
slug: tales-from-altnet-testing-legacy-code
title: Tales From ALT.NET - Testing Legacy Code
wordpress_id: 584
categories:
- .NET
- ALT.NET
- altnetconf
- ASP
- ASP.NET
- C#
- C++
---

Imagine a system with a large amount of C++ and Classic ASP code. The ASP code handles the presentation of data only, making calls into C++ COM objects when data or logic functions are required. In order to take advantage of the huge productivity gains, new code is written in C# and .NET 2.0 when possible.

One of the challenges in adding .NET code to an existing C++/COM application is calling infrastructure components from the new .NET code. Interop can be used, however, this can drastically impact the design of the new code by forcing coding decisions to match outdated idioms. By replacing the old code with new .NET bits, the model and services built in .NET can be more appropriately structured using solid design methods (DDD is my preferred choice in this area).

At ALT.NET, we had a conversation about testing legacy code. The quick response was, "Read Feathers." The book, _Working Effectively with Legacy Code_ covers a lot of integration topics about legacy code, particularly C++. I plan to pick up a copy in the near future. But the discussion continued and I made a few realizations on how to approach the problem of migrating legacy code to .NET.

When examining a legacy component, don't focus on the methods in the interface. With a Test-Driven Development approach, the client comes first. Therefore, the new .NET project is written to the point where the legacy dependency is needed. Once a dependency is identified, create tests to call a new interface providing the services of the legacy component. Once the interface methods are defined (from the viewpoint of the caller, not the legacy component), create a proxy class that implements the new interface but using the existing COM component for the implementation.

At this point a new interface, proxy class, and set of tests that exercise the methods have been created. Using the newly created tests, verify that the new interface works as designed. For systems that need to retain the legacy code for other application purposes, the work is done. There is no duplication of code and the new projects are not limited by the design of the legacy components.

However, if the goal is to replace the legacy component, the tests can be used to validate a new implementation. Build a new class in C# and implement the new interface in .NET code. The tests created for the proxy class can be used to verify the implementation in the new class. Once the dependencies on the legacy component are eliminated, the legacy component itself can be removed. If the dependencies on the legacy code cannot be removed, reconsider the decision to duplicate the implementation.

In some cases, it may be desirable to replace a legacy interface with the new implementation. While it is possible to create a class in .NET that implements an IDL-defined interface, there are some gotchas that need to be addressed.


An _app.config_ file will need to exist for every application that used the legacy component. In the case of an ASP application, this means an _inetinfo.exe.config_ or _w3wp.exe_ file we need to exist in the _inetsrv_ folder under _/windows/system32_. This can result in problems where the server is being shared with other ASP applications.

The new assemblies will need to be registered with _regasm_ using the _/codebase_ parameter. This means the assembly and all of the dependent assemblies will need to be strong named. By registering the assembly with this method, the assembly does not have to be installed in the GAC (which is pure evil IMHO).

The new class must have a _ComDefaultInterface_ attribute and must not have a _ClassInterfaceType_ attribute. The IDL-defined interface dictates the type (dual/custom) of calls supported.


I have personally used this method to transition code from legacy ASP/COM to ASP.NET and C#. It would be wise to note that legacy interop is not easy and it is not perfect. There are a number of gotchas along the way. My only other recommendation is to test early, test often, and stick to implementing only what the client (calling application) needs to function.
