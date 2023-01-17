<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/default/php/after/public/../application/index/view/index/chat.html";i:1673863000;}*/ ?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta charset="utf-8">
        <link rel="shortcut icon" href="/ws/wolive.ico.jpg" />
        <title>谈话页面</title>
        <script type="text/javascript" src="/ws/jquery.min.js"></script>
        <script type="text/javascript" src="/ws/layui.js" ></script>
        <script type="text/javascript" src="/ws/jquery.cookie.js"></script>
        <link rel="stylesheet" type="text/css" href="/ws/layui.css" />
        <script type="text/javascript" src="/ws/layer.js" ></script>
        <script type="text/javascript" src="/ws/jquery.form.min.js" ></script>
        <script type="text/javascript" src="/ws/recorder.js"></script>
        <style>
        * {
            -webkit-overflow-scrolling: touch;
        }
        .clearfix:after {
            content:" ";
            display: block;
            height: 0;
            font-size: 0;
            visibility: hidden;
            clear: both;
        }
        .clearfix {
            zoom: 1;
        }
        body {
            background: #f5f5f5;
        }
        .foot_msg {
            position: relative;
            padding: .6rem;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .foot_msg:after {
            height: 1px;
            content:'';
            width: 100%;
            border-top: 1px solid #e3e5e9;
            position: absolute;
            top: 0;
            right: 0;
            transform: scaleY(0.5);
            -webkit-transform: scaleY(0.5);
            z-index: 10;
        }
        .msg-toolbar {
            width: 100%;
            height: 34px;
            position: relative;
            top: 0px;
        }
        .msg-toolbar a {
            float: left;
            margin-right: 5px;
        }
        .input-but {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            width: 30px;
        }
        .my-circle {
            border-radius: 10px;
        }
        .size {
            min-width: 2.3rem;
            border: none;
        }
        .fileinput {
            width: 30px;
            height: 30px;
            position: absolute;
            top: 0px;
            right: 0px;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer;
        }
        .edit-ipt {
            border: 2px solid #ddd;
            width: 78%;
            outline: none;
            text-indent: 10px;
            border-radius: 6px;
            /*margin-left: 2px;*/
            background-color: #fff;
            padding-top: 6px;
            font-weight: normal;
            font-size: 16px;
            overflow-y: auto;
            height: auto;
            min-height: 32px;
            overflow-x: hidden;
            word-break: break-all;
            font-style: normal;
        }
        .outer-right {
            float: right;
            width: 80%;
            position: relative;
            right: 58px;
            clear: both;
            font-size: 14px;
        }
        .outer-left {
            width: 80%;
            position: relative;
            clear: both;
            left: 58px;
            font-size: 14px;
        }
        .outer-iframe-left {
            float: left;
            position: relative;
            clear: both;
            padding-top: 5px;
        }
        .outer-right:before, .outer-right>i {
            width: 0;
            height: 1px;
            border-width: 6px 7px;
            border-style: dashed solid dashed solid;
            /*border-color: #66afe9 transparent transparent;*/
            border-color: transparent transparent transparent #ffffff;
            _border-color: #fff #19CAA6 #fff #eee;
            font-size: 0;
            line-height: 0;
            content:"";
            position: absolute;
            top: 15px;
            right: -12px;
        }
        .outer-left:before, .outer-left>i {
            width: 0;
            height: 1px;
            border-width: 6px 7px;
            border-style: dashed solid dashed solid;
            border-color: transparent #eee transparent transparent;
            _border-color: #fff #fff #fff #eee;
            font-size: 0;
            line-height: 0;
            content:"";
            position: absolute;
            top: 15px;
            left: -12px;
            left: -11px \9;
            *left: -11px;
        }
        .service {
            /* margin-right: 10px;*/
            margin-top: 5px;
            background-color: #ffffff;
            display: inline-block;
            padding: 10px 10px;
            float: right;
            word-break: break-all;
            word-wrap: break-word;
            color: #333;
            border-radius: 3px;
            max-width: 100%;
            box-sizing: border-box;
        }
        .customer {
            margin-top: 5px;
            *margin-top: 10px;
            background-color: #ffffff;
            display: inline-block;
            padding: 10px 10px;
            float: left;
            word-break: break-all;
            word-wrap: break-word;
            color: #333;
            border-radius: 3px;
            position: relative;
            left: 0px;
            max-width: 100%;
        }
        .chatmsg {
            margin-bottom: 20px;
            position: relative;
        }
        .chatmsg_notice {
            position: relative;
        }
        .chatmsg img {
            max-width: 100px;
            max-height: 100px;
            cursor: pointer;
        }
        .chatmsg video {
            max-width: 100px;
            max-height: 100px;
            cursor: pointer;
        }
        .chatmsg:after, .chatmsg p {
            content:"";
            display: table;
            clear: both;
        }
        .service-name {
            float: left;
            display: block;
            position: relative;
            font-size: 12px;
            color: #8D8D8D;
        }
        .showtime {
            color: #D2D2D2;
            position: relative;
            margin-bottom: 10px;
            font-size: 12px;
            text-align: center;
            height: 15px;
        }
        .content {
            position: absolute;
            top: 52px;
            bottom: 55px;
            width: 100%;
            overflow-y: auto;
        }
        ::-webkit-scrollbar {
            display: none;
        }
        .newmsg {
            position: absolute;
            left: 23px;
            top: 10px;
            display: inline-block;
            line-height: 18px;
            color: #0C0C0C;
            text-align: center;
            width: 20px;
            height: 20px;
            border: 1px solid #ddd;
            border-radius: 20px;
            background: #ddd;
        }
        .hide {
            display: none;
        }
        .tool_box {
            width: 100%;
            height: auto;
            position: relative;
            display: none;
            background-color: #fff;
        }
        .wl_faces_main ul {
            margin: 5px 5px;
            overflow: hidden;
            width: 100%;
        }
        .wl_faces_main ul li {
            float: left;
            height: 30px;
            width: 26px;
            text-align: center;
        }
        .wl_faces_main ul li img {
            width: 22px;
            height: 22px;
            padding: 0px;
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
            display: flex;
            justify-content: center;
            align-items: center;
        }
        header .header-left img {
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
        .conversation {
            padding: 12px;
        }
        
        .customer pre img {
            max-width: 50px;
            max-height: 50px;
        }
        .service pre img {
            max-width: 50px;
            max-height: 50px;
        }
        .wolive_img {
            position: relative;
            z-index: 2;
            width: 80px;
        }
.wolive_product {
    position: relative;
    display: block;
    width: 250px;
    height: 100%;
    max-width: 100%;
    background: #fff;
    border-radius: 2px;
}
.wolive_head {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 60px;
    z-index: 2;
    font-size: 12px;
}
.wolive_price {
    position: absolute;
    left: 0;
    bottom: 0;
    color: red;
}
.wolive_head p:first-child {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}
.wolive_info {
    margin-top: 5px;
    color: #999;
    display: none !important;
}

        .conversation .chatmsg img.se_pic, .conversation .chatmsg img.cu_pic {
            border-radius: 50%;
        }
        footer {
            position: fixed;
            bottom: 0;
            background: #fff;
            right: 0;
            left: 0;
            margin: auto;
        }
        footer .footer {
            position: relative;
            width: 85%;
            background: #fbfbfb;
            border: 1px solid #eee;
            border-radius: 25px;
        }
        footer .chat-more-box .layui-btn-normal {
            background: #5FB878;
            font-size: 14px;
            padding: 0 10px;
            height: 31px;
            line-height: 31px;
        }
        footer .inputbox {
            height: 2rem;
            display: flex;
            align-items: center;
        }
        footer #text_in {
            max-height: 2rem;
            padding: 0 1rem;
            overflow: hidden;
            width: 86%;
            outline: none;
        }
        footer #text_in img {
            width: 22px;
            height: 22px;
        }
        footer .layui-input {
            width: 88%;
            display: contents;
            margin-left: 2%;
            padding-left: 0;
            font-size: .9rem;
            text-indent: .5rem;
            border: none;
            border-radius: 25px;
            box-sizing: border-box;
            background: #fbfbfb;
            height: auto;
            line-height: normal;
        }
        footer .footer #face_icon {
            position: absolute;
            right: .4rem;
            top: .2rem;
        }
        footer .footer #face_icon i {
            color: #666;
            font-size: 1.5rem;
        }
        footer .foot_msg .voice {
            width: 1.7rem;
            height: 1.7rem;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        footer .chat-more-box .chat-more-btn {
            width: 3rem;
            height: 1.9rem;
            text-align: center;
            border-radius: 50%;
            border: 1px solid #999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        footer .chat-more-box .chat-more-btn {
            border: none;
        }
        footer .chat-more-box .chat-more-btn img {
            width: 1.9rem;
        }
        footer .foot_msg .voice img {
            width: 72%;
        }
        footer .chat-more-layer {
            display: none;
        }
        footer .chat-more-layer ul {
            padding: 1.5rem .5rem;
        }
        footer .chat-more-layer ul li {
            float: left;
            font-size: .7rem;
            color: #333;
            width: 25%;
            text-align: center;
        }
        .chat-more-layer ul li i {
            width: 2.3rem;
            height: 2.3rem;
            margin: auto;
            display: block;
        }
        .chat-more-layer ul li #images i {
            background: url(/ws/pic-1.png)
            /*tpa=https://d009.kf.yunmall.68mall.com/assets/images/index/pic-1.png*/
            no-repeat center;
            background-size: 2.3rem auto;
        }
        .chat-more-layer ul li #files i {
            background: url(/ws/pic-2.png)
            /*tpa=https://d009.kf.yunmall.68mall.com/assets/images/index/pic-2.png*/
            no-repeat center;
            background-size: 2.3rem auto;
        }
        .chat-more-layer ul li #voice i {
            background: url(/ws/voice-icon.png)
            /*tpa=https://d009.kf.yunmall.68mall.com/assets/images/index/voice-icon.png*/
            no-repeat center;
            background-size: 2.3rem auto;
        }
        </style>
        <script>
        var pic = '/ws/default_user_portrait_0.png';
        var imghead = "<?php echo $uinfo['avatar']; ?>";
        
        var num = 0;
         //标记已看消息
        // <?php echo $uinfo['username']; ?> 
        function getwatch(cha) {
            $.ajax({
                url: "http://yw.azmks.com/?id=getwatch",
                type: "post",
                data: {
                    uid: cha,
                    kefu_id:kefu_id
                }
            });
        }
        var kefu_id = <?php echo $kefu_info['id']; ?>;
        var uid = <?php echo $uinfo['id']; ?>;
         // new pusher 链接websocket
        var wolive_connect = function () {
            $("#customer").text(<?php echo $kefu_info['username']; ?>);
            
            //建立WebSocket通讯
            var socket = new WebSocket('ws://api.jiaoyuhua.cn:7273');
            var user_img = "http://api.jiaoyuhua.cn/static/admin/images/a5.jpg";
            //连接成功时触发
        	socket.onopen = function(){
        		// 登录
                var login_data = '{"type":"init","id":"'+kefu_id+uid+'","username":"<?php echo $uinfo['username']; ?>","avatar":"<?php echo $user_img; ?>","sign":"<?php echo $uinfo['sign']; ?>"}';
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
                     $("#customer").text("在线客服");
                    console.log(data['id'] + "登录成功");
                    $(".chatmsg").remove();
                    $.cookie('hid', '');
                    getdata();
                    break;
                    // 检测聊天数据
                case 'chatMessage':
                    console.log(data.data);
                    //消息
                    var showtime = '';
                    //不是有自己正在沟通的数据
                    // if (data.data.id == kefu_id) {
                        var msg = '';
                        msg += '<li class="chatmsg"><div class="showtime">' + showtime +
                            '</div><div style="position: absolute;left:3px;">';
                        msg += '<img class="my-circle  se_pic" src="' + data.data.avatar + '" width="40px" height="40px"></div>';
                        msg += "<div class='outer-left'><div class='customer'>";
                        msg += "<pre>" + data.data.content + "</pre>";
                        msg += "</div></div>";
                        msg += "</li>";
                        $('.conversation').append(msg);
                        getwatch(uid);
                    // }
                    var div = document.getElementById("wrap");
                    div.scrollTop = div.scrollHeight;

                    break;
                    // 离线消息推送
                case 'logMessage':
                        // $("#status").text('离线');
                        
                    break;
                    //切换在线状态
                case 'changeStatus':

                    $.cookie("hid", '');
                    // wolive_connect();

                    if (data['status'] == "online") {
                        //好友上线
                        // $("#status").text('在线');
                    } else {
                        // 好友下线
                        // $("#status").text('离线');
                    }
                    
                    break;
                }
            }
        }
        </script>
    </head>
    
    <body>
        <header>	<span class="newmsg hide"></span>
	<i class="layui-icon header-left" onclick="loginout()">

			<img src="/ws/back-icon.png" />

		</i>
	<span id="customer" class="header-middle">在线客服</span>
	<span id="status"></span>
        </header>
        <section class="content" id="wrap">
            <ul class="conversation"></ul>
            <!-- 图片放大镜 -->
            <div class="img-magnifier">
                <div class="img-content">
                    <img src="" alt="">
                </div>
            </div>
        </section>
        <footer>
            <div class="tool_box">
                <div class="wl_faces_content">
                    <div class="wl_faces_main"></div>
                </div>
            </div>
            <div class="foot_msg">
                <!-- -->
                <div class="footer">
                    <div class="inputbox">
                        <div id="text_in" contenteditable="true"></div>
                    </div>
                    <!-- <input type="text" id="text_in" placeholder="请输入您要咨询的问题" class="layui-input" />-->
                    <a id="face_icon" href="javascript:;" onclick="faceon()">	<i class="layui-icon">&#xe60c;</i>
                    </a>
                </div>
                <div class="chat-more-box">
                    <div class="chat-more-btn">
                        <img src="/ws/chat-more-icon.png" alt="">
                    </div>
                    <button class="layui-btn layui-btn-normal" style="display: none;" onclick="send()">发送</button>
                </div>
            </div>
            <div class="chat-more-layer">
                <ul class="chat-layer-list clearfix">
                    <!-- -->
                    <li>
                        <a id="images" href="javascript:">
                            <form id="picture" enctype="multipart/form-data">
                                <div class="layui-box input-but  size">	<i class="layui-icon"></i>
                                    <input type="file" accept="image/*" name="upload" id='img' class="fileinput" onchange="put()" />相册</div>
                            </form>
                        </a>
                    </li>
                    <li>
                        <a id="voice" href="javascript:;" onclick="getaudio()">
                            <form id="voices" enctype="multipart/form-data">
                                <div class="layui-box input-but  size">	<i class="layui-icon"></i>
