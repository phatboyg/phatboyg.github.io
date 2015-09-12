---
author: chris
comments: true
date: 2014-11-05 23:53:40+00:00
layout: post
slug: the-fooidity-switchyard
title: The Fooidity Switchyard
wordpress_id: 2389
categories:
- General
---

Yesterday, I announced Fooidity, a new open source project that simplifies separating code deployments from code release by allowing code paths to be switched dynamically without restarting the application. In continuing with the roll out, today I'm announcing a new property setup to help developers use Foodity right away.




# Fooidity Switchyard




The Fooidity Switchyard is a cloud service hosted in Azure that maintains the state of code features. Developers can sign into the site using their GitHub credentails, and then create organizations and applications which can be switched.




**_Note that the site is in an early state and no is not in a guaranteed state of uptime at this point. It's close, and once the SSL and everything are setup, as well as redundant cloud service instances, it should be ready for general production use._**




## Getting Started




To see how features can be toggled in an application, using Visual Studio to create a new console application. Once created, use NuGet to add the following packages: **Topshelf** and **Fooidity.Client.Autofac**. The new service will be using an Autofac container.




Once the project is created, open the Program.cs file and paste the contents of the gist: [https://gist.github.com/phatboyg/dceaf56120f5382cdfa7](https://gist.github.com/phatboyg/dceaf56120f5382cdfa7)




## Creating an Organization




The Fooidity Client is a set of components that use SignalR to communicate the Fooidity Switchyard. The Autofac integration makes it easy to configure the client using idioms close to the Autofac container.




Visit [http://api.fooidity.com/](http://api.fooidity.com/) and create an account (you’ll need to enter your email address, but GitHub authentication is used). Then, create an organization on the Organizations tab:




![Create Organization](/images/uploads/2014/11/Create-Organization.png.png)




Once an organization is created, create an Application:




![Create Application](/images/uploads/2014/11/createApplication.png.png)




Enter a name for the application and select an organization:




![Create Application Form](/images/uploads/2014/11/CreateApplicationForm.png)




Once created, create an application key:




 




![Create Application Key](/images/uploads/2014/11/CreateApplicationKey.png)




Then copy the application key and put it into the ApplicationKey configuration section of the container setup.




Compileand run the application, and it should start writing False to the console. Refresh the application in the web site and use the Enable/Disable links to change the state of the feature.




![Toggle Feature](/images/uploads/2014/11/ToggleFeature.png)




As the feature is toggled, the console output changes to reflect the state of the feature.




## More To Come




Above shows how you can easily integration feature toggles into your application, and modify them at run-time. More samples are coming, so stay tuned!




You an also checkout the source code at [https://github.com/phatboyg/Fooidity](https://github.com/phatboyg/Fooidity), which includes the Switchyard.




 
