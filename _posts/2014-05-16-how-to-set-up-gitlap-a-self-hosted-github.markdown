---
layout: post
title:  "How to Setup GitLab: A Self Hosted GitHub"
date:   2014-05-16 13:02:38
categories: Angular
---

### Introduction

Okay — GitLab isn’t really your own self-hosted GitHub. I don’t believe GitLab or GitHub share any relationship besides both being Git Management Software, but it’s the best way I find to describe in laymen terms what GitLab is. GitLab is awesome. It’s featured packed, and it does nearly everything that Github does. Best of all, you get unlimited private repos with it (or techincally as many as your server can handle).

I have some pretty good DevOps skills, but I’m not really a server guy. Until recently, I’ve never previously wanted to deal with the hassle of setting up my own Git server, and GitHub’s managed solution is really quite appealing. With GitHub, you have a reliable and easy solution that you never really have to worry about. It’s also very nicely integrated with a huge array of social features like forking and organizations amongst other collaboration tools. The only thing is it can get expensive real fast if you need more than a handful of private repositories.

Digital Ocean has recently made it very simple and straight forward to setup Gitlab with minimal effort and fully supporting one-click restorable backups. They also even provide great resources and tutorials on it:

+ How to set up GitLab as your very own private Github clone
+ How To Use the GitLab One-Click Install Image to Manage Git Repositories

This post will be very similar to those articles, but I’ll be going through step-by-step in more detail as well as some improvements and notes of my own. Feel free to read below or go straight to the Digital Ocean docs themselves.

### Sign up with Digital Ocean

The first thing you’ll need to do is signup with Digital Ocean.

### Setup Public SSH Keys

Digital Ocean automatically will provision your server with the public keys you upload to your account. This step isn’t really required, but it makes it easier and faster to access your new server environment.

### Create Your Droplet

For this, use the domain (or subdomain) that you would like to use. For example, you could do gitlab.scotch.io.
Select the server size

The official recommendation for GitLab can be found here. In summary, your server should have:

    2 cores of CPU power
    2 GB RAM

However, I’ve found that GitLab still works well even if you don’t meet these requirements. If you select the smallest Droplet, GitLab will occasionally freeze or hang. This is usually fixed with a quick reboot of the server. I recommend the smallest Droplet you select is their $10/month plan. I have found no problems yet running this with a small team for both work and play.
Select a region

Select the region that you would like your server to be in. You should select a region that is closest to you to reduce latency.
Select an image

The next step is to select the GitLab application image provided by Digital Ocean. Selecting this basically means that GitLab will automatically be installed when the server is provisioned.
Select the SSH Key

Select the Public SSH Key you added from earlier. This will allow you to SSH into the server without needing a password. Selecting this also means that Digital Ocean won’t send you a root password when the Droplet is created.
Enable Backups

The last step is to enable backups. Even though Git is a distributed version control system, I still would enable this so that you can easily recover your Git repos if anything unexpected happens.