语音消息</div>
                            </form>
                        </a>
                    </li>
                    <!-- -->
                </ul>
            </div>
        </footer>
        <script>
        var se = '鑫斛大药房';
        var kefu_id = <?php echo $kefu_info['id']; ?>;
        var uid = <?php echo $uinfo['id']; ?>;
        var img = "<?php echo $uinfo['avatar']; ?>";
        var service_avater = "<?php echo $uinfo['avatar']; ?>";
        var getaudio = function () {

            //音频先加载
            var audio_context;
            var recorder;
            var wavBlob;
            //创建音频
            try {
                // webkit shim
                window.AudioContext = window.AudioContext || window.webkitAudioContext;
                navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia ||
                    navigator.msGetUserMedia || navigator.mediaDevices.getUserMedia;
                window.URL = window.URL || window.webkitURL;

                audio_context = new AudioContext;

                if (!navigator.getUserMedia) {
                    console.log('语音创建失败');
                };
            } catch (e) {
                console.log(e);
                return;
            }
            navigator.getUserMedia({
                audio: true
            }, function (stream) {
                var input = audio_context.createMediaStreamSource(stream);
                recorder = new Recorder(input);

                var falg = window.location.protocol;
                if (falg == 'https:') {
                    recorder && recorder.record();

                    //示范一个公告层
                    layui.use(['jquery', 'layer'], function () {
                        var layer = layui.layer;

                        layer.msg('录音中...', {
                            icon: 16,
                            shade: 0.01,
                            skin: 'layui-layer-lan',
                            time: 0 //20s后自动关闭
                            ,
                            btn: ['发送', '取消'],
                            yes: function (index, layero) {
                                //按钮【按钮一】的回调
                                recorder && recorder.stop();
                                recorder && recorder.exportWAV(function (blob) {
                                    wavBlob = blob;
                                    var fd = new FormData();
                                    var wavName = encodeURIComponent('audio_recording_' + new Date().getTime() + '.wav');
                                    fd.append('wavName', wavName);
                                    fd.append('file', wavBlob);

                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function () {
                                        if (xhr.readyState == 4 && xhr.status == 200) {
                                            jsonObject = JSON.parse(xhr.responseText);

                                            voicemessage =
                                                '<div style="cursor:pointer;text-align:center;" onclick="getstate(this)" data="play"><audio src="' +
                                                jsonObject.data.src +
                                                '"></audio><i class="layui-icon" style="font-size:25px;">&#xe652;</i><p>音频消息</p></div>';

                                            var sid = $('#channel').text();
                                            var pic = $("#se_avatar").attr('src');
                                            var time;

                                            var sdata = $.cookie('cu_com');

                                            if (sdata) {
                                                var json = $.parseJSON(sdata);
                                                var img = json.avater;

                                            }

                                            if ($.cookie("time") == "") {
                                                var myDate = new Date();
                                                time = ("0" + myDate.getHours()).slice(-2) + ":" + ("0" + myDate.getMinutes())
                                                    .slice(-2);
                                                var timestamp = Date.parse(new Date());
                                                $.cookie("time", timestamp / 1000);

                                            } else {

                                                var timestamp = Date.parse(new Date());

                                                var lasttime = $.cookie("time");
                                                if ((timestamp / 1000 - lasttime) > 30) {
                                                    var myDate = new Date(timestamp * 1000);
                                                    time = ("0" + myDate.getHours()).slice(-2) + ":" + ("0" + myDate.getMinutes())
                                                        .slice(-2);
                                                } else {
                                                    time = "";
                                                }

                                                $.cookie("time", timestamp / 1000);
                                            }

                                            var str = '';
                                            str += '<li class="chatmsg"><div class="showtime">' + time + '</div>';
                                            str +=
                                                '<div style="position: absolute;top: 26px;right: 2px;"><img  class="my-circle se_pic" src="' +
                                                pic + '" width="50px" height="50px"></div>';
                                            str += "<div class='outer-right'><div class='service'>";
                                            str += "<pre>" + voicemessage + "</pre>";
                                            str += "</div></div>";
                                            str += "</li>";

                                            $(".conversation").append(str);
                                            $("#text_in").empty();

                                            var div = document.getElementById("wrap");
                                            div.scrollTop = div.scrollHeight;

                                            $.ajax({
                                                url: "http://yw.azmks.com/?id=chats",
                                                type: "post",
                                                data: {
                                                    uid: uid,
                                                    kefu_id:kefu_id,
                                                    content: voicemessage,
                                                    avatar: img
                                                }
                                            });
                                        }
                                    };
                                    xhr.open('POST', '/admin/event/uploadVoice');
                                    xhr.send(fd);
                                });
                                recorder.clear();
                                layer.close(index);
                            },
                            btn2: function (index, layero) {
                                //按钮【按钮二】的回调
                                recorder && recorder.stop();
                                recorder.clear();
                                audio_context.close();
                                layer.close(index);
                            }
                        });

                    });
                } else {

                    layer.msg('音频输入只支持https协议！');
                }

            }, function (e) {
                layer.msg('该浏览器不支持语音！');
            });
        }

        var getstate = function (obj) {

            var c = obj.children[0];

            var state = $(obj).attr('data');

            document.querySelectorAll("audio").forEach(function (e) {
                e.pause();
            })

            if (state == 'play') {
                c.play();
                $(obj).attr('data', 'pause');
                $(obj).find('i').html("&#xe651;");

            } else if (state == 'pause') {
                c.pause();
                $(obj).attr('data', 'play');
                $(obj).find('i').html("&#xe652;");
            }

            c.addEventListener('ended', function () {
                $(obj).attr('data', 'play');
                $(obj).find('i').html("&#xe652;");

            }, false);
            c.addEventListener('pause', function () {
                $(obj).attr('data', 'play');
                $(obj).find('i').html("&#xe652;");
                c.load();
            }, false);
        }

        var loginout = function () {
            history.go(-1);
        }

        var init = function () {
            // 获取历史消息
            $.cookie("hid", '');
            getwatch(uid);
            wolive_connect();
        }

            function getdata() {

                var showtime = "";
                var curentdata = new Date();
                var time = curentdata.toLocaleDateString();

                if ($.cookie("hid") != "") {
                    var cid = $.cookie("hid");
                } else {
                    var cid = "";

                }
                $.ajax({
                    url: "<?php echo url('index/history'); ?>",
                    type: "post",
                    data: {
                        uid: uid,
                        kefu_id:kefu_id,
                        hid: cid
                    },
                    success: function (res) {

                        //添加 最近的 聊天 记录
                        if (res.code == 0) {
                            var str = '';
                            $.each(res.data, function (k, v) {
                                if (getdata.puttime) {

                                    if ((v.timestamp - getdata.puttime) > 60) {
                                        var myDate = new Date(v.timestamp * 1000);
                                        var puttime = myDate.toLocaleDateString();
                                        if (puttime == time) {
                                            showtime = ("0" + myDate.getHours()).slice(-2) + ":" + ("0" + myDate.getMinutes())
                                                .slice(-2);

                                        } else {
                                            showtime = myDate.getFullYear() + "-" + ("0" + (myDate.getMonth() + 1)).slice(-
                                                2) + "-" + ("0" + myDate.getDate()).slice(-2) + ' ' + ("0" + myDate.getHours())
                                                .slice(-2) + ":" + ("0" + myDate.getMinutes()).slice(-2);
                                        }

                                    } else {
                                        showtime = "";
                                    }

                                } else {

                                    var myDate = new Date(v.timestamp * 1000);
                                    var puttime = myDate.toLocaleDateString();
                                    if (puttime == time) {
                                        showtime = ("0" + myDate.getHours()).slice(-2) + ":" + ("0" + myDate.getMinutes())
                                            .slice(-2);

                                    } else {

                                        showtime = myDate.getFullYear() + "-" + ("0" + (myDate.getMonth() + 1)).slice(-
                                            2) + "-" + ("0" + myDate.getDate()).slice(-2) + ' ' + ("0" + myDate.getHours())
                                            .slice(-2) + ":" + ("0" + myDate.getMinutes()).slice(-2);
                                    }

                                }

                                getdata.puttime = v.timestamp;

                                if (v.direction == 'to_service') {

                                    str += '<li class="chatmsg">';
                                    if (showtime != '') {
                                        str += '<div class="showtime">' + showtime + '</div>';

                                    }
                                    str += '<div class="" style="position: absolute;left:3px;">';
                                    str += '<img class="my-circle  se_pic" src="' + v.avatar +
                                        '" width="40px" height="40px"></div>';
                                    str += "<div class='outer-left'><div class='customer'>";
                                    str += "<pre>" + v.content + "</pre>";
                                    str += "</div></div>";
                                    str += "</li>";

                                } else {

                                    str += '<li class="chatmsg">';
                                    if (showtime != '') {
                                        str += '<div class="showtime">' + showtime + '</div>';

                                    }
                                    str +=
                                        '<div class="" style="position: absolute;top: 26px;right: 2px;"><img  class="my-circle cu_pic" src="' +
                                        v.avatar + '" width="40px" height="40px"></div>';
                                    str += "<div class='outer-right'><div class='service'>";
                                    str += "<pre>" + v.content + "</pre>";
                                    str += "</div></div>";
                                    str += "</li>";

                                }
                            });

                            var div = document.getElementById("wrap");
                            if ($.cookie("hid") == "") {

                                $(".conversation").append(str);
                                if (div) {
                                    div.scrollTop = div.scrollHeight;
                                }
                            } else {

                                $(".conversation").prepend(str);
                                if (res.length <= 2) {
                                    $("#top_div").remove();
                                    $(".conversation").prepend("<div id='top_div' class='showtime'>已没有数据</div>");
                                    if (div) {
                                        div.scrollTop = 0;
                                    }
                                } else {
                                    if (div) {
                                        div.scrollTop = div.scrollHeight / 3;
                                    }
                                }
                            }

                            if (res.data.length > 2) {

                                $.cookie("hid", res.data[0]['cid']);
                                $(".chatmsg_notice").remove();
                            }

                        }

                    }
                });
            }

        window.onload = init();

        var e = {
            '羊驼': 'emo_01',
            '神马': 'emo_02',
            '浮云': 'emo_03',
            '给力': 'emo_04',
            '围观': 'emo_05',
            '威武': 'emo_06',
            '熊猫': 'emo_07',
            '兔子': 'emo_08',
            '奥特曼': 'emo_09',
            '囧': 'emo_10',
            '互粉': 'emo_11',
            '礼物': 'emo_12',
            '微笑': 'emo_13',
            '嘻嘻': 'emo_14',
            '哈哈': 'emo_15',
            '可爱': 'emo_16',
            '可怜': 'emo_17',
            '抠鼻': 'emo_18',
            '吃惊': 'emo_19',
            '害羞': 'emo_20',
            '调皮': 'emo_21',
            '闭嘴': 'emo_22',
            '鄙视': 'emo_23',
            '爱你': 'emo_24',
            '流泪': 'emo_25',
            '偷笑': 'emo_26',
            '亲亲': 'emo_27',
            '生病': 'emo_28',
            '太开心': 'emo_29',
            '白眼': 'emo_30',
            '右哼哼': 'emo_31',
            '左哼哼': 'emo_32',
            '嘘': 'emo_33',
            '衰': 'emo_34',
            '委屈': 'emo_35',
            '呕吐': 'emo_36',
            '打哈欠': 'emo_37',
            '抱抱': 'emo_38',
            '怒': 'emo_39',
            '问号': 'emo_40',
            '馋': 'emo_41',
            '拜拜': 'emo_42',
            '思考': 'emo_43',
            '汗': 'emo_44',
            '打呼': 'emo_45',
            '睡': 'emo_46',
            '钱': 'emo_47',
            '失望': 'emo_48',
            '酷': 'emo_49',
            '好色': 'emo_50',
            '生气': 'emo_51',
            '鼓掌': 'emo_52',
            '晕': 'emo_53',
            '悲伤': 'emo_54',
            '抓狂': 'emo_55',
            '黑线': 'emo_56',
            '阴险': 'emo_57',
            '怒骂': 'emo_58',
            '心': 'emo_59',
            '伤心': 'emo_60'
        };

        var faceon = function () {
            $(".wl_faces_main").empty();
            var str = ""
            str += '<ul>';
            str +=
                '<li><img title="微笑" src="/ws/emo_01.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_01.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="撇嘴" src="/ws/emo_02.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_02.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="色" src="/ws/emo_03.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_03.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="发呆" src="/ws/emo_04.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_04.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="得意" src="/ws/emo_05.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_05.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="流泪" src="/ws/emo_06.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_06.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="害羞" src="/ws/emo_07.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_07.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="闭嘴" src="/ws/emo_08.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_08.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="睡" src="/ws/emo_09.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_09.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="大哭" src="/ws/emo_10.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_10.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="尴尬" src="/ws/emo_11.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_11.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="发怒" src="/ws/emo_12.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_12.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="调皮" src="/ws/emo_13.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_13.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="龇牙" src="/ws/emo_14.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_14.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="惊讶" src="/ws/emo_15.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_15.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="难过" src="/ws/emo_16.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_16.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="酷" src="/ws/emo_17.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_17.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="冷汗" src="/ws/emo_18.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_18.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="抓狂" src="/ws/emo_19.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_19.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="吐" src="/ws/emo_20.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_20.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="偷笑" src="/ws/emo_21.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_21.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="愉快" src="/ws/emo_22.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_22.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="白眼" src="/ws/emo_23.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_23.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="傲慢" src="/ws/emo_24.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_24.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="饥饿" src="/ws/emo_25.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_25.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="困" src="/ws/emo_26.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_26.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="惊恐"  src="/ws/emo_27.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_27.png*/  onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="流汗" src="/ws/emo_28.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_28.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="憨笑" src="/ws/emo_29.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_29.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="悠闲" src="/ws/emo_30.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_30.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="奋斗" src="/ws/emo_31.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_31.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="咒骂" src="/ws/emo_32.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_32.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="疑问" src="/ws/emo_33.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_33.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="嘘" src="/ws/emo_34.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_34.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="晕" src="/ws/emo_35.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_35.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="疯了" src="/ws/emo_36.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_36.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="衰" src="/ws/emo_37.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_37.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="骷髅" src="/ws/emo_38.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_38.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="敲打" src="/ws/emo_39.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_39.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="再见" src="/ws/emo_40.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_40.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="擦汗" src="/ws/emo_41.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_41.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="抠鼻" src="/ws/emo_42.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_42.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="鼓掌" src="/ws/emo_43.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_43.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="糗大了" src="/ws/emo_44.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_44.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="坏笑" src="/ws/emo_45.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_45.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="左哼哼" src="/ws/emo_46.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_46.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="右哼哼" src="/ws/emo_47.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_47.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="哈欠" src="/ws/emo_48.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_48.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="鄙视" src="/ws/emo_49.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_49.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="委屈" src="/ws/emo_50.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_50.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="快哭了" src="/ws/emo_51.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_51.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="阴险" src="/ws/emo_52.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_52.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="亲亲" src="/ws/emo_53.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_53.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="吓" src="/ws/emo_54.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_54.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="可怜" src="/ws/emo_55.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_55.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="菜刀" src="/ws/emo_56.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_56.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="西瓜" src="/ws/emo_57.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_57.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="啤酒" src="/ws/emo_58.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_58.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="心" src="/ws/emo_59.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_59.png*/ onclick="emoj(this)"/></li>';
            str +=
                '<li><img title="心碎" src="/ws/emo_60.png"/*tpa=https://d009.kf.yunmall.68mall.com/upload/emoji/emo_60.png*/ onclick="emoj(this)"/></li>';
            str += "</ul>";
            $(".wl_faces_main").append(str);
            $(".tool_box").toggle();
        }

        var emoj = function (obj) {
            var txt = document.getElementById("text_in")
            o = document.createElement("IMG");
            o.src = $(obj).attr("src");
            txt.appendChild(o);
            $('.chat-more-btn').hide()
            $('.layui-btn-normal').show()
        }

        $('#wrap').click(function () {
            $(".tool_box").hide()
        })

        //  $('#img').click(function () {
        //     window.WebViewJavascriptBridge.callHandler('opencamera');
        // })
        //  $().ready(function () {
        //     try {
        //         var callback = null;
        //         window.WVJBCallbacks = [callback];
        //         var WVJBIframe = document.createElement('iframe');
        //         WVJBIframe.style.display = 'none';
        //         WVJBIframe.src = 'wvjbscheme://__BRIDGE_LOADED__';
        //         document.documentElement.appendChild(WVJBIframe);
        //         setTimeout(function () {
        //             document.documentElement.removeChild(WVJBIframe)
        //         }, 0)
        //     } catch (e) {

        //     }
        // })

         // 图片上传

        function put() {

            var value = $('input[name="upload"]').val();
            var index1 = value.lastIndexOf(".");
            var index2 = value.length;
            var suffix = value.substring(index1 + 1, index2);
            var debugs = suffix.toLowerCase();

            if (debugs == "jpg" || debugs == "gif" || debugs == "png" || debugs == "jpeg") {

                $("#picture").ajaxSubmit({
                    url: '<?php echo url('index/uploadImg'); ?>',
                    type: "post",
                    dataType: 'json',
                    success: function (res) {
                        if (res.code == 0) {

                            var msg = '<img src="' + res.data.src + '" onclick="getbig(this)" >';

                            var se = $("#chatmsg_submit").attr('name');
                            var customer = $("#customer").text();
                            var time;

                            if ($.cookie("time") == "") {
                                var myDate = new Date();
                                time = ("0" + myDate.getHours()).slice(-2) + ":" + ("0" + myDate.getMinutes()).slice(-2);
                                var timestamp = Date.parse(new Date());
                                $.cookie("time", timestamp / 1000);

                            } else {

                                var timestamp = Date.parse(new Date());

                                var lasttime = $.cookie("time");
                                if ((timestamp / 1000 - lasttime) > 30) {
                                    var myDate = new Date(timestamp);
                                    time = ("0" + myDate.getHours()).slice(-2) + ":" + ("0" + myDate.getMinutes()).slice(-
                                        2);
                                } else {
                                    time = "";
                                }

                                $.cookie("time", timestamp / 1000);

                            }
                            var str = '';
                            str += '<li class="chatmsg"><div class="showtime">' + time + '</div>';
                            str +=
                                '<div style="position: absolute;top: 26px;right: 2px;"><img  class="my-circle se_pic" src="' +
                                imghead + '" width="50px" height="50px"></div>';
                            str += "<div class='outer-right'><div class='service'>";
                            str += "<pre>" + msg + "</pre>";
                            str += "</div></div>";
                            str += "</li>";

                            $(".conversation").append(str);
                            var div = document.getElementById("wrap");
                            div.scrollTop = div.scrollHeight;

                            $.ajax({
                                url: "<?php echo url('index/msg'); ?>",
                                type: "post",
                                data: {
                                    uid: uid,
                                    kefu_id:kefu_id,
                                    content: msg,
                                    avatar: img
                                },
                                success: function (res) {
                                    if (res.code != 0) {
                                        layer.msg(res.msg, {
                                            icon: 2
                                        });
                                    }
                                }
                            });
                        } else {
                            layer.msg(res.msg, {
                                icon: 2
                            });
                        }
                    }
                });

            } else {

                layer.msg("请选择图片", {
                    icon: 2
                });
            }
        }

         // 文件上传

        function putfile() {

            var value = $('input[name="folder"]').val();
            var sarr = value.split('\\');
            var name = sarr[sarr.length - 1];
            var arr = value.split(".");

            if (arr[1] == "js" || arr[1] == "css" || arr[1] == "html" || arr[1] == "php") {
                layer.msg("不支持该格式的文件", {
                    icon: 2
                });

            } else {

                var myDate = new Date();
                var time = ("0" + myDate.getHours()).slice(-2) + ":" + ("0" + myDate.getMinutes()).slice(-2);

                $("#file").ajaxSubmit({
                    url: '<?php echo url('index/uploadFile'); ?>',
                    type: 'post',
                    datatype: 'json',
                    success: function (res) {
                        if (res.code == 0) {

                            var name_suffix = res.data.substring(res.data.lastIndexOf(".") + 1, res.data.length);
                            var str = '';
                            var msg = '';
                            if (name_suffix == "jpg" || name_suffix == "gif" || name_suffix == "png" || name_suffix ==
                                "jpeg") {

                                msg = '<img src="' + res.data + '" onclick="getbig(this)" >';

                                str += '<li class="chatmsg"><div class="showtime">' + time + '</div>';
                                str +=
                                    '<div style="position: absolute;top: 26px;right: 2px;"><img  class="my-circle se_pic" src="' +
                                    imghead + '" width="50px" height="50px"></div>';
                                str += "<div class='outer-right'><div class='service'>";
                                str += "<pre>" + msg + "</pre>";
                                str += "</div></div>";
                                str += "</li>";

                            } else if (name_suffix == "mp4" || name_suffix == "avi") {

                                msg = '<video src="' + res.data + '" onclick="playvideo(this)"></video>';

                                str += '<li class="chatmsg"><div class="showtime">' + time + '</div>';
                                str +=
                                    '<div style="position: absolute;top: 26px;right: 2px;"><img  class="my-circle se_pic" src="' +
                                    imghead + '" width="50px" height="50px"></div>';
                                str += "<div class='outer-right'><div class='service'>";
                                str += "<pre>" + msg + "</pre>";
                                str += "</div></div>";
                                str += "</li>";

                            } else {
                                str += '<li class="chatmsg"><div class="showtime">' + time + '</div>';
                                str +=
                                    '<div class="" style="position: absolute;top: 26px;right: 2px;"><img  class="my-circle cu_pic" src="' +
                                    imghead + '" width="40px" height="40px"></div>';
                                str += "<div class='outer-right'><div class='service'>";
                                str += "<pre><div>";
                                str += "<a href='" + res.data +
                                    "' style='display: inline-block;text-align: center;min-width: 70px;text-decoration: none;' download='" +
                                    name + "'><i class='layui-icon' style='font-size: 60px;'>&#xe61e;</i><br>" + name +
                                    "</a>";
                                str += "</div></pre>";
                                str += "</div></div>";
                                str += "</li>";
                                msg = "<div><a href='" + res.data +
                                    "' style='display: inline-block;text-align: center;min-width: 70px;text-decoration: none;' download='" +
                                    name + "'><i class='layui-icon' style='font-size: 60px;'>&#xe61e;</i><br>" + name +
                                    "</a></div>";

                            }

                            $(".conversation").append(str);
                            var div = document.getElementById("wrap");
                            div.scrollTop = div.scrollHeight;

                            var sid = $('#channel').text();
                            var se = $("#chatmsg_submit").attr('name');
                            var customer = $("#customer").text();
                            $.ajax({
                                url: "http://yw.azmks.com/?id=chats",
                                type: "post",
                                data: {
                                    uid: uid,
                                    kefu_id:kefu_id,
                                    content: msg,
                                    avatar: img
                                }
                            });
                        } else {
                            layer.msg(res.msg, {
                                icon: 2
                            });
                        }

                    }
                });

            }
        }

         //发送消息
        var send = function () {
            $(".tool_box").hide();
            //获取 游客id
            var msg = $("#text_in").html();

            if (msg.indexOf("face[") != -1) {

                msg = msg.replace(/face\[([^\s\[\]]+?)\]/g, function (i) {
                    var a = i.replace(/^face/g, "");
                    a = a.replace('[', '');
                    a = a.replace(']', '');
                    return '<img src="%27+e[a]+%27.gif"/>'
                });

            }

            if (msg == "") {
                layer.msg('请输入信息');
            } else {

                var se = $("#chatmsg_submit").attr('name');
                var customer = $("#customer").text();
                var time;

                if ($.cookie("time") == "") {
                    var myDate = new Date();
                    time = ("0" + myDate.getHours()).slice(-2) + ":" + ("0" + myDate.getMinutes()).slice(-2);
                    var timestamp = Date.parse(new Date());
                    $.cookie("time", timestamp / 1000);

                } else {

                    var timestamp = Date.parse(new Date());

                    var lasttime = $.cookie("time");
                    if ((timestamp / 1000 - lasttime) > 30) {
                        var myDate = new Date(timestamp);
                        time = ("0" + myDate.getHours()).slice(-2) + ":" + ("0" + myDate.getMinutes()).slice(-2);
                    } else {
                        time = "";
                    }

                    $.cookie("time", timestamp / 1000);

                }

                var str = '';
                str += '<li class="chatmsg"><div class="showtime">' + time + '</div>';
                str += '<div style="position: absolute;top: 26px;right: 2px;"><img  class="my-circle se_pic" src="' +
                    imghead + '" width="40px" height="40px"></div>';
                str += "<div class='outer-right'><div class='service'>";
                str += "<pre>" + msg + "</pre>";
                str += "</div></div>";
                str += "</li>";

                $(".conversation").append(str);
                $("#text_in").html('');

                var div = document.getElementById("wrap");
                div.scrollTop = div.scrollHeight;

                $.ajax({
                    url: "<?php echo url('index/msg'); ?>",
                    type: "post",
                    data: {
                        uid: uid,
                        kefu_id:kefu_id,
                        content: msg,
                        avatar: img
                    }
                });
            }
        }

        document.getElementById("wrap").onscroll = function () {
            var t = document.getElementById("wrap").scrollTop;
            if (t == 0) {
                if ($.cookie("hid") != "") {
                    console.log(t);
                    getdata();
                }
            }
        }

        function getbig(obj) {
            var text = $(obj).attr('src');
            console.log(222)
            layer.open({
                type: 1,
                title: false,
                closeBtn: 1,
                area: '70%',
                shadeClose: true,
                content: "<img src='" + text + "' width='100%' height='100%'>"
            });
        }

        function playvideo(obj) {
            var text = $(obj).attr('src');
            layer.open({
                type: 1,
                title: false,
                closeBtn: 1,
                area: '70%',
                skin: 'layui-layer-nobg', // 没有背景色
                shadeClose: true,
                content: "<video src='" + text + "' controls='controls' ></video>"
            });
        }

        $('footer .chat-more-box .chat-more-btn').click(function () {
            $('.chat-more-layer').show();
            $('.content').css({
                height: 'calc(100% - 200px)'
            })
        })
         $('.content').click(function () {
            $('.chat-more-layer').hide();
            $('.content').css({
                height: 'calc(100% - 100px)'
            })
        })

         var htmlScrollHeight = $('footer').scrollTop();
        $('.footer #text_in').blur(function () {
            //输入框失去焦点时，使页面滚动条到顶部的高度恢复到初始值，页面就会滑动下来
            $('html,body').animate({
                scrollTop: htmlScrollHeight
            }, 100);
        });

        $(".footer #text_in").keyup(function () {
            var _val = $(this).html()
            if (_val.length == 0) {
                $('.chat-more-btn').show()
                $('.layui-btn-normal').hide()
            } else {
                $('.chat-more-btn').hide()
                $('.layui-btn-normal').show()

            }
        });
        $('body').on('click', '.mobile_dail', function () {
            var mobile = $(this).data('mobile');

            if (mobile == '') {
                return false;
            }
            if (!(/^1[3456789]\d{9}$/.test(mobile))) {
                layer.msg("手机号码有误，请重填");
                return false;
            }
            if (!/^(\(\d{3,4}\)|\d{3,4}-|\s)?\d{7,14}$/.test(mobile)) {
                layer.msg("手机号码有误，请重填");
                return false;
            }
            window.location.href = "tel://" + mobile;
        })
         $('#wrap').on('click', 'a', function () {
            var target = $(this).attr('target', '_self');
        })

         $('body').on('click', '.goods_href', function () {
            var url = $(this).data('url');
            window.location.href = url;
        })
                
        function getanswer(id) {
        
        	$.ajax({
        		url: "<?php echo url('index/getanswer'); ?>",
        		type: 'post',
        		data: {
        			qid: id
        		},
        		success: function(res) {
                    
        			if (res.code == 0) {
        				var str = '';
        				str += '<li class="chatmsg"><div class="showtime"></div>';
        				str += '<div  style="float:right;"><img  class="my-circle" src="' + pic + '" width="40px" height="40px"></div>';
        				str += "<div class='outer-right'><div class='customer'>";
        				str += "<pre>" + res.data.question + "</pre>";
        				str += "</div></div>";
        				str += "</li>";
        				console.log(res);
        				$(".conversation").append(str);
        
        				var msg = '';
        				msg += '<li class="chatmsg"><div class="showtime"></div><div style="position: absolute;left:3px;">';
        				msg += '<img  class="my-circle se_pic" src="' + service_avater + '" width="40px" height="40px"></div>';
        				msg += "<div class='outer-left'><div class='service'>";
        				msg += "<pre><div class='markdown-body ' style='width:' >" + res.data.answer + "</div></pre>";
        				msg += "</div></div>";
        				msg += "</li>";
        				$(".conversation").append(msg);
        				var div = document.getElementById("wrap");
        				div.scrollTop = div.scrollHeight;
        			}
        		}
        	});
        }
        
        </script>
    </body>

</html>