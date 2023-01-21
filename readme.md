## 
- 在 PHP 中 first cityzen 是 object function 还是 class


### htaccess 文件配置
Apache httpd 配置转发 RewriteEngine

- 首先需要开启 RewriteEngine 通过设置为 On
- RewriteCond 类似程序中的 if 语句一样，表示如果符合某个或某几个条件则执行RewriteCond下面紧邻的RewriteRule语句，这就是
接受下载实际的文件和目录
RewriteCond %{REQUEST_FILENAME} !-f 表示文件存在，就直接
RewriteCond %{REQUEST_FILENAME} !-d 目录存在就直接访问目录不进行RewriteRule


- QSA: 表示保留参数如 get 传值 ?xxx==xx... 
- PT: 再把这个 URL 交给Apache处理
- L: 作为最后一条

### robots 文件配置
```txt
User-agent: *
Disallow: /admin/
Disallow: /ajax/
```
### index.php

在 index.php 定义一个调试方法 `show` 用于调试，在浏览器中显示内容
```php
<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

show($_GET);
```

```shell
http://localhost/simpleMVCFramework/public/1233/123
```

```
Array
(
    [url] => 1233/123
)
```

### core 
#### config
关于应用的一些配置、例如数据库配置等
#### init
加载 php 文件，例如 python 中 init.py 在这个文件夹中引入项目的依赖文件



### TODO
- 采用 precompiled 预防 query 被注入攻击
- 了解一下 MVCS 设计模式
- 参考 land-pg 库