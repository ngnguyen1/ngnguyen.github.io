---
layout: post
title: "Understanding about Iptables"
description: ""
tags: [networking, iptables]
last_updated: Wed, 28 Aug 2016 14:48:47 +0700
---
{% include JB/setup %}

Iptables is a tool to manage the Linux Firewall rules, to handle package
filtering for IPv4 (ip6tables for IPv6).

Introduce
--------

This article explains how iptables is structured and explains the fundamentals
about Iptables tables, chains and rules.
Iptables might contain multiple chains. Chains can be built-in or
user-defined. Chains might contain multiple rules. Rules are defined for the
packages.

`The structure is: iptables -> Tables -> Chains -> Rules`

I. Iptables tables và chains
------
  
Iptables has 4 built-in tables:

**Filter table:** Filter table is default table for Iptables. Filter table has
3 built-in chains:

- INPUT chain — Incoming to firewall. For packages coming to the local
server.
- OUTPUT chain — Outgoing from firewall. For packages generated locally and
going out of the local server.
    
- FORWARD chain — Package for another NIC on the local server. For packages
routed through the local server.

**NAT table:** NAT table has the following 3 built-in chains:

- PREROUTING chain – Alters packages before routing them. Package translation
  happens immediately after the package comes to the system ( and before
  routing).
- POSTROUTING chain – Alters packages after routing them. Package translation
happens when the packages are leaving the system.
- OUTPUT chain – NAT for locally generated packets on the firewall.

**Mangle table:** Mangle table is for specialized package alternation. This
will alters QoS bits (Quality of Service) in the TCP header. Mangle table has
the following built-in chains:

- PREROUTING chain
- OUTPUT chain
- FORWARD chain
- INPUT chain
- POSTROUTING chain
  
**Raw table:** Raw table is for configuration excemptions. They have the
following built-in chains:

- PREROUTING chain
- OUTPUT chain

II. Iptables rules
----------

There are the following key points to remember for the iptable rules:

- Rules contain a criteria and a target.
- If the criteria is matched, it goes the to the rules specified in the target
  (or) executes the special values mentioned in the target.
- If the criteria is not matched, it moves on to the next rule.
    

III. Target values
----------

Following are the possible special values that you can specific in the target:

- ACCEPT – Firewall will accept the packet.
- DROP – Firewall will drop the packet.
- QUEUE – Firewall will pass the packet to the userspace.
- RETURN – Firewall will stop executing the next set of rules in the current
chain for this packet. The control will be returned to the calling chain.

If we do `iptables --list`, we will see all the available firewall rules on
our system.


> Default, if you don't specify the -t option, it will display the default
> filter table.
{: .note_quote }

So, two flowwing commands:

{% highlight bash %}
❯ iptables -t filter --list
# (or)
❯ iptables --list
{% endhighlight %}

are same.

The following iptables example shows that there are no firewall rule on our
system.

{% highlight bash %}
❯ iptables --list
Chain INPUT (policy ACCEPT)
target     prot opt source               destination

Chain FORWARD (policy ACCEPT)
target     prot opt source               destination

Chain OUTPUT (policy ACCEPT)
target     prot opt source               destination
{% endhighlight %}


With mangle table:

{% highlight bash %}
❯ iptables -t mangle --list
Chain PREROUTING (policy ACCEPT)
target     prot opt source               destination

Chain INPUT (policy ACCEPT)
target     prot opt source               destination

Chain FORWARD (policy ACCEPT)
target     prot opt source               destination

Chain OUTPUT (policy ACCEPT)
target     prot opt source               destination

Chain POSTROUTING (policy ACCEPT)
target     prot opt source               destination
{% endhighlight %}

NAT table: 

{% highlight bash %}
❯ iptables -t nat --list
Chain PREROUTING (policy ACCEPT)
target     prot opt source               destination

Chain INPUT (policy ACCEPT)
target     prot opt source               destination

Chain OUTPUT (policy ACCEPT)
target     prot opt source               destination

Chain POSTROUTING (policy ACCEPT)
target     prot opt source               destination
{% endhighlight %}


Raw table:

{% highlight bash %}
❯ iptables -t raw --list
Chain PREROUTING (policy ACCEPT)
target     prot opt source               destination

Chain OUTPUT (policy ACCEPT)
target     prot opt source               destination
{% endhighlight %}

The following example show that there are some rules defined in the INPUT,
FORWARD, and OUTPUT chain of the filter table.

{% highlight bash %}
❯ iptables --list
Chain INPUT (policy ACCEPT)
num  target     prot opt source               destination
1    RH-Firewall-1-INPUT  all  --  0.0.0.0/0            0.0.0.0/0

Chain FORWARD (policy ACCEPT)
num  target     prot opt source               destination
1    RH-Firewall-1-INPUT  all  --  0.0.0.0/0            0.0.0.0/0

Chain OUTPUT (policy ACCEPT)
num  target     prot opt source               destination

Chain RH-Firewall-1-INPUT (2 references)
num  target     prot opt source               destination
1    ACCEPT     all  --  0.0.0.0/0            0.0.0.0/0
2    ACCEPT     icmp --  0.0.0.0/0            0.0.0.0/0           icmp type 255
3    ACCEPT     esp  --  0.0.0.0/0            0.0.0.0/0
4    ACCEPT     ah   --  0.0.0.0/0            0.0.0.0/0
5    ACCEPT     udp  --  0.0.0.0/0            224.0.0.251         udp dpt:5353
6    ACCEPT     udp  --  0.0.0.0/0            0.0.0.0/0           udp dpt:631
7    ACCEPT     tcp  --  0.0.0.0/0            0.0.0.0/0           tcp dpt:631
8    ACCEPT     all  --  0.0.0.0/0            0.0.0.0/0           state RELATED,ESTABLISHED
9    ACCEPT     tcp  --  0.0.0.0/0            0.0.0.0/0           state NEW tcp dpt:22
10   REJECT     all  --  0.0.0.0/0            0.0.0.0/0           reject-with icmp-host-prohibited
{% endhighlight %}

The rules in `iptables --list` command output contains the following fields:

- num – Rule number
- target – Special target variable that we discussed above
- prot – Protocols as TCP, UDP, ICMP ...
- opt – Special options for that specific rules
- source – Source ip address of the package
- destination – Destination ip address of the package
