
function add(data,group) {


    var value = '';
    value += '<form id="info_form"><table>';
    value += '<tr class="sp_line"><td class="text-r">头像：</td><td class="am-form-group am-form-file"><img id="imgs" class="am-circle m-r-10" src=' + '"' + data.avatar + '"' + ' width="50" height="50"><button type="button" class="am-btn am-btn-default am-btn-sm">选择图片</button><input type="file" name="img_head" id="img_head" multiple></td></tr>'
    value += '<tr><td class="text-r">用户名：</td><td><span>'+data.user_name+'</span></td></tr>';
    value += '<tr><td class="text-r">昵称：</td><td><input type="text" class="am-form-field" id="nickname" name="nickname" value=' + '"' + data.nick_name + '"' + '></td></tr>';
    value += '<tr><td class="text-r">手机：</td><td><input type="text" id="phone" name="phone" class="am-form-field"  value=' + '"' + data.phone + '"' + '></td></tr>';
    value += '<tr><td class="text-r">邮箱：</td><td><input type="text" id="email" name="email" class="am-form-field" value=' + '"' + data.email + '"' + '></td></tr>';
    value += '<tr><td class="text-r">网站id：</td><td><span> '+data.business_id+' </span><input type="text" name="id" class="hide" value=' + '"' + data.service_id + '"' + '></td></tr>';
    value += '<tr><td class="text-r">客服分组：</td><td><div  class="am-form am-form-inline"><select id="classification" style=" width: 200px; font-size:12px; height: 38px;border-color: #ddd; " name="groupid" style="width: 200px;height: 38px;border-color: #ddd; ">';
    if(data.groupid == 0){
        value +='<option value="0" selected="selected">通用客服</option>';
    }
    $.each(group,function(k,v){
       if(v.id == data.groupid){
          value +='<option value="'+v.id+'" selected="selected">'+v.groupname+'</option>';
       } else{
      
          value +='<option value="'+v.id+'">'+v.groupname+'</option>';
       }
    });
    value +='<option value="0">通用客服</option>';
    value +='</div></td></tr>';
    value += '</table></form>';
    value += '<script>';
    value += 'function getObjectURL(file){var url =null;if(window.createObjectURL != undefined){url =window.createObjectURL(file);} else if(window.URL!=undefined){url = window.URL.createObjectURL(file);} else if(window.webkitURL!=undefined){url = window.webkitURL.createObjectURL(file);}return url;}$("#img_head").change(function(){var objUrl =getObjectURL(this.files[0]);console.log("objUrl="+objUrl);if(objUrl){ $("#imgs").attr("src",objUrl);}});';
    value += '</script>';
    layer.open({
        type: 1,
        title: '个人信息表',
        area: ['600px', '500px'],
        content: value,
        btn: ['修改', '取消'],
        yes: function () {
            $("#info_form").ajaxSubmit({
                url: "/admin/manager/update",
                type: 'post',
                success: function (res) {
                    if(res.code == 0){

                        layer.msg(res.msg, {icon: 1,time:2000,end:function () {
                            location.reload();
                        }});

                    }else{
                        layer.msg(res.msg, {icon: 0});
                    }

                }
            });

        }
    });

}




/**
 * 个人信息 的弹窗
 */

function showinfo(data) {


    var value = '';
    value += '<form id="info_form"><table>';
    value += '<tr class="sp_line"><td class="text-r">头像：</td><td class="am-form-group am-form-file"><img id="imgs" class="am-circle m-r-10" src=' + '"' + data.avatar + '"' + ' width="50" height="50"><button type="button" class="am-btn am-btn-default am-btn-sm">选择图片</button><input type="file" name="img_head" id="img_head" multiple></td></tr>'
    value += '<tr><td class="text-r">用户名：</td><td><span>'+data.user_name+'</span></td></tr>';
    value += '<tr><td class="text-r">客服名称：</td><td><input type="text" class="am-form-field" id="nickname" name="nickname" value=' + '"' + data.nick_name + '"' + '></td></tr>';
    value += '<tr><td class="text-r">客服类型：</td><td><div  class="am-form am-form-inline"><input type="text" name="id" class="hide" value=' + '"' + data.service_id + '"' + '><span>'+data.groupname+'</span>';
    
    value +='</div></td></tr>';
    value += '</table></form>';
    value += '<script>';
    value += 'function getObjectURL(file){var url =null;if(window.createObjectURL != undefined){url =window.createObjectURL(file);} else if(window.URL!=undefined){url = window.URL.createObjectURL(file);} else if(window.webkitURL!=undefined){url = window.webkitURL.createObjectURL(file);}return url;}$("#img_head").change(function(){var objUrl =getObjectURL(this.files[0]);console.log("objUrl="+objUrl);if(objUrl){ $("#imgs").attr("src",objUrl);}});';
    value += '</script>';
    layer.open({
        type: 1,
        title: '个人信息表',
        area: ['600px', '500px'],
        content: value,
        btn: ['修改', '取消'],
        yes: function () {
            $("#info_form").ajaxSubmit({
                url: "/admin/manager/update",
                type: 'post',
                success: function (res) {
                    if(res.code == 0){

                        layer.msg(res.msg, {icon: 1,time:2000,end:function () {
                            location.reload();
                        }});

                    }else{
                        layer.msg(res.msg, {icon: 0});
                    }

                }
            });

        }
    });

}
 
var modify =function(id){
    var str ='';
        str+='<form id="pass" class="passform"><table>';
        str+='<tr><td>请输入原密码：</td><td><input class="am-form-field w200" type="password" id="old" name="oldpass"></td></tr>';
        str+='<tr><td>请输入新密码：</td><td><input class="am-form-field w200" type="password" id="new" name="newpass"></td></tr>';
        str+='<tr><td>再次输入新密码：</td><td><input class="am-form-field w200" type="password" id="new2" name="newpass2" ></td></tr>';
        str+='<tr><td><input class="hide" type="text" name="id" value="'+id+'"><td></tr>'
        str+='</table></form>';

        layer.open({
           type:1,
           title:'修改密码',
           area:['400px','300px'],
           content:str,
           btn:['修改','取消'],
           yes:function(){

             $("#pass").ajaxSubmit({
                url: "/admin/manager/modify",
                type: 'post',
                success: function (res) {
                    if(res.code == 0){

                        layer.msg(res.msg, {icon: 1,time:2000,end:function () {
                            location.reload();
                        }});

                    }else{
                        layer.msg(res.msg, {icon: 0});
                    }

                }
             });

          
           }
        });

}