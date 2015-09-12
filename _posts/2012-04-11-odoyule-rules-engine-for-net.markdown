---
author: chris
comments: true
date: 2012-04-11 16:15:22+00:00
layout: post
slug: odoyule-rules-engine-for-net
title: Odoyule Rules Engine for .NET
wordpress_id: 1160
categories:
- General
---

So I've been writing a rules engine for .NET for many years (on and off, but mostly off unfortunately). Lately, I picked it up again and yesterday published an early version on NuGet (OdoyuleRules). The implementation at this point is capable of pretty extensive matching, but testing is light at this point so there are probably some rough edges.




One of my favorite features is the visualization of the RETE graph once the engine has been loaded with rules. An example is shown below.




![OdoyuleRulesVisualization](/images/uploads/2012/04/OdoyuleRulesVisualization.png)




 




You can download the Visualizer and install it in Visual Studio 2010 (unzip the contents to your My Document/Visual Studio 2010/Visualizers folder). Then, mouse over a reference to a rules engine while debugging and you should be able to select and display the RETE graph of the engine.




Download the visualizer assemblies here: [OdoyuleRulesVisualizer.zip](/images/uploads/2012/04/OdoyuleRulesVisualizer.zip)




The project is hosted on GitHub, at [http://phatboyg.github.com/OdoyuleRules](http://phatboyg.github.com/OdoyuleRules)




Enjoy!




 
