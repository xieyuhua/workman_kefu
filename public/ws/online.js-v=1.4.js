
function getnow(data) {
    $.ajax({
        url:"/admin/set/getchatnow",
        type:"post",
        data:{sdata:data},
        dataType:'json',
        success:function (res) {

            var a="";
            if(res.code == 0){
               getchat();
            }
        }
    });
}


//储存 频道
var chaarr = new Array();

//初始化 监听
var getonline = function () {
     setTimeout(getchat,500);
    $.cookie("time","");
    $(".conversation").empty();
};

window.onload = getonline();

// 获取访客状态
function getstatus(cha) {
    $.ajax({
        url:'/admin/set/getstatus',
        type:'post',
        data:{channel:cha},
        dataType:'json',
        success:function(res){
            if(res.code ==0){
                if(res.data){
                  if(res.data.state == 'online'){
                    $("#v_state").text("在线");
                  }else{
                    $("#v_state").text("离线");
                  }
                }
            }
        }
    });
}

// 正在聊天的队列表
function getchat() {
	//只有在对话页面才加载
	var url =window.location.pathname;
	if(url =='/admin/index/chats.html'){
		
		//判断当前访问页面
	    $.ajax({
	        url: "/admin/set/getchats",
	        success: function (res) {
	          
	            
	            if (res.code == 0) {
	                $("#chat_list").empty();
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
	                    chat_data['visiter'+v.vid] =v;
	                    if (debug == v.visiter_id) {

	                        $(".chatbox").removeClass('hide');
	                        $(".no_chats").addClass('hide');

	                       if (v.state == 'online') {
	                            a += '<div id="v' + v.channel + '" class="visiter onclick" onmouseover="showcut(this)" onmouseout="hidecut(this)" ><i class="layui-icon myicon hide" title="删除" style="font_weight:blod" onclick="cut(' + "'" + v.visiter_id + "'" + ')">&#x1006;</i><span id="c' + v.channel  + '" class="notice-icon hide"></span>';
	                            a += "<div class='visit_content' onclick='choose(" +v.vid+ ")'><input type='checkbox' name='visiter_ids[]' value='"+v.visiter_id+"'><div class='new-content'><img class='am-radius v-avatar' id='img" +v.channel + "' src='" + v.avatar + "' width='50px'><span class='c_name'>" + v.visiter_name + "</span><div id='msg" +v.channel  + "' class='newmsg'>"+v.content+"</div></div>";
	                            a += '</div></div>';
	                        } else {
	                            a += '<div id="v' + v.channel + '" class="visiter onclick" onmouseover="showcut(this)" onmouseout="hidecut(this)"><i class="layui-icon myicon hide" title="删除" style="font_weight:blod" onclick="cut(' + "'" + v.visiter_id + "'" + ')">&#x1006;</i><span id="c' +v.channel + '" class="notice-icon hide"></span>';
	                            a += "<div class='visit_content' onclick='choose(" +v.vid+ ")'><input type='checkbox' name='visiter_ids[]' value='"+v.visiter_id+"'><div class='new-content'><img class='am-radius v-avatar icon_gray' id='img" + v.channel  + "' src='" + v.avatar + "' width='50px'><span class='c_name'>" + v.visiter_name + "</span><div id='msg" +v.channel  + "' class='newmsg'>"+v.content+"</div></div>";
	                            a += '</div></div>';
	                        }

	                    } else {
	                        if(v.count == 0){

	                            if (v.state == 'online') {
	                                a += '<div id="v' + v.channel + '" class="visiter" onmouseover="showcut(this)" onmouseout="hidecut(this)"><i class="layui-icon myicon hide" title="删除" style="font_weight:blod" onclick="cut(' + "'" + v.visiter_id + "'" + ')">&#x1006;</i><span id="c' +v.channel + '" class="notice-icon hide"></span>';
	                                a += "<div class='visit_content' onclick='choose(" +v.vid+ ")'><input type='checkbox' name='visiter_ids[]' value='"+v.visiter_id+"'><div class='new-content'><img class='am-radius v-avatar' id='img" + v.channel + "' src='" + v.avatar + "'  width='50px'><span class='c_name'>" + v.visiter_name + "</span><div id='msg" + v.channel + "' class='newmsg'>"+v.content+"</div></div>";
	                                a += '</div></div>';
	                            } else {
	                                a += '<div  id="v' + v.channel + '" class="visiter" onmouseover="showcut(this)" onmouseout="hidecut(this)"><i class="layui-icon myicon hide" title="删除" style="font_weight:blod" onclick="cut(' + "'" + v.visiter_id + "'" + ')">&#x1006;</i><span id="c' + v.channel + '" class="notice-icon hide"></span>';
	                                a += "<div class='visit_content' onclick='choose(" +v.vid+ ")'><input type='checkbox'  name='visiter_ids[]' value='"+v.visiter_id+"'><div class='new-content'><img class='am-radius v-avatar icon_gray' id='img" + v.channel + "' src='" + v.avatar + "'  width='50px'><span class='c_name'>" + v.visiter_name + "</span><div id='msg" + v.channel + "' class='newmsg'>"+v.content+"</div></div>";
	                                a += '</div></div>';
	                            }

	                        }else{

	                            if (v.state == 'online') {
	                                a += '<div id="v' + v.channel + '" class="visiter" onmouseover="showcut(this)" onmouseout="hidecut(this)"><i class="layui-icon myicon hide" title="删除" style="font_weight:blod" onclick="cut(' + "'" + v.visiter_id + "'" + ')">&#x1006;</i><span id="c' +v.channel + '" class="notice-icon">'+v.count+'</span>';
	                                a += "<div class='visit_content' onclick='choose(" +v.vid+ ")'><input type='checkbox' name='visiter_ids[]' value='"+v.visiter_id+"'><div class='new-content'><img class='am-radius v-avatar' id='img" + v.channel + "' src='" + v.avatar + "'  width='50px'><span class='c_name'>" + v.visiter_name + "</span><div id='msg" + v.channel + "' class='newmsg'>"+v.content+"</div></div>";
	                                a += '</div></div>';
	                            } else {
	                                a += '<div  id="v' + v.channel + '" class="visiter" onmouseover="showcut(this)" onmouseout="hidecut(this)"><i class="layui-icon myicon hide" title="删除" style="font_weight:blod" onclick="cut(' + "'" + v.visiter_id + "'" + ')">&#x1006;</i><span id="c' + v.channel + '" class="notice-icon">'+v.count+'</span>';
	                                a += "<div class='visit_content' onclick='choose(" +v.vid+ ")'><input type='checkbox' name='visiter_ids[]' value='"+v.visiter_id+"'><div class='new-content'><img class='am-radius v-avatar icon_gray' id='img" + v.channel + "' src='" + v.avatar + "'  width='50px'><span class='c_name'>" + v.visiter_name + "</span><div id='msg" + v.channel + "' class='newmsg'>"+v.content+"</div></div>";
	                                a += '</div></div>';
	                            }

	                        }
	                        
	                     
	                    }
	                  
	                });
	                $("#chat_list").append(a);
	            } else {
	                $("#chat_list").empty();
	                $(".chatbox").addClass('hide');
	                $(".no_chats").removeClass('hide');
	                $.cookie('cu_com', "");
	            }
	        }
	    });
	}
	
}

