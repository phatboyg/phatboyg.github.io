---
author: chris
comments: true
date: 2006-04-18 04:48:51+00:00
layout: post
slug: netsudoku-updated
title: NetSudoku Updated
wordpress_id: 290
categories:
- Software Development
- Sudoku
---

I've released a new version of NetSudoku. This version includes a complete rewrite of the networking layer. It still uses multicast, but the new extensions are going to set me up to enable some gateway options including the use of Skype AP2AP for connecting to other players via Skype.

This version also offers some improved candidate removal and conflict detection. I've implemented a house-based algorithm for the cells to allow changes to propogate through the grid based on relationships to other cells. It's the start of some new ideas that I have for the game, so more to come on that later. The game now indicates invalid candidates in a dark gray color so that you can see if you place a candidate that cannot possibly go in that cell.
I've also added a network view to the right portion of the window. This window lists all the games being played and which players are in each game. You can jump between games with ease (as long as at least one person keeps playing a game it will stick around) to find one that suits you. The chat window also now has syntax coloring and formatting (using RichTextBox) so that it will be easier to distinguish between the various message types and who sent them.

There are still more improvements to come, including a list that shows who changed each cell in order. Still working on that, as well as some dynamic cell tool tips (to show who placed that number, etc.). I'm also looking at adding some nice dynamic features like the ability to pull the daily puzzles from various web sites that offer them to Sudoku clients.

Enjoy!
