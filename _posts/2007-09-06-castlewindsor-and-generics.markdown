---
author: chris
comments: true
date: 2007-09-06 19:42:24+00:00
layout: post
slug: castlewindsor-and-generics
title: Castle.Windsor and Generics
wordpress_id: 553
categories:
- .NET
- Castle Project
---

Don't you just love great documentation? Hey, it's a work in progress...

In digging to figure out how to use a generic data access interface with specific implementations through Castle.Windsor, I came up with the following. 

In the configuration file, you specify something like this:

<component  
id="MyAssembly.MyObjectDataAccess"  
service="MyAssembly.IGenericDataAccess`2[[MyAssembly.MyObject, MyAssembly],[System.Int32]], MyAssembly"  
type="MyAssembly.GenericDataAccess`2[[MyAssembly.MyObject, MyAssembly],[System.Int32]], MyAssembly">  
</component>

Once you have that, you can request that type from the container by asking:

IGenericDataAccess<MyObject,int> dao = Container.Resolve<IGenericDataAccess<MyObject,int>>();

Of course, you could always override that implementation with a custom class for specialized extensions to the IGenericDataAccess interface. This seems to work pretty well, and avoids defining a class and interface for each and every data type in our system (there are a **lot** of them). I guess it would be cleaner to simply define the interface and class in code now that I think about it.

Another thing, if you are stuck trying to figure out the type name to put in the configuration, write a quick test that does the following:

GenericDataAccess<MyObject, int> dao = new GenericDataAccess<MyObject, int>();   
string aqn = dao.GetType().AssemblyQualifiedName;

That will give you the full .NET style name for the class that you can put into the configuration.

Thoughts?
