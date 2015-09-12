---
author: chris
comments: true
date: 2007-11-28 06:42:16+00:00
layout: post
slug: ruby-on-rails
title: Ruby (on Rails)
wordpress_id: 623
categories:
- Ruby
- Software Development
---

Last week, I started looking into using WATIR for web application testing. In the short amount of time I spent with the tool, I got an initial look at Ruby. Aside from seeing it here or there, this was the first time I actually wrote any Ruby code -- but it was mostly cut and paste based on the testing examples.

Today, I realized that Ruby (and Ruby on Rails) is part of Leopard and delivered with OSX. So I fired up a terminal window and started playing around with the console (IRB). Mind you, I was only playing around with it at this point so I didn't get too deep. I created a few classes, learned the value of open classes, added some methods to the built-in classes (like String.is_your_mom), etc. I was basically playing around without any instructions.

Tonight, I started reading a few articles on the Apple web site about getting started with Ruby on Rails using Mac OSX. I created an application, created some models and a migration, installed and configured MySQL for use in development and test, and created some scaffolding to be able to perform basic CRUD against my domain model. It was at this point that I got an idea of how web applications could be created using Ruby on Rails.

The part that concerns me with what I've learned so far is that ActiveRecord is handling all of the mapping of database columns do the domain model. I'm not sure this is how I would really want that to be done, but I'm so new to Ruby I can't be sure. I'm going to find some examples of applying DDD to Ruby on Rails and see if the two play nicely together. It seems like a lot of the Ruby framework expects a lot of things to be named specific ways or it all breaks down quickly. I do know that I'm not a big fan of having the model defined from the database.

I also know that building an application with a Rails web interface might also lead to building supporting application services in other languages using the same database. In that case, it would seem that having a model-driven architecture that can generate the classes for both Ruby and C# (and likely Java) would be very useful. I have Sparx EA, but I'm not sure if it supports Ruby yet or even if that is how I would want to go.

I'm going to pick up a couple of Ruby books to read more about it -- it seems Idiomatic Ruby is a good place to start. Who knows where that will lead!
