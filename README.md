# after
Workerman+Layim+TP5简单客服系统  

实现了功能:  
1、可通过后台对聊天成员的增删改查   
2、实现了离线客服登录后聊天记录推送   
3、实现了表情和图片的发送  
4、实现了一对一聊天和聊天记录的查看  
5、实现了在线状态显示  

# 注意事项:  
1、back文件加下有数据库备份文件，请建立数据库，并导入。同时配置项目中的config文件中的datebase.php的数据库信息。  
2、需要修改Workerman数据库配置 vendor/Workerman/Applications/Config/Db.php
3、确保php已安装pcntl扩展并且未禁用pcntl相关函数


# 如何运行  
1、将代码下载到本地，并配置好虚拟域名（基于tp5框架，只要按照tp5框架的配置方式即可）  
  
2、导入 back 文件夹下的 after.sql 表，数据库名为 after 

3、在win下启动方式，双击 after/vendor/Workerman/start_for_win.bat 启动 workerman，不要关闭！停止按 Ctrl+c

4、在linux下启动方式，php /after/vendor/workerman/start.php start (启动，可以输出错误信息，但是关闭远程连接后会自动停止)；php /after/vendor/workerman/start.php start -d (守护进程模式启动，关闭Xshell连接不会停止)；php /after/vendor/workerman/start.php stop (停止服务)

5、访问聊天系统，进入前台，注册新用户登录即可聊天。 请用两个浏览器打开，登录不同的账户互相聊天。后台默认账号是admin，密码admin  


## 安装
**方法一**
```
composer require workerman/gatewayclient
```
使用时引入`vendor/autoload.php` 类似如下：
```php
use GatewayClient\Gateway;
require_once '真实路径/vendor/autoload.php';
```

**方法二**
下载源文件到任意目录，手动引入 `GatewayClient/Gateway.php`, 类似如下：
```php
use GatewayClient\Gateway;
require_once '真实路径/GatewayClient/Gateway.php';
```

## 使用
```php
// GatewayClient 3.0.0版本以后加了命名空间
use GatewayClient\Gateway;

// composer安装
require_once '真实路径/vendor/autoload.php';

// 源文件引用
//require_once '真实路径/GatewayClient/Gateway.php';

/**
 * === 指定registerAddress表明与哪个GatewayWorker(集群)通讯。===
 * GatewayWorker里用Register服务来区分集群，即一个GatewayWorker(集群)只有一个Register服务，
 * GatewayClient要与之通讯必须知道这个Register服务地址才能通讯，这个地址格式为 ip:端口 ，
 * 其中ip为Register服务运行的ip(如果GatewayWorker是单机部署则ip就是运行GatewayWorker的服务器ip)，
 * 端口是对应ip的服务器上start_register.php文件中监听的端口，也就是GatewayWorker启动时看到的Register的端口。
 * GatewayClient要想推送数据给客户端，必须知道客户端位于哪个GatewayWorker(集群)，
 * 然后去连这个GatewayWorker(集群)Register服务的 ip:端口，才能与对应GatewayWorker(集群)通讯。
 * 这个 ip:端口 在GatewayClient一侧使用 Gateway::$registerAddress 来指定。
 * 
 * === 如果GatewayClient和GatewayWorker不在同一台服务器需要以下步骤 ===
 * 1、需要设置start_gateway.php中的lanIp为实际的本机内网ip(如不在一个局域网也可以设置成外网ip)，设置完后要重启GatewayWorker
 * 2、GatewayClient这里的Gateway::$registerAddress的ip填写填写上面步骤1lanIp所指定的ip，端口
 * 3、需要开启GatewayWorker所在服务器的防火墙，让以下端口可以被GatewayClient所在服务器访问，
 *    端口包括Rgister服务的端口以及start_gateway.php中lanIp与startPort指定的几个端口
 *
 * === 如果GatewayClient和GatewayWorker在同一台服务器 ===
 * GatewayClient和Register服务都在一台服务器上，ip填写127.0.0.1及即可，无需其它设置。
 **/
Gateway::$registerAddress = '127.0.0.1:1236';

// GatewayClient支持GatewayWorker中的所有接口(Gateway::closeCurrentClient Gateway::sendToCurrentClient除外)
Gateway::sendToAll($data);
Gateway::sendToClient($client_id, $data);
Gateway::closeClient($client_id);
Gateway::isOnline($client_id);
Gateway::bindUid($client_id, $uid);
Gateway::isUidOnline($uid);
Gateway::getClientIdByUid($uid);
Gateway::unbindUid($client_id, $uid);
Gateway::sendToUid($uid, $dat);
Gateway::joinGroup($client_id, $group);
Gateway::sendToGroup($group, $data);
Gateway::leaveGroup($client_id, $group);
Gateway::getClientCountByGroup($group);
Gateway::getClientSessionsByGroup($group);
Gateway::getAllClientCount();
Gateway::getAllClientSessions();
Gateway::setSession($client_id, $session);
Gateway::updateSession($client_id, $session);
Gateway::getSession($client_id);
```

# 效果
![image](https://user-images.githubusercontent.com/29120060/212464021-c11b75a4-3a85-46fd-ab2d-e985042248e2.png)
![image](https://user-images.githubusercontent.com/29120060/212464026-9a8a69b2-420f-4d2f-90f5-1f439d906327.png)

![image](https://github.com/Jing-Bei/after/blob/master/images/01.png)
![image](https://github.com/Jing-Bei/after/blob/master/images/02.png)
![image](https://github.com/Jing-Bei/after/blob/master/images/03.png)
![image](https://github.com/Jing-Bei/after/blob/master/images/04.png)
![image](https://github.com/Jing-Bei/after/blob/master/images/05.png)
![image](https://github.com/Jing-Bei/after/blob/master/images/06.png)
![image](https://github.com/Jing-Bei/after/blob/master/images/07.png)
![image](https://github.com/Jing-Bei/after/blob/master/images/08.png)



