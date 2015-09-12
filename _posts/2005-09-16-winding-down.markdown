---
author: chris
comments: true
date: 2005-09-16 16:07:38+00:00
layout: post
slug: winding-down
title: Winding Down
wordpress_id: 163
categories:
- Software Development
---

I think people are definitely feeling the drain of having a full sponge in the head. People are moving slower, and the mood is definitely subdued compared to Tuesday morning. A lot of the sessions today are symposium or panel style leaning towards a more interactive style. The remainder of the sessions include a lot of repeats and wrap-ups. The attendance at breakfast was even lighter, suggesting that some may have opted for a longer stay on the pillow soon followed up with a trip to the airport.

However, yesterday was very interesting. I took a session with a deep dive into the internal features of WCF and how that works. There is a lot of thought on message interception, filtering to handle message dispatching and an overall well-built design on top of the CLR. And that's fairly key -- the WCF is built using the CLR. Previously it was intended to be built using Managed C++, but the development team found that with the improvements made in the CLR in terms of performance and manageability, there was no need to take the development hit of using MC++. Which is interesting in how they have acknowledged that developing MC++ compared to CLR code is significantly more involved in terms of debugging and testing. So I have high hopes that WCF will finally replace the need for custom application protocols on top of TCP and also general XML-RPC type operations.

LINQ is cool, but I'm still not convinced that DLINQ is close to primetime. I saw another session on DLINQ yesterday and could not find the magic synergy between the language (C#) and the database. I sat down with some MS guys in the lounge and asked the questions to get some answers. DLINQ is technically the codename for ADO.NEXT -- something after ADO.NET 2.0. In that mindset, I wonder about how that is going to help application developers compared to ADO.NET. The MS guys agreed that the absolute fastest way to deal with SQL Server was SqlConnection/SqlDataReader. So for now, it seems like we're going to continue to expect applications to be targeted to that interface when using SQL Server (even 2005). LINQ is a couple of years away before it will see primetime, so for now, life goes on.

The Expression suite of tools (Quartz, Sparkle, one other) is going to be slick. I think that's the focus for now, getting those tools done and in beta form so that teams can start to visualize their development cycle with this new set of tools to ease the integration between designers and developers. And that's a key separation point that needs attention, designers deal purely with the look and feel, developers build the code. These new tools make those two groups work more tightly with the same file formats and tool libraries. I can't imagine a life without cutting, the bliss...

Another session yesterday was on how to deal with more pure XML formats using WCF for interop with non-MS systems. The support is certainly there, in fact, it's highly integrated to allow for standard RSS feeds, XML output without SOAP headers and more. It will be interesting to see this technology evolve towards launch. What's funny is that most of the development of these tools has been happening on XP/2003 since Vista is so unstable. In fact, yesterday was the very first demo of WCF on top of Vista, and things were not perfect for sure. So the hope that these standards make it onto the legacy platforms (XP/2003) is high.

After the conference, I'm going to spend the rest of the weekend in the LA area trying to find the secret base of SD6. :)

