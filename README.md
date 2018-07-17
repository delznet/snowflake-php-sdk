# snowflake php客户端sdk

此客户端sdk的服务端由golang实现，源码在

https://github.com/delznet/snowflake

## 此sdk实时的先决条件：

1. 安装gRPC扩展

http://pecl.php.net/package/gRPC

2. protobuf扩展

http://pecl.php.net/package/protobuf

安装扩展没有啥可讲的，phpize、configure、make && make install三步走即可

3. 依赖grpc/grpc包，可通过composer安装

    composer require grpc/grpc

## 代码参考

```php

<?php

use Delz\Snowflake\SnowflakeClient;
use Delz\Snowflake\SnowflakeRequest;
use Grpc\ChannelCredentials;


//利用composer自动加载，具体路径请修改
require __DIR__ . '/vendor/autoload.php';


$client = new SnowflakeClient('127.0.0.1:7890', ['credentials'=>ChannelCredentials::createInsecure()]);
$request = new SnowflakeRequest();
//业务ID
$request->setServiceId(0);
//设置返回id格式为int64
$request->setFormat('int64');
//二进制
//$request->setFormat('base2');
//36进制 26字母+10个数字
//$request->setFormat('base36');
//base32
//$request->setFormat('base32');
//base58
//$request->setFormat('base58');
//base64
//$request->setFormat('base64');
list($reply,$status) = $client->Gen($request)->wait();

if($status->code != 0) {
    echo "服务器故障";
} else {
    //获取id
    echo $reply->getId();
}
```
