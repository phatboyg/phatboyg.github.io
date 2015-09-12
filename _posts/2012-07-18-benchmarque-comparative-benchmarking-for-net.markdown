---
author: chris
comments: true
date: 2012-07-18 16:26:26+00:00
layout: post
slug: benchmarque-comparative-benchmarking-for-net
title: Benchmarque - Comparative Benchmarking for .NET
wordpress_id: 1210
categories:
- .NET
- C#
---

Last night, I [announced](https://twitter.com/phatboyg/status/225429499758641152) that the first release of my benchmarking library Benchmarque was available on NuGet. This morning, I'd like to share with you what the library is, and how it to use it.




## What is Benchmarque?




Benchmarque (pronounced [bench-mar-key](http://www.bizmarkie.com/)) allows you to create comparative benchmarks using .NET. An example of a comparative benchmark would be evaluating two or more approaches to performing an operation, such as whether for(), foreach(), or LINQ is faster at enumerating an array of items. While this example often falls into the over-optimization category, there are many related algorithms that may warrant comparison when cycles matter.




## How do I use it?




To understand how to use Benchmarque, let's work through an example. First, start Visual Studio 2010 Service Pack 1 with NuGet 2.0 installed and create a new class library project using the .NET 4.0 runtime. Once created, we're going to define an interface for our benchmark.




{% gist 3137095 AppendText.cs %}




In this benchmark, we are going to compare the performance of the different ways to append text into a single string. Now that we have the interface defining the behavior we want to benchmark, we need to create a few implementations that perform the operation.




First, the good old concatenation operator.




{% gist 3137095 ConcatAppendText.cs %}




Next, we'll use a StringBuilder to handle the work.




{% gist 3137095 StringBuilderAppendText.cs %}




And last, we'll try to use string.Join with an empty separator.




{% gist 3137095 JoinAppendText2.cs %}




With our three implementations ready to benchmark, we now need to create an actual benchmark. We'll take a list of names, and call the interface with those names. Before we can do that, however, it's time to add Benchmarque to the project. Using the NuGet package manager, install Benchmarque to your class library project.




![Installing from Package Manager](/images/uploads/2012/07/BenchmarqueInstall.png)




Once installed, we can create our benchmark class as shown below.




{% gist 3137095 NameAppendBenchmark.cs %}




A benchmark includes three methods that involve the execution of the benchmark, along with a property that returns the iteration counts for each run. WarmUp is called with the implementation to allow any one-time initialization of the implementation to be established. This allow should include a few runs through the test to allow the runtime to JIT any code to ensure the benchmark only includes actual execution time (versus assembly load and JIT time). The Run method is then called with each of the iteration counts to actually run the benchmark. Once complete, the Shutdown method is called to dispose of any resources used by the implementation.




The benchmark runner (Benchmarque.Console, which is installed in the tools folder by NuGet) will run the benchmark with each implementation and measure the time taken. To run the benchmark, we need to open the NuGet Package Manager Console, change to the assembly folder, and start the benchmark using Start-Benchmark as shown below.




![Open the package manager console](/images/uploads/2012/07/PackageManagerConsoleMenu.png)




Once open, change to the folder for the assembly to benchmark.




![Change to the output folder](/images/uploads/2012/07/BenchmarqueConsoleCD.png)




And now, we're going to run the actual benchmark and view the results.




![Results of benchmark](/images/uploads/2012/07/BenchmarqueResults.png)




First, Start-Benchmark is a Powershell function that is added by the init.ps1 that's included in the NuGet package. It handles the execution of the benchmark using the console runner. Once complete, the output of the benchmark is displayed in the console window.




As shown above, the results of the test execution are ordered with the fastest implementation first, followed by the remaining implementations with the difference and how many times slower it is displayed. The output is pretty basic at this point, without a lot of other calculations displayed. Additional items may be added as some point. For now, it's enough to give me the answers I need when trying different approaches to the same problem.




The library is open source (I'll put the Apache 2 documents in place at some point), so feel free to use, abuse, modify, and enhance as needed! 




_One request: If anyone is a Powershell megastar and can modify the Benchmarque.psm1 so that if no argument is specified, it looks through the solution for the projects that are referencing Benchmarque, and automatically running the benchmarks in those assemblies so they don't have to be specified explicitly._




_  
_
