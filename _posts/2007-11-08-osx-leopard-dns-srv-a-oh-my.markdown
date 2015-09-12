---
author: chris
comments: true
date: 2007-11-08 04:27:28+00:00
layout: post
slug: osx-leopard-dns-srv-a-oh-my
title: OSX Leopard, DNS, SRV, A, Oh My
wordpress_id: 612
categories:
- Internet
- Leopard
- OSX
---

Today was another day in the adventures of Leopard OSX. Since upgrading to Leopard I've tried to be a loyal Apple fan boy. But I have to admit some things are not perfect. This latest discovery has nothing to do with Leopard, however, it has to do with the way Leopard follows Internet standards. You see, there is some new way to resolve domain names whereby a SRV record is requested instead of a plain old A record.

Apparently this is to distinguish well known services (like HTTP, SMTP, etc.) from standard old server names. This is to allow a single domain like hotmail.com to use different servers for services on different ports but with a single domain name. For example, asking for port 25 on hotmail.com would return a different IP address than asking for IMAP (yeah, that was a joke on hotmail). Asking for port 80 (HTTP) would return yet another IP address. All with the same domain name.

It seems that Leopard is uses this new method and certain DNS implementations do not handle it properly so it times out and falls back to the legacy A request. Well, neither of my D-Link routers DNS Relay implementation seems to handle it properly so it wasn't working well at home. I smell a firmware upgrade at some point, but for now my DHCP server is handing out the ISP (cox.net) DNS addresses and all is well in Leopard land again.

If you are having any of these slow-resolving name issues, etc. you might give this fix a shot.

