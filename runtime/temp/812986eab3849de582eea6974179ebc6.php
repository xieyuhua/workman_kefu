<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/default/php/after/public/../application/admin/view/layuser/index.html";i:1673511473;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laychat用户列表</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>客服列表</h5>
        </div>
        <div class="ibox-content">
            <div class="form-group clearfix col-sm-1">
                <button class="btn btn-outline btn-primary" type="button" id="adduser">添加客服</button>
            </div>
            <!--搜索框结束-->
            <div class="example-wrap">
                <div class="example">
                    <table id="cusTable" data-height="850">
                        <thead>
                        <th data-field="id">用户ID</th>
                        <th data-field="username">用户名</th>
                        <th data-field="groupid">所属群组</th>
                        <th data-field="avatar">头像</th>
                        <th data-field="operate">操作</th>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- End Example Pagination -->
        </div>
    </div>
</div>
<!-- End Panel Other -->
</div>
<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/static/admin/js/content.min.js?v=1.0.0"></script>
<script src="/static/admin/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="/static/admin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="/static/admin/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
<script src="/static/admin/js/plugins/suggest/bootstrap-suggest.min.js"></script>
<script src="/static/admin/js/plugins/layer/laydate/laydate.js"></script>
<script src="/static/admin/js/plugins/sweetalert/sweetalert.min.js"></script>
<script src="/static/admin/js/plugins/layer/layer.min.js"></script>
<script type="text/javascript">
    function initTable() {
        //先销毁表格
        $('#cusTable').bootstrapTable('destroy');
        //初始化表格,动态从服务器加载数据
        $("#cusTable").bootstrapTable({
            method: "get",  //使用get请求到服务器获取数据
            url: "./index", //获取数据的地址
            striped: true,  //表格显示条纹
            pagination: true, //启动分页
            pageSize: 10,  //每页显示的记录数
            pageNumber:1, //当前第几页
            pageList: [5, 10, 15, 20, 25],  //记录数可选列表
            sidePagination: "server", //表示服务端请求
            //设置为undefined可以获取pageNumber，pageSize，searchText，sortName，sortOrder
            //设置为limit可以获取limit, offset, search, sort, order
            queryParamsType : "undefined",
            queryParams: function queryParams(params) {   //设置查询参数
                var param = {
                    pageNumber: params.pageNumber,
                    pageSize: params.pageSize,
                    searchText:$('#rolename').val()
                };
                return param;
            },
            onLoadSuccess: function(){  //加载成功时执行
                layer.msg("加载成功", {time : 1000});
            },
            onLoadError: function(){  //加载失败时执行
                layer.msg("加载数据失败");
            }
        });
    }

    $(document).ready(function () {
        //调用函数，初始化表格
        initTable();

        //当点击查询按钮的时候执行
        $("#search").bind("click", initTable);

        $("#adduser").click(function(){
            //iframe层
            layer.open({
                type: 2,
                title: '添加客服',
                shadeClose: true,
                shade: false,
                maxmin: false, //开启最大化最小化按钮
                area: ['850px', '460px'],
                content: "<?php echo url('layuser/userAdd'); ?>"

            });
        });

    });

    function edit(id){
        //iframe层
        layer.open({
            type: 2,
            title: '编辑客服',
            shadeClose: true,
            shade: false,
            maxmin: false, //开启最大化最小化按钮
            area: ['850px', '520px'],
            content: '/admin/layuser/userEdit/id/'+id

        });
    }

    function userDel(id){

        //建立WebSocket通讯
        var socket = new WebSocket('ws://127.0.0.1:7272');

        layer.confirm('确认删除此用户?', {icon: 3, title:'提示'}, function(index){
            //do something
            $.getJSON('./userDel', {'id' : id}, function(res){
                if(res.code == 1){

                    var del_data = '{"type":"delUser", "data" : {"id" : ' + id + '}}';
                    socket.send( del_data );

                    layer.alert('删除成功', function(){
                        initTable();
                    });
                }else{
                    layer.alert('删除失败');
                }
            });

            layer.close(index);
        })

    }
</script>
</body>
</html>