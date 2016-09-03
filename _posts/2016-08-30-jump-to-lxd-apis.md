---
layout: post
title: "Jump to LXD APIs"
description: ""
category: 
tags: [vitualization,lxd]
last_updated: Tue, 4 Sep 2016 01:37:52 +0700
---
{% include JB/setup %}


This post won't talk how to install or configure
[LXD](https://github.com/lxc/lxd) or [LXC](https://github.com/lxc/lxc), it's
only focus in how to interact with LXD REST APIs. 


All of the communications between LXD and its clients happen using RESTful API
over http which is encapsulated over either SSL for remote operations or a
unix socket for local operations.

However, not all of REST interface requires authentication:

- GET to / is allowed for everyone
- GET to /1.0 is allowed for everyone (but result varies)
- POST to /1.0/certificates is allowed for everyone with a client
  certificate. (We will use this endpoints to add your custom certificates)
- GET to /1.0/images is allowed for everyone but only returns public images
  for unauthenticated users.

## Setting up the LXD daemon

- Via Unix socket: To working over Unix socket, we don't need config anything
  for LXD daemon, just do:
  
{% highlight bash %}
tspyimt@local:~$ curl --unix-socket /var/lib/lxd/unix.socket n/
{"type":"sync","status":"Success","status_code":200,"metadata":["/1.0"]}
{% endhighlight %}

> You can use a comand-line JSON processor such as [jq](https://goo.gl/uTCcFB)
> to display more pretty. It can be installed from repo via command line (for
> Debian/Ubuntu).
{: .note_quote}

So, it will be look like:

{% highlight bash %}
tspyimt@local:~$ curl --unix-socket /var/lib/lxd/unix.socket n/ | jq
{
  "type": "sync",
  "status": "Success",
  "status_code": 200,
  "metadata": [
    "/1.0"
  ]
}
{% endhighlight %}

- Via HTTPs: To call LXD REST APIs over HTTPs, we must config a little bit,
  just run:
  
{% highlight bash %}
tspyimt@local:~$ lxc config set core.https_address "[::]":8443
{% endhighlight %}

This will have it bind all addresses on port 8443. If you only want to access
from localhost, you can bind to IP 127.0.0.1

> Note that in an untrusted environment (so anything but localhost), you
> should  also pass LXD the expected server certificate so that you can
> confirm that you’re talking to the right machine and aren’t the target of a
> man in the middle attack.
{: .warn_quote}

The REST APIs is authenticated by the use of client certificates. LXD
generates one when you first use the command line client and located at
`~/.config/lxc/client.crt` and `~/.config/lxc/client.key`. But you could
generate your own with [openssl](https://www.openssl.org/).

After enabled remote connection for LXD daemon, we can access by:

{% highlight bash %}
tspyimt@local:~$ curl -k -L --cert ~/.config/lxc/client.crt --key ~/.config/lxc/client.key https://127.0.0.1:8443/ | jq .
{
  "type": "sync",
  "status": "Success",
  "status_code": 200,
  "metadata": [
    "/1.0"
  ]
}
{% endhighlight %}

- Via HTTPs with custom certificates.

As mentioned above, you can use your cert and key, but you need setup a trust
relationship with a new client, a password is required:

{% highlight bash %}
tspyimt@local:~$ lxc config set core.trust_password <your_password>
{% endhighlight %}

To create certificates with openssl, we need installed it's newest
version. Please find in repo of your operating system, then run:

{% highlight bash %}
tspyimt@local:~$ openssl genrsa 1024 > your_client.key
tspyimt@local:~$ openssl req -new -x509 -nodes -sha1 -days 365 -key your_client.key -out your_client.crt
{% endhighlight%}

For currently, we have the both file (your_client.key and your_client.crt) to
authenticate. Lets confirm that this particular certificate ins't trusted:

{% highlight bash %}
tspyimt@local:~$ curl -k -L --cert your_client.crt --key your_client.key https://127.0.0.1:8443/ | jq .metadata.auth
"untrusted"
{% endhighlight%}

Now, lets tell the server to add it by giving it the password that we set
above:

{% highlight bash %}
tspyimt@local:~$ curl -k -L --cert your_client.crt --key your_client.key https://127.0.0.1:8443/1.0/certificates -X POST -d '{"type": "client", "password": "<your_password>"}' | jq .
{
 "type": "sync",
 "status": "Success",
 "status_code": 200,
 "metadata": {}
}
{% endhighlight %}

> In above command, we have used one of APIs endpoints is /certificates
> endpoints that will discuss later.
{: .note_quote}

Finally, confirm that we are properly authenticated:

{% highlight bash %}
tspyimt@local:~$ curl -k -L --cert your_client.crt --key your_client.key https://127.0.0.1:8443/ | jq .metadata.auth
"trusted"
{% endhighlight %}

## Working on the APIs

To keep commands short, all the examples will be using the local unix socket,
you can work over the HTTPs connection if you want.


- Get basic server information

{% highlight bash %}
curl -s --unix-socket /var/lib/lxd/unix.socket -X GET s/1.0 | jq .
{
  "type": "sync",
  "status": "Success",
  "status_code": 200,
  "metadata": {
    "api_extensions": [],
    "api_status": "stable",
    "api_version": "1.0",
    "auth": "trusted",
    "config": {
      "core.https_address": "[::]:8443",
      "core.trust_password": true,
      "storage.zfs_pool_name": "oribit"
    },
    "environment": {
      "addresses": [
        "10.200.18.1:8443",
        "192.168.1.2:8443",
        "192.168.122.1:8443",
        "192.168.10.2:8443"
      ],
      "architectures": [
        "x86_64",
        "i686"
      ],
      "certificate": "YOUR_CERTIFICATE",
      "driver": "lxc",
      "driver_version": "2.0.3",
      "kernel": "Linux",
      "kernel_architecture": "x86_64",
      "kernel_version": "4.4.0-31-generic",
      "server": "lxd",
      "server_pid": 15489,
      "server_version": "2.0.3",
      "storage": "zfs",
      "storage_version": "5"
    },
    "public": false
  }
}

{% endhighlight %}


### Operation

Anything that could take more than second, LXD will background operation. To
list all current operations:

{% highlight bash %}
tspyimt@local:~ $ curl -s --unix-socket -X GET /var/lib/lxd/unix.socket s/1.0/operations | jq .
{
  "type": "sync",
  "status": "Success",
  "status_code": 200,
  "metadata": {
    "running": [
      "/1.0/operations/3d5c577b-1ad2-4a86-b583-51adf7026f4d",
      "/1.0/operations/5126b822-33c2-47a8-9a64-dfc0a7d3a270",
      "/1.0/operations/cbc8e3fc-45bd-4b0e-b417-46ebcfad46e6",
      "/1.0/operations/9f274c64-97cf-47a9-ac99-52ddb0c3256f",
      "/1.0/operations/4ed54acc-a163-4b9c-a635-bc24241127d7",
      "/1.0/operations/0fae4ab8-1e00-49ae-8044-a9f286500887",
      "/1.0/operations/e06b84df-fefe-4cc5-93ac-344d408d58a4",
      "/1.0/operations/da80669c-dea1-4666-b60e-0ad1696f38fb",
      "/1.0/operations/24ca1eba-d9a3-45f0-9c22-7165a7929536",
      "/1.0/operations/c7ba37b6-4bb0-48f1-8cdb-c978b588882f",
      "/1.0/operations/66010a5a-609a-4df5-9453-c51c8c8f3bd5",
      "/1.0/operations/11a62335-58e3-42a5-9261-61d883628c5f",
      "/1.0/operations/7fd83bb2-b6f0-430f-bde2-d666e5f85a6c"
    ]
  }
}

{% endhighlight %}

And you can get more detail on it:

{% highlight bash %}
tspyimt@local:~ $ curl -s --unix-socket /var/lib/lxd/unix.socket -X GET s/1.0/operations/3d5c577b-1ad2-4a86-b583-51adf7026f4d | jq .
{
  "type": "sync",
  "status": "Success",
  "status_code": 200,
  "metadata": {
    "id": "3d5c577b-1ad2-4a86-b583-51adf7026f4d",
    "class": "websocket",
    "created_at": "2016-09-03T17:18:55.097664845+07:00",
    "updated_at": "2016-09-03T17:18:55.097664845+07:00",
    "status": "Running",
    "status_code": 103,
    "resources": {
      "containers": [
        "/1.0/containers/uu"
      ]
    },
    "metadata": {
      "fds": {
        "0": "45df00ffe2105f0bfdc926318ac6775d8ae590becc5dc8d1613131042f34f8ba",
        "control": "5f9644074d66afa499e8181d9a977854e6b4a74433c09122a582feda0ae91148"
      }
    },
    "may_cancel": false,
    "err": ""
  }
}
{% endhighlight %}

You can subcribe to all operation notifications by using `/1.0/events`
websocket.

### The other endpoints

```
- /
  - /1.0
  - /1.0/certificates
    - /1.0/certificates/<fingerprint>
  - /1.0/containers
    - /1.0/containers/<name>
      - /1.0/containers/<name>/exec
      - /1.0/containers/<name>/files
      - /1.0/containers/<name>/snapshots
        - /1.0/containers/<name>/snapshots/<name>
      - /1.0/containers/<name>/state
        - /1.0/containers/<name>/logs
          - /1.0/containers/<name>/logs/<logfile>
  - /1.0/events
  - /1.0/images
    - /1.0/images/<fingerprint>
      - /1.0/images/<fingerprint>/export
    - /1.0/images/aliases
      - /1.0/images/aliases/<name>
  - /1.0/networks
    - /1.0/networks/<name>
  - /1.0/operations
    - /1.0/operations/<uuid>
      - /1.0/operations/<uuid>/wait
      - /1.0/operations/<uuid>/websocket
  - /1.0/profiles
  - /1.0/profiles/<name>
```

We wont cover all the APIs in this post, we will through them by basic APIs
relevant containers as create, start, view state, delete or take snapshot.

- List all containers

{% highlight bash %}
tspyimt@local:~ $ curl -s --unix-socket /var/lib/lxd/unix.socket -X GET s/1.0/containers | jq .
{
  "type": "sync",
  "status": "Success",
  "status_code": 200,
  "metadata": [
    "/1.0/containers/nga-web",
    "/1.0/containers/ngatesting",
    "/1.0/containers/phabricator",
    "/1.0/containers/sniff",
    "/1.0/containers/testlocalimage",
    "/1.0/containers/u1",
    "/1.0/containers/uu",
    "/1.0/containers/xenial"
  ]
}

{% endhighlight %}



- Create a new container

To create new container, we will send a POST requset to endpoint
`1.0/containers` with data json file.

We create a json file named `first-container.json`. It will be look like:

{% highlight json %}
{
  "name": "my-first-container", 
  "source": {
    "type": "image", 
    "alias": "my-custom-image"
  }
}
{% endhighlight %}

Let me explain some atribute we are using here. `name` is name of the
container. The `source` property is the way we want to create new
container. At here, we are using an image was stored a local remote with alias
is __my-custom-image__. 

You can list all available image alias by endpoint GET
`1.0/images/aliases`. 

{% highlight bash %}
tspyimt@local:~ $ curl -s --unix-socket /var/lib/lxd/unix.socket -X GET s/1.0/images/aliases | jq .
{
  "type": "sync",
  "status": "Success",
  "status_code": 200,
  "metadata": [
    "/1.0/images/aliases/Centos-7-amd64",
    "/1.0/images/aliases/base-alpine-3.4",
    "/1.0/images/aliases/base-wp",
    "/1.0/images/aliases/custom-image",
    "/1.0/images/aliases/my-custom-image",
    "/1.0/images/aliases/testnga",
    "/1.0/images/aliases/yyy"
  ]
}
{% endhighlight %}

But we deep in lxd image in other post. Now, let create new container:

{% highlight bash %}
tspyimt@local:~ $ curl -s --unix-socket /var/lib/lxd/unix.socket -X POST -d @first-container.json s/1.0/containers | jq .
{
  "type": "async",
  "status": "Operation created",
  "status_code": 100,
  "metadata": {
    "id": "f083a745-d15f-48c2-9589-3e318febd33a",
    "class": "task",
    "created_at": "2016-09-04T00:48:40.209950728+07:00",
    "updated_at": "2016-09-04T00:48:40.209950728+07:00",
    "status": "Running",
    "status_code": 103,
    "resources": {
      "containers": [
        "/1.0/containers/my-custom-image"
      ]
    },
    "metadata": null,
    "may_cancel": false,
    "err": ""
  },
  "operation": "/1.0/operations/f083a745-d15f-48c2-9589-3e318febd33a"
}
{% endhighlight %}

Usually, you can view the processing create container but because we created a
container from local remote, so it take a few seconds to complete the opertion
create new container.

We can verify that it was created successfully:

{% highlight bash %}
tspyimt@local:~ $ curl --unix-socket /var/lib/lxd/unix.socket -X GET s/1.0/containers/my-first-container | jq .
{
  "type": "sync",
  "status": "Success",
  "status_code": 200,
  "metadata": {
    "architecture": "x86_64",
    "config": {
      "volatile.apply_template": "create",
      "volatile.base_image": "9a35b3900a87fcaf178a63621df3d269d0811a1433597d67ef314339c9d56762",
      "volatile.eth0.hwaddr": "00:16:3e:91:5a:3a",
      "volatile.last_state.idmap": "[{\"Isuid\":true,\"Isgid\":false,\"Hostid\":100000,\"Nsid\":0,\"Maprange\":65536},{\"Isuid\":false,\"Isgid\":true,\"Hostid\":100000,\"Nsid\":0,\"Maprange\":65536}]"
    },
    "created_at": "2016-09-04T00:48:40+07:00",
    "devices": {
      "root": {
        "path": "/",
        "type": "disk"
      }
    },
    "ephemeral": false,
    "expanded_config": {
      "volatile.apply_template": "create",
      "volatile.base_image": "9a35b3900a87fcaf178a63621df3d269d0811a1433597d67ef314339c9d56762",
      "volatile.eth0.hwaddr": "00:16:3e:91:5a:3a",
      "volatile.last_state.idmap": "[{\"Isuid\":true,\"Isgid\":false,\"Hostid\":100000,\"Nsid\":0,\"Maprange\":65536},{\"Isuid\":false,\"Isgid\":true,\"Hostid\":100000,\"Nsid\":0,\"Maprange\":65536}]"
    },
    "expanded_devices": {
      "eth0": {
        "limits.ingress": "100Mbit",
        "name": "eth0",
        "nictype": "bridged",
        "parent": "lxdbr0",
        "type": "nic"
      },
      "root": {
        "path": "/",
        "type": "disk"
      }
    },
    "name": "my-first-container",
    "profiles": [
      "default"
    ],
    "stateful": false,
    "status": "Stopped",
    "status_code": 102
  }
}
{% endhighlight%}

- Start a container

For currently, it was stopped. Let start it by: 

{% highlight bash %}
tspyimt@local:~ $ curl -s --unix-socket /var/lib/lxd/unix.socket -X PUT -d '{"action": "start"}' a/1.0/containers/my-first-container/state | jq .
{
  "type": "async",
  "status": "Operation created",
  "status_code": 100,
  "metadata": {
    "id": "ebb92b09-f23f-4bf4-8260-60daa64a91f1",
    "class": "task",
    "created_at": "2016-09-04T01:18:27.76570129+07:00",
    "updated_at": "2016-09-04T01:18:27.76570129+07:00",
    "status": "Running",
    "status_code": 103,
    "resources": {
      "containers": [
        "/1.0/containers/my-custom-image"
      ]
    },
    "metadata": null,
    "may_cancel": false,
    "err": ""
  },
  "operation": "/1.0/operations/ebb92b09-f23f-4bf4-8260-60daa64a91f1"
}
{% endhighlight %}

As i mentioned above, if you are doing by hand as me, you can't access the
opertion because it finish very quickly. But you can confirm it by manually:

{% highlight bash %}
tspyimt@local:~ $ curl -s --unix-socket /var/lib/lxd/unix.socket -X GET a/1.0/containers/my-first-container/state | jq .metadata.status
"Running"
{% endhighlight %}

- Delete container

You can't delete a running container, so first we must stop it:

{% highlight bash %}
tspyimt@local:~ $ curl -s --unix-socket /var/lib/lxd/unix.socket -X PUT -d '{"action": "stop", "force": true}' a/1.0/containers/my-first-container/state | jq .
{
  "type": "async",
  "status": "Operation created",
  "status_code": 100,
  "metadata": {
    "id": "c92c4938-7c7b-4ad4-a5dc-948cef95a9e6",
    "class": "task",
    "created_at": "2016-09-04T01:31:38.350546357+07:00",
    "updated_at": "2016-09-04T01:31:38.350546357+07:00",
    "status": "Running",
    "status_code": 103,
    "resources": {
      "containers": [
        "/1.0/containers/my-first-container"
      ]
    },
    "metadata": null,
    "may_cancel": false,
    "err": ""
  },
  "operation": "/1.0/operations/c92c4938-7c7b-4ad4-a5dc-948cef95a9e6"
}
{% endhighlight %}

Then delete it:

{% highlight bash %}
tspyimt@local:~ $ curl -s --unix-socket /var/lib/lxd/unix.socket -X DELETE a/1.0/containers/my-first-container | jq .
{
  "type": "async",
  "status": "Operation created",
  "status_code": 100,
  "metadata": {
    "id": "273e7e40-6018-42e2-8da6-2fb2b2e0541d",
    "class": "task",
    "created_at": "2016-09-04T01:33:31.572491505+07:00",
    "updated_at": "2016-09-04T01:33:31.572491505+07:00",
    "status": "Running",
    "status_code": 103,
    "resources": {
      "containers": [
        "/1.0/containers/my-first-container"
      ]
    },
    "metadata": null,
    "may_cancel": false,
    "err": ""
  },
  "operation": "/1.0/operations/273e7e40-6018-42e2-8da6-2fb2b2e0541d"
}
{% endhighlight %}

Confirm it was deleted:

{% highlight bash %}
tspyimt@local:~$ curl -s --unix-socket /var/lib/lxd/unix.socket a/1.0/containers/my-first-container | jq .
{
  "error": "not found",
  "error_code": 404,
  "type": "error"
}
{% endhighlight %}

### Reference: 
- The main LXD website is at: https://linuxcontainers.org/lxd
- Development happens on Github at: https://github.com/lxc/lxd
- Mailing-list support happens on: https://lists.linuxcontainers.org
- IRC support happens in: #lxcontainers on irc.freenode.net
