---
author: chris
comments: true
date: 2007-11-15 01:41:30+00:00
layout: post
slug: ftp-editing-with-textmate-using-cyberduck-on-leopard
title: FTP Editing with TextMate using Cyberduck on Leopard
wordpress_id: 616
categories:
- Mac
- OSX
---

While I spend most of mine developing applications with .NET in Visual Studio 2005, there are times when I want to tweak a site built in PHP/MySQL. Since all my sites are hosted on GoDaddy, I don't have SSH access into the server. This leaves FTP as the sole choice for editing remote content. While a solid practice would be to have a local development environment to text changes, it's a blog, and it's just not that important to me if I make a quick mistake. Plus, sometimes you're dealing with Authorize.NET or PayPal, or FedEx, or another cart-based solution that requires cURL through a proxy.

For editing remote files, I use Cyberduck and TextMate on OSX. Cyberduck handles the FTP interface nicely with a finder-like interface. A quick click and you're editing the remote file in TextMate. Make your change and save and Cyberduck automatically updates the file on the server. **Or at least it did with Tiger.**

It seems that some things broke with Leopard in how file update notifications are handled with Cyberduck. If you try to update using the built-in software update, you won't get anything newer than 2.8 -- which doesn't have the fix. So if you're using Leopard, you can get this functionality back by installing a [nightly build](http://update.cyberduck.ch/nightly/) of Cyberduck. It's a quick install (simply copy to the Applications folder) and you're back up and running. Do yourself a favor at the same time and turn off the Growl notifications for connection/disconnection to avoid some on-screen spam when saving the file.


