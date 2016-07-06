---
layout: post
title:  "How to writing a good programs"
date:   2016-07-04 18:00:36 +0700
categories: en
tags: functional programming
lead_text: >
    Programming is a craft and you are a craftsman.
---

Here are 9 precepts, designed to help you improve your technique, which tell 
you what to aim at and what to avoid.


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


- Use significant variable and function names.

  If a variable is supposed to stand for a list of towns, then use **Towns**
rather than **X**. Similarly if a function is supposed to stort towns by
population call it **sort-by-population** rather than **sbp**. You may think
you known what **sbp** means now, but returning after 3 weeks holiday it may
mean nothing to you. Suitable variable and function names remove the need to
attach copious comments.


- Look for a common pattern in different processes, and try to capture it with
  higher-order functions.
  
  We covered this in the chapter on higher-order programming. Acquire the
  habit of looking for common patterns in deverse processes and of using
  higher-order functions to capture these patterns. Apart from being an
  excellent mental training, forming this habit will lead you to simpler and
  often faster program.
  

- If a procedure is used more than once, then it should be defined within its
  own function.
  
  If there is a procedure, which is called again and again within your
  program, hive it off info a separate function and give it a name. Not only
  does this lead to a shorter program, since you can just invoke the procedure
  through the name of the function instead of typing in the whole procedure,
  but also the program becomes easier to maintain. If the procedure has to be
  changed, then only its definition need be altered, rather than everywhere it
  is called.


- Avoid writing large function definitions.

  Students who have attained some experience in functional programming, but
  are not yet expert, often write large unwieldy functions into which a large
  amount of activity is squeezed. Keep functions small. It's better to have a
  lot of short simple functions than a few large complex ones.
