---
author: chris
comments: true
date: 2006-05-12 13:53:15+00:00
layout: post
slug: netsudoku-update
title: NetSudoku Update
wordpress_id: 315
categories:
- Sudoku
---

I've posted a new build of NetSudoku. A few new features to cover:



	
  * There is now a built-in puzzle generator, but it's in a very early form. It takes about five minutes to generate a puzzle, mainly because I generate 100 of them and pick the hardest one. I'm working on a new system that will generate puzzles in the background and keep a few of each difficulty around between sessions so that you can get into a game quickly. Then, when you pick a new game it will have one available. This is all a work-in-progress, but I wanted to get this out there so that others could use it and see how well the generator builds puzzles.

	
  * The solver can now solve anything (was required to make a generator), including backtracks and guessing. The hint feature will still only display a single hint at a time though, and it will tell you if it had to guess to get the answer.


I think those are the highlights, enjoy!
