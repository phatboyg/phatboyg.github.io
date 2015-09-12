---
author: chris
comments: true
date: 2006-04-29 17:34:26+00:00
layout: post
slug: new-netsudoku-build-online
title: New NetSudoku Build Online
wordpress_id: 305
categories:
- Sudoku
---

I just published a new build of NetSudoku. This version includes a number of new features:



	
  * **Logic-based solver**
It's not going to solve every puzzle yet, but it's a step in that direction. It can be used in two modes, a complete solve and a hint. Note that the hint feature should only be used once all the candidates have been found (using Ctrl+F). Otherwise, you can get false cells and it will break. The solver automatically refreshes all candidates first so that's not a problem there. The solver will output every technique it used to solve the puzzle, so you can see as you go along what logic is used to complete the puzzle. I'll expand the methods of the solver later to include X-Wing, Swordfish and other variants to help with some of the trickier puzzles.

	
  * **Grid Control Style Design**
I've enhanced the grid control using GDI+ to be more colorful and stylized. I think it looks good, but I'm open to suggestions.

	
  * **Threading Engine Changed**
The method I was using threads before was causing a lot of delays in the networking code. I was also recreating some objects way too often, adding to the network lag. I rewrote the threading code to be more responsive to user actions. This should result in smoother network game play.

	
  * **Settings Saved**
When exiting the game, all user settings are stored. This includes the window positions, network and chat windows, and a few other things. It also includes all of the colors used in the game. At some point, I'll probably add a UI to change some of the colors for those that don't like the default settings. For you advanced folks, feel free to tweak the settings to your liking.

	
  * **Smart Cell Population**
In the previous version, if you had several folks hammering to plug that last few cells of a puzzle, you could end up clearing cells since others were setting it at the same time. I've put some logic in to hopefully prevent the cells from being cleared if multiple players had the same intentions.


Those are the highlights, I'm sure there are a few bug fixes or something thrown in as well.

Things that are still being developed include a Skype network layer (which is partially done, but disabled in this release since it is still very incomplete), the ability to pull games from popular RSS feeds, the option to create a custom game board (for entering puzzles you want to do as a group). I'm also still finding new things to try out in the .NET 2.0 runtime, so who knows what else might show up.

If you already have installed NetSudoku, the application should update automatically through ClickOnce. If you have not yet installed NetSudoku, you can install it from [here](http://phatboyg.com/netsudoku/) (note, using IE makes the installation the easiest, so close FireFox and use IE for the best installation experience -- then go back to FireFox).
