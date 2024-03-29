<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/default/php/after/public/../application/index/view/index/index.html";i:1673576121;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>在线客服</title>
<link rel="stylesheet" href="/static/layui/css/layui.css" media="all">

<script src="/static/admin/js/jquery.min.js"></script>
<script src="/static/layui/layui.js"></script>
</head>
<body style="background: url(/static/admin/images/bj0.jpg);background-size: cover;height: 100%;width: 100%;">
    <div style="margin: 20px;float: right;">
        <a href="javascript:;" class="user-logout" style="color: #fdfdfd">退出登录</a>       
    </div>
<script type="text/javascript">
layui.use('layim', function(layim){
	//基础配置
	layim.config({

		//获取主面板列表信息
		init: {
		  url: "<?php echo url('index/getList'); ?>" //接口地址（返回的数据格式见下文）
		  ,type: 'get' //默认get，一般可不填
		  ,data: {} //额外参数
		},
		uploadFile: {
			url: "<?php echo url('upload/uploadFile'); ?>"
		}
		,uploadImage: {
			url: "<?php echo url('upload/uploadimg'); ?>"
		}
		,brief: false //是否简约模式（默认false，如果只用到在线客服，且不想显示主面板，可以设置 true）
		,title: '在线客服' //主面板最小化后显示的名称
		,maxLength: 3000 //最长发送的字符长度，默认3000
		,isfriend: true //是否开启好友（默认true，即开启）
		,isgroup: false //是否开启群组（默认true，即开启）
		,right: '0px' //默认0px，用于设定主面板右偏移量。该参数可避免遮盖你页面右下角已经的bar。
		,chatLog: "<?php echo url('Chatlog/index'); ?>" //聊天记录地址（如果未填则不显示）
		,copyright: false //是否授权，如果通过官网捐赠获得LayIM，此处可填true
        ,find:false
        ,notice:true
        ,voice:"/static/layui/css/modules/layim/voice/default.mp3"
	});
  
	//建立WebSocket通讯
	var socket = new WebSocket('ws://47.108.118.35:7273');
    var user_img = "<?php echo $user_img; ?>";
	//连接成功时触发
	socket.onopen = function(){
		// 登录
        var login_data = '{"type":"init","id":"<?php echo $uinfo['id']; ?>","username":"<?php echo $uinfo['username']; ?>","avatar":"<?php echo $user_img; ?>","sign":"<?php echo $uinfo['sign']; ?>"}';
        socket.send( login_data );
        console.log("websocket握手成功!"); 
	};

	//监听收到的消息
	socket.onmessage = function(res){
		// console.log(res.data);
		var data = eval("("+res.data+")");
        switch(data['message_type']){
            // 服务端ping客户端
            case 'ping':
            	socket.send('{"type":"ping"}');
                break;
            // 登录 更新用户列表
            case 'init':
                console.log(data['id']+"登录成功");
                //layim.getMessage(res.data); //res.data即你发送消息传递的数据（阅读：监听发送的消息）
                break;
            // 检测聊天数据
            case 'chatMessage':
            	//console.log(data.data);
                layim.getMessage(data.data);
                break;
            // 离线消息推送
            case 'logMessage':
                setTimeout(function(){layim.getMessage(data.data)}, 1000);
                break;
            //切换在线状态
            case 'changeStatus':
                if (data['status'] == "online") {
                    //好友上线
                    $("#layim-friend"+data['id']).css("-webkit-filter","grayscale(0)");
                    $("#layim-history"+data['id']).css("-webkit-filter","grayscale(0)");
                }else{
                    // 好友下线
                    $("#layim-friend"+data['id']).css("-webkit-filter","grayscale(100%)");
                    $("#layim-history"+data['id']).css("-webkit-filter","grayscale(100%)");
                }
                break;
               
        }
	};

	//layim建立就绪
	layim.on('ready', function(res){
        //监听发送消息
        layim.on('sendMessage', function(res){
            //console.log(res);
            // 发送消息
            var mine = JSON.stringify(res.mine);
            var to = JSON.stringify(res.to);
            var login_data = '{"type":"chatMessage","data":{"mine":'+mine+', "to":'+to+'}}';
            socket.send( login_data );

        });

    });

    // 监听切换在线状态
    layim.on('online', function(status){
      console.log(status); //获得online或者hide

      //此时，你就可以通过Ajax将这个状态值记录到数据库中了。这里就直接使用getewey操作数据库了
      socket.send( '{"type":"changeStatus","data":{"id":<?php echo $uinfo['id']; ?>, "status":"'+status+'"}}' );
      
    }); 

    // 监听退出
    $(".user-logout").on('click',function() {
        // 下线操作
        socket.send( '{"type":"changeStatus","data":{"id":<?php echo $uinfo['id']; ?>, "status":"outline"}}' );
        window.location.href = "<?php echo url('login/logout'); ?>";
    });

});    
</script>
</body>
</html>