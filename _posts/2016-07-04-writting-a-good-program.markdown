---
layout: post
title:  "How to writing a good programs"
date:   2016-07-04 18:00:36 +0700
categories: en
tags: functional programming
---

First it must be said that functional programming is a craft. Like any craft, 
it takes practice and practice is the better teacher. The more exercises you
do, the better code you become, and hopefully you should outgrow the exercise 
and go on to pursue ideas of your own. In course of working on programs, you 
will develop an intuitive appreciation of how to tackle problems and, with 
luck, you will become craftsman. Here are 9 precepts, designed to help you 
improve your technique, which tell you what to aim at and what to avoid.

- Employ top down programming methodology to tackle difficult problems.

Most significant programming tasks are too difficult for you to know exactly 
how they are to be solved. Functional programmers respond by top down 
methodology, whereby the top level functions of the program are coded first, 
then the functions immediately below the top level, and so on down to the 
system functions. At each step they postpone the consideration of exactly how 
the given functions they cite in a definition are themselves implemented util 
they come to define them. Use the same technique and don’t be afraid of being 
banal. For example, suppose you are given the task of getting a computer to 
make a move in chess and you have decided to employ some method whereby the
computer generates a list of likely moves and analyses them. However, you are 
still a little hazy about how the best moves are selected. No matter!

- Make a program clear before you try to make it efficient.

Inexperienced programmers are sometimes tempted into trying to optimise before
they have fully understood what they are doing. Even if the program then
works, the programmer is not quiet sure what is going on, and debugging the
program becomes very difficult. Aim to be clear initially and forget about 
being clear until later. Often clear programs tend to be efficient anyway.

- Get used to throwing away code

Declarative programmers talk about throwaway designs - programs that are
written in order to help the understanding, but which are thrown away and
replaced by something better once that understanding has been achieved. Don't
be afraid to throw things away instead of patching them up.
