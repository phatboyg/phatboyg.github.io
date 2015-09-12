---
author: chris
comments: true
date: 2006-03-28 03:39:04+00:00
layout: post
slug: netsudoku-my-implementation-of-sudoku-for-windows
title: NetSudoku, My Implementation of Sudoku for Windows
wordpress_id: 276
categories:
- Software Development
- Sudoku
---

I wrote a long time ago about how I'm addicted to Sudoku. It all started when I found the site [WebSudoku](http://www.websudoku.com/) last year. Well, I've enjoyed progressing through various levels of puzzles and learning many advanced techniques for solving these crazy grids. Over this time, I've found the web-based format of the game limiting. Therefore, I tried to find a really good "digital paper" version to work the puzzles. I wanted to be able to mark numbers in the squares, quickly find hidden pairs and triples and mark them with various colors to work out snakes and such.

In the end, I found nothing that really met my personal needs. So, being a software engineer, I decided to write my own. The result is NetSudoku, a C# implementation of Sudoku for Windows. The application currently allows the user to mark canditates (including the somewhat evil auto-candidates) and work the puzzle to completion. As numbers are entered, now invalid candidates are removed from the grid. I tried to avoid putting too much logic into it, but if you get an easy puzzle, it will basically solve it for you if there are enough cells with only a single valid candidate. But easy puzzles are boring unless you're in a speed mode trying to do 4 minute or less grids.

The application uses .NET 2.0, so you must have the runtime installed to play it. I also setup the application to be delivered via ClickOnce so updates are automatically patched as I make them available. At this point, the application is in the very early stages and will likely see some major changes as I add the multiplayer options (another reason I wrote it). With harder puzzles, it's sometimes fun for several folks to mull it over at once to obtain a solution and my goal is to make it offer a collaborative (as well as some competitive) mode of play to meet this requirement.

You are welcome to try out the application, I'm making it freely available to those that care to play it. No support is offered at this time, but feel free to comment on the application itself. I won't ignore any feature requests either, but I can't guarantee I'll put them into the code. At some point, I'll likely publish the source code for others to learn from and possibly extend on their own.

You can read more about and install the application from here: [NetSudoku](http://phatboyg.com/netsudoku/).