function showcut(obj){
    $(obj).children('i').removeClass('hide');
}

function hidecut(obj){
    $(obj).children('i').addClass('hide');
}

//获取队列的实时数据
function getwait() {

    $.ajax({
        url: "/admin/set/getwait",
        dataType:'json',
        success: function (res) {

            if (res.code == 0) {
              
                $("#wait_list").empty();
                var a = "";
                $.each(res.data, function (k, v) {

                    if(v.state == "online"){
                        a += '<div class="waiter">';
                        a += '<img id="img'+v.visiter_id+'" class="am-radius w-avatar" src="' + v.avatar + '" width="50px" height="50px"><span class="wait_name">' + v.visiter_name + '</span>';
                        a += "<div class='newmsg'>"+v.groupname+"</div>";
                        a += '<i class="mygeticon " title="认领" onclick="get(' + "'" + v.visiter_id + "'" + ')"></i></div>';
                    }else{
                        a += '<div class="waiter">';
                        a += '<img id="img'+v.visiter_id+'"  class="am-radius w-avatar icon_gray"  src="' + v.avatar + '" width="50px" height="50px"><span class="wait_name">' + v.visiter_name + '</span>';
                        a += "<div class='newmsg'>"+v.groupname+"</div>";
                        a += '<i class="mygeticon " title="认领" onclick="get(' + "'" + v.visiter_id + "'" + ')"></i></div>';
                    }
                });
                $("#wait_list").append(a);

                $("#notices-icon").removeClass('hide');
                $("#waitnum").removeClass('hide');
                $("#waitnum").text(res.num);
                document.title ="【有客户等待】"+myTitle;


            } else {

                $("#wait_list").empty();
                $("#waitnum").addClass('hide');
                document.title =myTitle;
            }
        }
    });

}


//获取黑名单
function getblacklist() {

    $.ajax({
        url: "/admin/set/getblackdata",
        dataType:'json',
        success: function (res) {

            if (res.code == 0) {
              
                $("#black_list").empty();
                var data = res.data;
                var a = "";
                $.each(data, function (k, v) {

                    a += '<div class="visiter"><img class="am-radius v-avatar" src="' + v.avatar + '" width="50px">';
                    a += ' <span style="position:absolute;left:65px;top:10px; right:80px;font-size: 14px;">' + v.visiter_name + '</span><button class="am-btn am-btn-danger am-btn-xs" style="position:absolute;right:10px;top:22px;" onclick="cut(' + "'" + v.visiter_id + "'" + ')">删除</button></div>';
                });

                $("#black_list").append(a);
            } else {

                $("#black_list").empty();
            }
        }
    });
}




