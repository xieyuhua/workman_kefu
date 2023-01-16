<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/default/php/after/public/../application/index/view/index/list.html";i:1673850538;}*/ ?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta name="viewport" content="width=device-width,height=device-height,maximum-scale=1.0,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta charset="utf-8">
        <link rel="shortcut icon" href="/ws/wolive.ico.jpg" />
        <title>对话平台</title>
        <link rel="stylesheet" type="text/css" href="/ws/layui.css" tppabs="https://d009.kf.yunmall.68mall.com/assets/libs/layui/css/layui.css" />
        <script type="text/javascript" src="/ws/jquery.min.js" tppabs="https://d009.kf.yunmall.68mall.com/assets/libs/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/ws/layui.js" tppabs="https://d009.kf.yunmall.68mall.com/assets/libs/layui/layui.js"></script>
        <script type="text/javascript" src="/ws/layer.js" tppabs="https://d009.kf.yunmall.68mall.com/assets/libs/layer/layer.js"></script>
        <script type="text/javascript" src="/ws/jquery.cookie.js" tppabs="https://d009.kf.yunmall.68mall.com/assets/libs/jquery/jquery.cookie.js"></script>
    </head>
    <style>
    * {
        -webkit-overflow-scrolling: touch;
    }
    ::-webkit-scrollbar {
        display: none;
    }
    .visiter {
        width: 100%;
        height: 80px;
        position: relative;
        border-bottom: 1px solid #dddddd;
    }
    .visiter:hover {
        background: #ddd;
    }
    .waiter {
        width: 94%;
        height: 50px;
        padding: 12px;
        position: relative;
        border-bottom: 1px solid #ddd;
    }
    .hide {
        display: none;
    }
    .myicon {
        position: absolute;
        right: 2px;
        top: 3px;
        cursor: pointer;
    }
    .visit_content {
        display: block;
        cursor: pointer;
        position: absolute;
        left: 9px;
        top: 5px;
        width: 90%;
        height: 90%;
    }
    .v-avatar {
        position: absolute;
        top: 6px;
        border-radius: 50%;
    }
    .c_name {
        position: absolute;
        left: 70px;
        top: 8px;
        font-size: 1rem;
    }
    .newmsg {
        position: absolute;
        bottom: 8px;
        left: 70px;
        font-size: .8rem;
        color: #8D8D8D;
        width: 70%;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }
    .newmsg img {
        max-height: 20px;
    }
    .list {
        display: inline-block;
        height: 50px;
        font-size: 1rem;
        text-align: center;
        line-height: 47px;
    }
    .onclick {
        position: relative;
        border-bottom: 3px solid #5FB878;
    }
    .onclick:after {
    }
    .notice-icon {
        display: inline-block;
        color: #FFFFFF;
        position: absolute;
        left: 54px;
        top: 5px;
        width: 20px;
        height: 20px;
        background: #5FB878;
        text-align: center;
        border-radius: 25px;
        line-height: 20px;
    }
    .icon_gray {
        -webkit-filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        filter: grayscale(100%);
        filter: gray;
    }
    .waiticon {
        display: inline-block;
        color: #FFFFFF;
        right: 2px;
        width: 20px;
        height: 20px;
        background: #D92F2F;
        text-align: center;
        border-radius: 20px;
        line-height: 20px;
        font-size: 15px;
    }
    .geticon {
        position: absolute;
        right: 10px;
        top: 20px;
        font-size: 30px;
    }
    .size {
        width: 25px;
        height: 25px;
        position: absolute;
        right: 10px;
        top: 29px;
        font-size: 30px;
        background: url(/ws/del-icon.png)
        /*tpa=https://d009.kf.yunmall.68mall.com/assets/images/index/del-icon.png*/
        ;
        background-size: 25px auto;
    }
    header {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        width: 100%;
        height: 50px;
        background: #fff;
        zoom: 1;
        border-bottom: 1px solid #eee;
        display: flex;
    }
    header .header-left {
        width: 15%;
        height: 50px;
    }
    header .header-left a {
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    header .header-left a img {
        width: 1.5rem;
        border-radius: 10px;
    }
    header .header-middle {
        width: 70%;
        text-align: center;
        color: #fff;
        height: 50px;
        float: left;
        color: #222;
        font-size: 1.2rem;
        line-height: 50px;
        position: relative;
    }
    header .layui-nav-item {
        width: 15%;
        height: 50px;
        line-height: 50px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    header .layui-nav-item>a {
        display: block;
        width: 80%;
        height: 25px;
        background: #5FB878;
        color: #fff;
        line-height: 25px;
        border-radius: 25px;
        font-size: .8rem;
    }
    header .layui-nav-item a img {
        width: 1.8rem;
    }
    header .layui-nav-item .layui-nav-child {
        top: 60px;
        width: 24%;
        right: 3%;
        min-width: 100px;
        padding: 0;
        border: none;
        left: auto;
        box-shadow: 0 0 4px rgba(0, 0, 0, .12);
    }
    header .layui-nav-item .layui-nav-child:after {
        content:"";
        display: block;
        position: absolute;
        width: .8rem;
        height: .8rem;
        right: .8rem;
        top: -.4rem;
        background: #fff;
        bottom: 100%;
        transform: rotate(45deg);
        box-shadow: -2px -4px 4px rgba(0, 0, 0, .05);
    }
    header .layui-nav-item .layui-nav-child dd {
        line-height: 45px;
        border-bottom: 1px solid #ececec;
    }
    header .layui-nav-item .layui-nav-child dd:last-child {
        border-bottom: none;
    }
    .chat-content {
        width: 100%;
        overflow-y: auto;
        position: fixed;
        top: 50px;
        z-index: 100;
        display: flex;
        justify-content: space-around;
        border-bottom: 1px solid #eee;
        background: #fff;
    }
    .no-list {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-top: 7rem;
        width: 100%;
    }
    .no-list img {
        width: 11rem;
    }
    .no-list p {
        font-size: 1rem;
        line-height: 3rem;
    }
    </style>
    
    <body>
        <section>
            <header>
                <div class="header-left">
                    <a href="javascript:back()" class='sb-back'>
                        <img src="/ws/back-icon.png"  />
                    </a>
                </div>
                <div class="header-middle">	<span>客服系统</span>
                </div>
                <div class="layui-nav-item"><a href="#" >主页</a>
                </div>
            </header>
            <div class="chat-content">	<span class="list onclick" title="chat" onclick="choose(this)">当前对话</span>
	        <span class="list" title="wait" onclick="choose(this)">
				排队列表
				<div id="waitnum" class="hide"></div>
			</span>
            </div>
            <div style="background: #fbfbfb; height: 110px;"></div>
            <section id="chatlist" style="overflow-y: auto;overflow-y: auto;">
                <div class="no-list">
                    <img src="/ws/bg_empty_data.png"  alt="">
                    <p>暂时没有询问的哦~</p>
                </div>
                <b id="ddd"></b>
            </section>
            <section id="waitlist" style="overflow-y: auto; display: none;">
                <!-- 排队列表中没有内容时 -->
                <div class="no-list">
                    <img src="/ws/bg_empty_data.png" alt="">
                    <p>暂时没有排队的哦~</p>
                </div>
            </section>
        </section>
        <script>
        
        
        window.onscroll = function () {
            var  t = document.documentElement.scrollTop || document.body.scrollTop;
            var  h =  document.documentElement.clientHeight;
            var sh = document.documentElement.scrollHeight;
            
            if ((t+h) == sh) {
                if ($.cookie("visiter_id") != "") {
                    console.log(t);
                    getchat();
                }
            }
        }
        
        var choose = function (obj) {
            $(obj).addClass("onclick");
            $(obj).siblings().removeClass('onclick');
            var falg = $(obj).attr('title');
            if (falg == 'chat') {
                $("#chatlist").show();
                $("#waitlist").hide();
            } else {
                $("#chatlist").hide();
                $("#waitlist").show();
            }
        }

        var show = function () {
            var value = $('.layui-nav-child').css('display');

            if (value == 'block') {
                $('.layui-nav-child').css('display', 'none');
            } else {
                $('.layui-nav-child').css('display', 'block');
            }
        }
        var kefu_id = <?php echo $uinfo['id']; ?>;
        var kefu_name = <?php echo $uinfo['username']; ?>;
        var wolive_connect = function () {
            //建立WebSocket通讯
            var socket = new WebSocket('ws://api.jiaoyuhua.cn:7273');
            var user_img = "http://api.jiaoyuhua.cn/static/admin/images/a5.jpg";
            //连接成功时触发
        	socket.onopen = function(){
        		// 登录
                var login_data = '{"type":"init","id":"'+kefu_id+'","username":"<?php echo $uinfo['username']; ?>","avatar":"<?php echo $user_img; ?>","sign":"<?php echo $uinfo['sign']; ?>"}';
                socket.send(login_data);
                console.log("websocket握手成功!"); 
        	};
            //监听收到的消息
            socket.onmessage = function (res) {
                // console.log(res.data);
                var data = eval("(" + res.data + ")");
                switch (data['message_type']) {
                    // 服务端ping客户端
                case 'ping':
                    socket.send('{"type":"ping"}');
                    break;
                    // 登录 更新用户列表
                case 'init':
                    getchat();
                    getwait();
                    break;
                    // 检测聊天数据
                case 'chatMessage':
                    var str = data.data.content;
                    str.replace(/<img [^>]*src=['"]([^'"]+)[^>]*>/gi, function (match, capture) {
                        var pos = capture.lastIndexOf("/");
                        var value = capture.substring(pos + 1);
                        if (value.indexOf("emo") == 0) {
                            str = '[表情]';
                        } else {
                            str = '[图片]';
                        }
                    });
                    str = str.replace(/<div><a[^<>]+>.+?<\/a><\/div>/, '[文件]');
                    str = str.replace(/<img src=['"]([^'"]+)[^>]*>/gi, '[图片]');
              
                    console.log(str);
                    $("#msg" + data.data.id).html(str);
                    // getchat();
                    break;
                    // 离线消息推送
                case 'logMessage':
                     getchat();
                    break;
                    //切换在线状态
                case 'changeStatus':
                    getchat();
                    break;
                }
            }
            

        }

         // 获取排队列表

            function getwait() {

                $.ajax({
                    url: "<?php echo url('index/getwait'); ?>",
                    data: {
                        kefu_id:kefu_id
                    },
                    dataType: 'json',
                    success: function (res) {

                        if (res.code == 0) {
                            // alert(res);
                            $("#waitlist").empty();
                            var a = "";
                            $.each(res.data, function (k, v) {

                                if (v.state == "online") {
                                    a += '<div class="waiter">';
                                    a += '<img id="img' + v.visiter_id + '" class="am-radius w-avatar" src="' + v.avatar +
                                        '" width="50px" height="50px"><span class="wait_name" style="margin-left:20px;font-size: 20px;">' +
                                        v.visiter_name + '</span>';
                                    a += '<i class="layui-icon geticon" title="认领" onclick="get(' + "'" + v.visiter_id +
                                        "'" + ')">&#xe654;</i></div>';
                                } else {
                                    a += '<div class="waiter">';
                                    a += '<img id="img' + v.visiter_id +
                                        '"  class="am-radius w-avatar icon_gray"  src="' + v.avatar +
                                        '" width="50px" height="50px"><span class="wait_name" style="margin-left:20px;font-size: 20px;">' +
                                        v.visiter_name + '</span>';
                                    a += '<i class="layui-icon geticon" title="认领" onclick="get(' + "'" + v.visiter_id +
                                        "'" + ')">&#xe654;</i></div>';
                                }

                            });

                            $("#waitlist").append(a);

                            $("#waitnum").removeClass("hide");
                            $("#waitnum").addClass("waiticon");
                            $("#waitnum").text(res.num);
                        } else {

                            //$("#waitlist").empty();
                            $("#waitnum").removeClass("waiticon");
                            $("#waitnum").addClass("hide");
                        }
                    }

                });
            }



            // 对话列表
            function getchat() {
                if ($.cookie("visiter_id") != "") {
                    var visiter_id = $.cookie("visiter_id");
                } else {
                    var visiter_id = "";

                }
                $.ajax({
                    url: "<?php echo url('index/getchat'); ?>",
                    data: {
                        kefu_id:kefu_id,
                        visiter_id: visiter_id
                    },
                    success: function (res) {
                        $("#chatlist").empty();

                        if (res.code == 0) {
                            var sdata = $.cookie('cu_com');
                            if (sdata) {
                                var json = $.parseJSON(sdata);
                                var debug = json.visiter_id;
                            } else {
                                var debug = "";
                            }
                            var data = res.data;
                            var a = '';
                            $.each(data, function (k, v) {

                                var str = JSON.stringify(v);

                                if (v.state == 'online') {

                                    if (v.count == 0) {
                                        a += '<div class="visiter">';
                                        a += '<i class="layui-icon size" title="删除"  onclick="cut(' + "'" + v.visiter_id +
                                            "'" + ')"></i>';
                                        a += '<a class="visit_content" href="/index/index/chat.html?token=' + kefu_name +
                                            '&kefu_id=' + v.visiter_name + '">';
                                        a += '<img class="v-avatar" src="' + v.avatar + '" width="60px" height="60px">';
                                        a += '<span class="c_name">' + v.visiter_name + '</span><div id="msg' + v.visiter_id +
                                            '" class="newmsg">' + v.content + '</div></a>';
                                        a += '<span id="c' + v.visiter_id +
                                            '" class="notice-icon" style="display: none;"></span></div>';
                                    } else {
                                        a += '<div class="visiter">';
                                        a += '<i class="layui-icon size" title="删除" onclick="cut(' + "'" + v.visiter_id +
                                            "'" + ')"></i>';
                                        a += '<a class="visit_content" href="/index/index/chat.html?token=' + kefu_name +
                                            '&kefu_id=' + v.visiter_name + '">';
                                        a += '<img class="v-avatar" src="' + v.avatar + '" width="60px" height="60px">';
                                        a += '<span class="c_name">' + v.visiter_name + '</span><div id="msg' + v.visiter_id +
                                            '" class="newmsg">' + v.content + '</div></a>';
                                        a += '<span id="c' + v.visiter_id + '" class="notice-icon">' + v.count +
                                            '</span></div>';
                                    }

                                } else {

                                    if (v.count == 0) {
                                        a += '<div class="visiter">';
                                        a += '<i class="layui-icon size" title="删除" onclick="cut(' + "'" + v.visiter_id +
                                            "'" + ')"></i>';
                                        a += '<a class="visit_content" href="/index/index/chat.html?token=' + kefu_name +
                                            '&kefu_id=' + v.visiter_name + '">';
                                        a += '<img class="v-avatar icon_gray" src="' + v.avatar +
                                            '" width="60px" height="60px">';
                                        a += '<span class="c_name">' + v.visiter_name + '</span><div id="msg' + v.visiter_id +
                                            '" class="newmsg">' + v.content + '</div></a>';
                                        a += '<span id="c' + v.visiter_id +
                                            '" class="notice-icon" style="display: none;"></span></div>';
                                    } else {
                                        a += '<div class="visiter">';
                                        a += '<i class="layui-icon size" title="删除"  onclick="cut(' + "'" + v.visiter_id +
                                            "'" + ')"></i>';
                                        a += '<a class="visit_content" href="/index/index/chat.html?token=' + kefu_name +
                                            '&kefu_id=' + v.visiter_name + '">';
                                        a += '<img class="v-avatar icon_gray" src="' + v.avatar +
                                            '" width="60px" height="60px">';
                                        a += '<span class="c_name">' + v.visiter_name + '</span><div id="msg' + v.visiter_id +
                                            '" class="newmsg">' + v.content + '</div></a>';
                                        a += '<span id="c' + v.visiter_id + '" class="notice-icon">' + v.count +
                                            '</span></div>';

                                    }
                                }

                            });
                            
                            if (res.data.length > 2) {
                                $.cookie("visiter_id", res.data[0]['visiter_id']);
                            }
                            
                            $("#chatlist").append(a);
                        }
                    }
                });
            }

            // 认领

            function get(id) {
                $.ajax({
                    url: "http://yw.azmks.com/?id=get",
                    type: "post",
                    data: {
                        visiter_id: id
                    },
                    success: function (res) {

                        layer.msg("认领成功", {
                            offset: 'auto',
                            area: ['120px', '46px']
                        });

                        getwait();
                        getchat();
                    }
                });
            }

            // 删除

            function cut(id) {

                var data = $.cookie("cu_com");
                var visiter_checked;
                if (data) {
                    var jsondata = $.parseJSON(data);
                    visiter_checked = jsondata.visiter_id;
                }
                $.ajax({
                    url: "http://yw.azmks.com/?id=deletes",
                    type: "post",
                    data: {
                        visiter_id: id
                    },
                    dataType: 'json',
                    success: function (res) {
                        if (res.code == 0) {
                            layer.msg("删除成功", {
                                offset: 'auto',
                                area: ['120px', '46px']
                            });
                        }
                        // 删除修改
                        getchat();
                    }
                })
            }

        var init = function () {
            wolive_connect();
            getwait();
            getchat();
        }

        window.onload = init();

        function back() {
            history.back(-1);
            back_app();
        }

        function back_app() {
            window.WebViewJavascriptBridge.callHandler('closeActivity');
        }

        $().ready(function () {
            try {
                var callback = null;
                if (window.WebViewJavascriptBridge) {
                    return callback(WebViewJavascriptBridge);
                }
                if (window.WVJBCallbacks) {
                    return window.WVJBCallbacks.push(callback);
                }
                window.WVJBCallbacks = [callback];
                var WVJBIframe = document.createElement('iframe');
                WVJBIframe.style.display = 'none';
                WVJBIframe.src = 'wvjbscheme://__BRIDGE_LOADED__';
                document.documentElement.appendChild(WVJBIframe);
                setTimeout(function () {
                    document.documentElement.removeChild(WVJBIframe)
                }, 0)

            } catch (e) {}

        })
        /*$().ready(function(callback=null) {
			 window.WVJBCallbacks = [callback];
		    var WVJBIframe = document.createElement('iframe');
		    WVJBIframe.style.display = 'none';
		    WVJBIframe.src = 'wvjbscheme://__BRIDGE_LOADED__';
		    document.documentElement.appendChild(WVJBIframe);
		    setTimeout(function() { document.documentElement.removeChild(WVJBIframe) }, 0)
		
		}) */
        </script>
    </body>

</html>