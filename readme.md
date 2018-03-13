#### 项目安装
---

项目安装前提:

1:本机可以执行git命令，或者git客户端

2:可以执行composer安装更新项目


获取项目：

```
# git clone git@github.com:chinagcliu/larabbs.git
```

更新项目：
```
# cd larabbs
# composer update
```

新增 .env 配置文件：
```
# cp .env.example .env
```

生成应用程序密钥
```
# sudo php artisan key:generate
```

修改数据库.env文件

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=larabbs
DB_USERNAME=root
DB_PASSWORD=123456
```

执行数据库迁移
```
# php artisan migrate
```

安装完成后给予 storage 权限：
```
# chmod -R 777 storage
```

over!

composer 国内镜像
```
composer config -g repo.packagist composer https://packagist.phpcomposer.com
```


nginx 配置文件（可参考，可自己定义虚拟主机）

```
server {
    listen       80;
    server_name  larabbs.com;
    root /project/larabbs/public;
    index  index.html index.htm index.php;

    # php rewrite
    location / {
    try_files $uri $uri/ /index.php?$query_string;
    }
    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
    location ~ \.php$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }

    access_log /project/logs/larabbs_access.log;
    error_log  /project/logs/larabbs_error.log;
}
```
