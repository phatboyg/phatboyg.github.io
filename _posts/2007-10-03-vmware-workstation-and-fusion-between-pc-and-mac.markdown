---
author: chris
comments: true
date: 2007-10-03 18:02:51+00:00
layout: post
slug: vmware-workstation-and-fusion-between-pc-and-mac
title: VMware Workstation and Fusion Between PC and Mac
wordpress_id: 573
categories:
- Mac
- OSX
- VMware Fusion
- Windows
---

[Jean-Paul S. Boodhoo](http://codebetter.com/blogs/jean-paul_boodhoo/default.aspx), one of the [CodeBetter ](http://www.codebetter.com/)bloggers, put up a [pretty useful post ](http://codebetter.com/blogs/jean-paul_boodhoo/archive/2007/10/03/running-vmware-images-on-windows-and-macs.aspx)on using the same virtual machine image between Windows/VMware Workstation and Mac/VMware Fusion. He makes some good points about the differences between the file systems and how to make sure your machines are portable between the two operating systems.

Some of the key points:



	
  * Split the disk images into 2GB chunks. I've always done this to make sure I can copy them to my thumb drive to move them around.

	
  * Keep the disk volumes on a FAT32 volume (such as a BootCamp partition) to avoid the files expanded on OSX beyond what can be supported.

	
  * Keep an eye on VMX files to make sure the paths don't point to the wrong locations


[Check out the post](http://codebetter.com/blogs/jean-paul_boodhoo/archive/2007/10/03/running-vmware-images-on-windows-and-macs.aspx) if you want to know more.
