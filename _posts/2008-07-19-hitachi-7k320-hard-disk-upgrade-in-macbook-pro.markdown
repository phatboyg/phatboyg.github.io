---
author: chris
comments: true
date: 2008-07-19 04:21:11+00:00
layout: post
slug: hitachi-7k320-hard-disk-upgrade-in-macbook-pro
title: Hitachi 7K320 Hard Disk Upgrade in MacBook Pro
wordpress_id: 657
categories:
- Leopard
- Mac
- Technology
---

Tonight I upgraded the drive in my MacBook Pro from the Fujitsu 160GB that came with it to a new 320GB 7200 RPM Hitachi. I was in desperate need of space (thanks to VMware Fusion and my need for 3-4 virtual machines) and felt with the new 7200 RPM drives now available that it was time to pull the trigger.

The install went smooth and quick, thanks to the guides at iFixit (and others). I used SuperDuper to clone the internal drive to the new drive installed in an external USB enclosure. The process went quickly (maybe 3 hours to copy over 120GB of actual data) and soon after I had the upgrade complete.

Here at the details of the upgrade:


    
    
    Hitachi HTS723232L9A360:
      Capacity:	298.09 GB
      Model:	Hitachi HTS723232L9A360
      Revision:	FC4OC30F
      Serial Number:	xxxxxxx
      Native Command Queuing:	Yes
      Queue Depth:	32
      Removable Media:	No
      Detachable Drive:	No
      BSD Name:	disk0
      Mac OS 9 Drivers:	No
      Partition Map Type:	GPT (GUID Partition Table)
      S.M.A.R.T. status:	Verified
      Volumes:
    Macintosh HD:
      Capacity:	297.77 GB
      Available:	186.59 GB
      Writable:	Yes
      File System:	Journaled HFS+
      BSD Name:	disk0s2
      Mount Point:	/
    



Hopefully that means all is well (I really have no clue). Everything seems to work so far as it did before so I'm a happy camper!
