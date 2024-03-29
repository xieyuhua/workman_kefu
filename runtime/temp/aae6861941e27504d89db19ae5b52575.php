<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/default/php/after/public/../application/index/view/chatlog/index.html";i:1673511473;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>聊天记录</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/jsTree/style.min.css" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox chat-view">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-9 ">
                            <div id="chatlog">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/static/admin/js/content.min.js?v=1.0.0"></script>
<link rel="stylesheet" href="/static/layui/build/css/layui.css" media="all">
<script src="/static/layui/build/layui.js"></script>
<script type="text/javascript">
    $(function(){

        $.getJSON("<?php echo url('chatlog/detail'); ?>", {'id' : <?php echo $id; ?>, 'type' : "<?php echo $type; ?>"}, function(res){
            var _html = '';
            if( 1 == res.code ){
                $.each(res.data, function(k, v){
                    _html += '<div class="chat-message"><div class="message"><a class="message-author" href="#"> '+ v.fromname +' </a>';
                    _html += '<span class="message-date"> '+ getLocalTime(v.timeline) +' </span>';
                    _html += '<span class="message-content">'+ parent.layui.layim.content(v.content) +'</span></div></div>';
                });
                $("#chatlog").html(_html);

            }else{

            }
        })
    });
    function getLocalTime(nS) {
        return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, "");
    }
</script>
</body>
</html>