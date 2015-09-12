---
author: chris
comments: true
date: 2007-11-07 15:12:48+00:00
layout: post
slug: safari-3-debug-tools-better-than-firebug
title: Safari 3 Debug Tools Better Than FireBug?
wordpress_id: 611
categories:
- Mac
- OSX
- Software Development
---

In my usual morning loop, I found the following tweaks to enable to Debug menu in Safari. In Leopard, Safari 3 debugging tools have gotten some serious love -- I mean serious love. Let's take a look!

First, you have to [enable the debug menu on Safari](http://www.macosxhints.com/article.php?story=20030110063041629). In Terminal, enter the following:
    
    % defaults write com.apple.Safari IncludeDebugMenu 1




Once that is done, open safari (if it was running, it may need a restart) and notice the new Debug menu appended to the end of the standard menu. From here, you can open the web inspector and the world just opens up. There is so much stuff in here it's hard to cover it all, but the features are deep. One of my favorite views is the network view that shows a timeline of the page load to find slow spots:




![](http://farm3.static.flickr.com/2290/1903477581_c00c0b4903.jpg?v=0)




It's pretty deep, I like it. I'm going to spend some more time with it, but I figured I would share it with those Mac dudes that are always into cool stuff.
