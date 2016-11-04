---
layout: post
title: "Activating a git hook"
description: "Activate a git hook"
category: 
tags: [github,hook,scripts]
last_updated: Fri, 04 Nov 2016 16:26:34 +0700
---
{% include JB/setup %}

In this article, we will try to activate a git hook that execute everytime
when you commit successfully.

To do that, change to .git/hooks folder and create new file named
`post-commit`. It's executable file.

Use your favorites editor to edit that file. It will look like following:

```bash
#!/bin/bash

git push origin master
```
Save it then create change mode to it by command:

`tspyimt@local:~ $ chmod +x .git/hooks/post-commit`

That's it! From now, everytime when you commit success (on this repo), it will
execute command git push automatically.

Have fun!
