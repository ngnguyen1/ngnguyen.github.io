---
layout: post
title:  "Welcome to Jekyll!"
date:   2014-05-15 20:02:38
categories: jekyll update
---

Giả sử Node.js đang chạy trên localhost và cổng 3000 với domain là `your_domain.com`

1. Cấu hình Nginx

```javascript
server {
        listen    80;
        server_name  your_domain.com www.your_domain.com;
        access_log off;
        error_log  /var/node/your_domain.com/logs/nginx-error_log crit;
 
location ~* .(gif|jpg|jpeg|png|ico|wmv|3gp|avi|mpg|mpeg|mp4|flv|mp3|mid|js|css|html|htm|wml)$ {
       root /var/node/your_domain.com/public;
       expires 365d;
}
 
location / {
        client_max_body_size    10m;
        client_body_buffer_size 128k;
 
        proxy_send_timeout   90;
        proxy_read_timeout   90;
        proxy_buffer_size    128k;
        proxy_buffers     4 256k;
        proxy_busy_buffers_size 256k;
        proxy_temp_file_write_size 256k;
        proxy_connect_timeout 30s;
 
        proxy_pass   http://127.0.0.1:3000/;
 
        proxy_set_header   Host   $host;
        proxy_set_header   X-Real-IP  $remote_addr;
        proxy_set_header   X-Forwarded-For $proxy_add_x_forwarded_for;
        }
}
```

2. Cấu hình Websockets
Nếu ứng dụng của bạn sử dụng Websocket, bạn cần phải thêm cấu hình sau:

```javascript
proxy_set_header Upgrade $http_upgrade;
proxy_set_header Connection "upgrade";
proxy_http_version 1.1;
```

Sau khi cài cấu xong hãy nhớ khởi động lại Nginx.

That’s it !