//获取ip的详细信息
var getip = function (cip) {
    $.ajax({
        url: "/admin/set/getipinfo",
        type: "get",
        data: {
            ip: cip
        },
        dataType:'json',
        success: function (res) {

            if(res.code == 0){
                var data = res.data;
                var str = "";
                str += data[0] + " 、";
                str += data[1] + " 、";
                str += data[2];
                $(".iparea").text(str);
            }
           
        }
    })
};

//标记已看消息
function getwatch(cha) {
    $.ajax({
        url: "/admin/set/getwatch",
        type: "post",
        data: {visiter_id: cha}
    });
}

//获取最近历史消息
function getdata(cha) {

    var avatver;
    var sdata = $.cookie("cu_com");
    if (sdata) {
        var jsondata = $.parseJSON(sdata);
        avatver = jsondata.avatar;
    }
    var showtime;
    var curentdata =new Date();
    var time =curentdata.toLocaleDateString();
    var cmin =curentdata.getMinutes();
    if($.cookie("hid") != "" ){
        var cid =$.cookie("hid");
    }else{
        var cid ="";
    }
    var loading = layer.load(2);
			
    $.ajax({
        url: "/admin/set/chatdata",
        type: "post",
        data: {
            visiter_id: cha,hid:cid
        },
        dataType:'json',
        success: function (res) {
            // alert(res);
//        	alert(getdata.puttime);
        	layer.close(loading);
            if (res.code == 0) {
                getwatch(cha);
                var se = $("#chatmsg_submit").attr("name");
                var str = "";
                var data = res.data;
                var pic = $("#se_avatar").attr('src');
                var last_time;
                $.each(data, function (k, v) {
                    if(last_time){
                    	
                        if((v.timestamp -last_time) > 60){
                            var myDate = new Date(v.timestamp*1000);
                            var daytime =myDate.toLocaleDateString();
                            if(daytime == time){
                            	showtime = ("0"+myDate.getHours()).slice(-2)+":"+("0"+myDate.getMinutes()).slice(-2);

                            }else{
                            	showtime =myDate.getFullYear()+"-"+("0"+(myDate.getMonth()+1)).slice(-2)+"-"+("0"+myDate.getDate()).slice(-2)+' '+("0"+myDate.getHours()).slice(-2)+":"+("0"+myDate.getMinutes()).slice(-2);
                            }

                        }else{
                            
                            showtime = "";
                        }

                    }else{

                        var myDate = new Date(v.timestamp*1000);
                        var daytime =myDate.toLocaleDateString();
                        if(daytime == time){
                        	showtime = ("0"+myDate.getHours()).slice(-2)+":"+("0"+myDate.getMinutes()).slice(-2);

                        }else{
                        	showtime =myDate.getFullYear()+"-"+("0"+(myDate.getMonth()+1)).slice(-2)+"-"+("0"+myDate.getDate()).slice(-2)+' '+("0"+myDate.getHours()).slice(-2)+":"+("0"+myDate.getMinutes()).slice(-2);
                        }
                    }
                    last_time = v.timestamp;

                
                     
                    if (v.direction == 'to_visiter') {

                        str += '<li class="chatmsg"><div class="showtime">'+showtime+'</div>';
                        str += '<div class="" style="position: absolute;top: 26px;right: 2px;"><img  class="my-circle cu_pic" src="' + pic + '" width="50px" height="50px"></div>';
                        str += "<div class='outer-right'><div class='service'>";
                        str += "<pre>" + v.content + "</pre>";
                        str += "</div></div>";
                        str += "</li>";
                    } else{

                        str += '<li class="chatmsg"><div class="showtime">' +showtime+ '</div><div class="" style="position: absolute;left:3px;">';
                        str += '<img class="my-circle  se_pic" src="' + avatver + '" width="50px" height="50px"></div>';
                        str += "<div class='outer-left'><div class='customer'>";
                        str += "<pre>" + v.content + "</pre>";
                        str += "</div></div>";
                        str += "</li>";
                    }
                   
                });

                var div = document.getElementById("wrap");
                if($.cookie("hid") == ""){
                 
                    $(".conversation").append(str);

                    if(div){
                        div.scrollTop = div.scrollHeight;
                    }
                }else{
                    $(".conversation").prepend(str);
                    if(res.data.length <= 2){

                        $("#top_div").remove();
                        $(".conversation").prepend("<div id='top_div' class='showtime'>已没有数据</div>");
                        if(div){
                            div.scrollTop =0;
                        }

                    }else{
                        if(div){
                            div.scrollTop =div.scrollHeight/3;
                        }
                    }
                }
                if(res.data.length >0){
                    $.cookie("hid",data[0]['cid']);

                }

            }
        }
    });
}
