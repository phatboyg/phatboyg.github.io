---
author: chris
comments: true
date: 2008-08-17 22:33:09+00:00
layout: post
slug: method-metrics-for-performance-measurement
title: Method Metrics for Performance Measurement
wordpress_id: 662
categories:
- .NET
- C#
---

When deploying an application, it is important to consider how the application performance will be monitored. For interactive applications, this may include measurements such as the time to load a page, how long it takes the page to be ready for user input, or even how much data is transferred to the client on each request. In the case of a service, it may be important to know the duration for individual transactions, a batch of transactions, or another unit of work.

The benefits of being able to measure the performance of an application are numerous. First, it helps to track performance over time as updates are made to the application. If a new version of the application "feels slower" to users, the developers would be able to compare the performance of the current version to the previous version. This will either identify where the system has degraded or (unlikely as it may be) show that the user is just mistaken.

Another benefit of knowing the performance criteria for an application related to service-level agreements. If the response time of an application can be measured, those metrics can be used to establish expected performance numbers to share with customers. For example, if a certain operation takes less than two seconds on 97% of all requests, customer expectations could be set using that information. Without accurate measurement, it would be impossible to answer that type of question.

**An Example**

An customer service application has a feature that submits user input to a remote service. When the user clicks submit, a request is built containing the user input and credentials retrieved from the customer configuration. The request is then sent to the remote service. When the response is received, the data returned is formatted for display and shown to the requesting user.
Within this example, there are several points that could be measured.





  * The overall duration of the request from the time the user clicks submit until the response is displayed could be tracked. This would be useful in tracking the overall user response time.


  * The time taken to retrieve the credentials from the configuration store could be tracked. This would help identify a slowdown in the database (or whatever type of storage is being used).


  * The elapsed time between sending the request to the remote service and receiving the response could be measured. This would help identify latency issues with the remote service.


All of these values could also be compared to each other to separate the total time for the operation into the amount of time for each individual operation.

**Method Timer**

To measure a method on a class, a stopwatch can be used to measure the elapsed time of the method. To make it easy, I created a class that encapsulates the functionality of the Stopwatch class (from the System.Diagnostics namespace). My class implements IDisposable, allowing it to be automatically disposed at the end of the function with a using {…} block.

{% highlight csharp %}\n
public string LoadUpdates(string url, string name)
{
    using (AutoFunctionTimer timer = new AutoFunctionTimer(url, x => _log.Info(x)))
    {
        string updatePage;
        using (timer.Mark())
            updatePage = new PageLoader(url).GetBody();
        using (timer.Mark())
            return GetUpdates(name, updatePage);
    }
}
{% endhighlight %}

The delegate specified on the constructor is called when the stopwatch is disposed and the timing measurements are complete. The delegate is passed the stopwatch so that it can be output to a log file for processing by the measurement code. The string output includes the time the method started (in UTC), the duration of the method, and the string passed to the constructor.

**Timer Sections**

Sections make it possible to measure individual operations within a method. The time for each section can be logged, making it easy to identify the largest time consumers in a method. In the code example above, the timer.Mark method is used to create a section. This section time is then output after the total time, allowing it to be compared to the duration of the method. If multiple sections are created, they are output in creation order for consistency.

The code for the entire class is shown below.

{% highlight csharp %}\n
namespace MyNamespace.Core
{
    using System;
    using System.Collections.Generic;
    using System.Diagnostics;
    using System.Text;

    public class AutoFunctionTimer : IDisposable
    {
        private readonly Action _action;
        private readonly string _description;
        private readonly List _marks = new List(10);
        private readonly Stopwatch _stopwatch;
        private DateTime _started;

        public AutoFunctionTimer(string description, Action action)
        {
            _description = description;
            _action = action;
            _started = DateTime.UtcNow;

            _stopwatch = Stopwatch.StartNew();
        }

        public void Dispose()
        {
            _stopwatch.Stop();

            _action(ToString());
        }

        public override string ToString()
        {
            StringBuilder sb = new StringBuilder(256);

            sb.Append(_started.ToString("yyyy-MM-dd HH:mm:ss ")).Append(_stopwatch.ElapsedMilliseconds);

            foreach (Stopwatch mark in _marks)
            {
                sb.Append(' ').Append(mark.ElapsedMilliseconds);
            }

            if (!string.IsNullOrEmpty(_description))
                sb.Append(" ").Append(_description);

            return sb.ToString();
        }

        public CheckPoint Mark()
        {
            Stopwatch watch = Stopwatch.StartNew();
            _marks.Add(watch);

            CheckPoint point = new CheckPoint(watch);

            return point;
        }

        public class CheckPoint : IDisposable
        {
            private readonly Stopwatch _stopwatch;

            public CheckPoint(Stopwatch stopwatch)
            {
                _stopwatch = stopwatch;
            }

            public void Dispose()
            {
                _stopwatch.Stop();
            }
        }
    }
}
{% endhighlight %}

**Logging Performance Metrics**

For measuring performance within a single application or service, I recommend using log4net to output performance metrics to a file. It's easy to setup and configure post-deployment, making it an obvious choice. Additionally, each server should log to a directory on the local drive. Not only does this eliminate the need for a network share and the associated permissions, but it makes it less likely that network latency will impact system performance due to logging.

For distributed applications, the story changes quite a bit. Because of the nature of distributed operations, I'll cover them in another post.





