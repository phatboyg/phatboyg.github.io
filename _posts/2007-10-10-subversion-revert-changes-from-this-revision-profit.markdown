---
author: chris
comments: true
date: 2007-10-10 00:16:55+00:00
layout: post
slug: subversion-revert-changes-from-this-revision-profit
title: Subversion Revert Changes From This Revision = Profit!
wordpress_id: 583
categories:
- Software Development
- Subversion
---

Refactoring applications can result in a large number of changes across the entire code base. Changes that result in a new method signature or additional properties on classes can reach far and wide in your application code.

This can be a particular pain when you realize a month later that the code change was not the best design choice. What makes it worse is over 150 files were changed, a mix of .cpp, .h, .idl, .cls, and .asp -- basically a rainbow of technologies. At this point, you start to think, "Can my version control system undo my mistake?"

I've been using various forms of version control for 18+ years. I've been using Subversion for just over a year. No version control system I have used could handle the task of yanking out a revision in the middle of a history chain. Hell, most version control systems I've used don't think of committing 150+ files in one operation as a single revision. But, Subversion is cool, let's see what it can do.

I right click on the trunk, **TortoiseSVN->Show Log**. Okay, so far so good. I found the commit that had all the changes in it. In the revision list at the top of the window, I right-click and select **Revert Changes from This Revision**. "Do you really want to revert changes from this revision?" Hell yeah, I'm bold.

_Waiting. Waiting. Okay, done._

I check my working copy (Subversion is notoriously smart about making changes to your working copy and only actually writing to the repository when you commit) and lo and behold the interface changes are all gone! The best part, the reason I'm writing this post, is that all of the changes after that revision are intact, including changes to the affected files. I'm not joking, this actually worked exactly as I had dreamed.

I started NAnt, waited for the results, and everything worked as expected. All the Visual Basic 6, Visual C++ COM objects, all the interface libraries, classic ASP pages, they all just worked. I called a couple of coworkers over to share in the joy. I'm not kidding, I never expected this to work. And Subversion came through with flying colors. 

I'm going to double our Subversion budget for next year -- oh wait, I forgot that Subversion is **free**.

