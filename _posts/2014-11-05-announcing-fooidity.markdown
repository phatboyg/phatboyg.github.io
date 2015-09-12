---
author: chris
comments: true
date: 2014-11-05 02:33:25+00:00
layout: post
slug: announcing-fooidity
title: Announcing Fooidity
wordpress_id: 2379
categories:
- .NET
- OSS
---

# Background





To meet ever increasing customer demands, development teams are now working concurrently adding value to their applications. This can be difficult in a software-as-a-service (SaaS) environment, where a single codebase is continuously delivered to production. When multiple teams are working independently on the same code base, synchronizing feature completion and testing can be difficult, resulting in idle teams waiting on other teams to finish their features. In a large code base, having long-lived branches in source control can result in difficult merges, so it’s often necessary to have multiple teams actively committing incomplete or partially tested to the same development branch.





If you have been paying attention to what is hot and happening in application development, you may have heard about _feature toggles_. A [feature toggle](http://martinfowler.com/bliki/FeatureToggle.html) controls what _features_ are available in an application. There are several implementations already available on GitHub (such as [nToggle](https://github.com/SteveMoyer/nToggle) and [NFeature](https://github.com/benaston/NFeature), however, an unfortunate thing seen over and over is the preponderance of the _if_ keyword. These conditional code blocks clutter the code and result in nested code blocks that would preferably be avoided.





# Introducting Fooidity





Fooidity is a new open source project that simplifies separating code deployments from code release by allowing code paths to be switched dynamically without restarting the application. By using switches tied to features, new code can be delivered to production without changing the existing behavior. Once the development team is ready to delivery the feature to one or more customers, the feature can be enabled, allowing the switches to flow into the new behavior.





# Using Fooidity





To use Fooidity, using NuGet to add the Fooidity package to your .NET project. Fooidity requires .NET 4.5.





## Code Features





In Fooidity, a code feature represents code that is new to the application. This can be a new feature under development, an enhancement to an existing feature, or even a simple bug fix. All code that changes the behavior of an application currently in use by customers is a code feature. The _CodeFeature_ interface is used to denote a type that identifies the code feature itself, declaring using a .NET struct.




    
    {% highlight csharp %}
    public struct Feature_NewScreen :
        CodeFeature
    {
    }
    {% endhighlight %}





Because C# is a statically typed language, Fooidity embraces the type system by allowing code features to be defined using types. Rather than using strings, which make it hard to track down usage, or _enums_, which result in a single type in which every feature must be defined, using a type makes it easy for developers to find usages in code with a simple key combination in Visual Studio.    





## Code Switches





To selectively execute code based on a feature’s state, a switch is used. There are several switches available in Fooidity which can be used depending upon the requirements of the application.





In most situations, releasing a new feature to a subset of customers prior to making the feature available to all users is preferred. Not only does this limit the impact to customers in cases where the new behavior has unexpected side effects, but it allows the development team to more closely monitor the new behavior as it is enabled.





Fooidity has the concept of a contextual switch which allows a feature to be enabled for a subset of customers, users, etc. For instance, the _userId_ could be used to enable a feature for a specific user. A _customerId_ might be used to enable a feature for one or more customers.





To define a context, the developer creates a context type:




    
    {% highlight csharp %}
    public interface ICustomerContext
    {
        Guid CustomerId { get; }
    }
    {% endhighlight %}





A provider is then needed to obtain the context:




    
    {% highlight csharp %}
    public class CustomerContextProvider :
        IContextProvider<ICustomerContext>
    {
    }{% endhighlight %}





The context is then converted to a string key that can be used to identify the context in the feature state:




    
    {% highlight csharp %}
    public class CustomerContextKeyProvider :
        IContextKeyProvider<ICustomerContext>
    {
        public string GetKey(ICustomerContext context)
        {
            return context.CustomerId.ToString();
        }
    }
    {% endhighlight %}





The switch uses the context for the request, be it a web request, message consumer in MassTransit, or any other type of scoped application method to determine if it is enabled for the context.





# Dependency Injection Container Support





As a long time user of a dependency injection container in application architectures, having a feature toggle implementation with strong container support is a must. The ability to dynamically select multiple implementations from a container, including the use of context to aid in implementation selection, makes it easy to control the activation of new application behavior.





To this end, the real power of Fooidity comes into play when used with a container, such as _Autofac_, _StructureMap_, or _Castle Windsor_. Using a container with Fooidity makes it easy to support many advanced scenarios, such as switch evaluation tracking, switch state caching, and conditional resolution of class dependencies based on feature state.





For instance, two versions of an interface implementation can be created, and the container can resolve either the new or old version depending upon the state of a feature:




    
    {% highlight csharp %}
    builder.RegisterSwitchedType<BugFix1337, IReader, FileReaderV2, FileReader>();
    {% endhighlight %}





If the BugFix1337 feature is enabled, the _FileReaderV2_ class will be resolved from the container. If disabled, the original _FileReader_ will be resolved instead. Both classes implement the _IReader_ interface, making the switch transparent. This allows the deployment of the bug fix without changing the behavior of the application until the feature is enabled. The code can be deployed at any time, without requiring the development team to monitor post deployment to ensure the bug fix is working. The team can enable the feature when they are ready to monitor the fix, to ensure the new behavior is as expected. 





# More To Come





The announcement of Fooidity is just the first in a series of features that are coming very soon. One feature of note is an entire management portal hosted in Azure that can be used by any developer to track and manage their feature states. A client assembly, hosted in the developer’s application, connects to the service (using SignalR) and obtains the feature state, including real-time updates which are pushed directly to the client. This will make it super easy to get started.





The NuGet packages are already available (search for Fooidity), and the entire source code is available on [GitHub](https://github.com/phatboyg/Fooidity).
