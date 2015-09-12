---
author: chris
comments: true
date: 2006-03-29 17:34:38+00:00
layout: post
slug: netsudoku-updated-multiplayer-added
title: NetSudoku Updated, Multiplayer Added
wordpress_id: 278
categories:
- Sudoku
---

I've published a new version of NetSudoku. This latest release includes multiplayer support. You can install the application [here](http://phatboyg.com/netsudoku/) (be sure to use IE to enable ClickOnce deployment for automatic updates).

If you are on a network, you can click Network->Enabled to make your game visible on the network. At that point, other players can click Network->Join Game to find your game. At this point, it joins the first game that responds. Later I'll add the ability to pick from a list of received games before actually joining the game.

The multiplayer support uses multicast datagrams, so there are no connections required. When you join a game, you actually become a host of that game. As moves are made, they are multicasted out to the other people playing the same game (all games have a unique identifier on the network). At any time, players can leave and join the game without any interruptions. If all players leave the game, the game no longer exists on the network and cannot be continued.

There is currently no timing and all moves are cooperative towards solving the puzzle. This mode prevents people from getting into a number rush and let's players enjoy the game at a slower pace (particularly for the harder puzzles). I'll probably add competitive play later, including timed games and a scoring system based on the difficulty of the move (naked singles one point, hidden quads a lot higher).

I'm sure there are still bugs as this is an early work in progress, but several of us have had it up and running for a few hours without any major snafus.

Oh, you can also chat with everyone else playing the game when networking is enabled so that's fun.
