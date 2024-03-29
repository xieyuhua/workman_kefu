<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/default/php/after/public/../application/admin/view/index/index.html";i:1673511473;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>52gg后台默认首页</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <!-- Morris -->
    <link href="__CSS__/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="__JS__/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="__CSS__/animate.min.css" rel="stylesheet">
    <link href="__CSS__/style.min.css?v=4.1.0" rel="stylesheet">
    <style>
        .ibox-title span{cursor: pointer}
    </style>
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content">

    <!-- 上方tab -->
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right">日</span>
                    <span class="label pull-right">周</span>
                    <span class="label label-success pull-right">月</span>
                    <h5>收入</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">40 886,200</h1>
                    <small>总收入</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right">日</span>
                    <span class="label pull-right">周</span>
                    <span class="label label-success pull-right">月</span>
                    <h5>订单</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">275,800</h1>
                    <small>总订单</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right">日</span>
                    <span class="label pull-right">周</span>
                    <span class="label label-success pull-right">月</span>
                    <h5>注册</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">106,120</h1>
                    <small>新增</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="#question">
                        <i class="fa fa-question" style="color:red;margin-left:10px" data-container="body" data-toggle="popover" data-placement="bottom"
                           data-content="日活跃用户 = 当日登录游戏的用户 - 当日新增用户数(去重)@@@@@@@@月活跃用户 = 最近30天登录游戏的用户 - 最近30天新增用户(去重)">&nbsp;Tips</i>
                    </a>
                    <span class="label pull-right">日</span>
                    <span class="label pull-right">周</span>
                    <span class="label label-success pull-right">月</span>
                    <h5>活跃用户</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">80,600</h1>
                    <small>7月</small>
                </div>
            </div>
        </div>
    </div>

    <!-- 中间折线 -->
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>登录-注册-付费-订单</h5>
                    <div class="pull-right">
                        <div class="btn-group">
                            <h5>今日数据</h5>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-dashboard-chart" style="height: 250px"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <ul class="stat-list">
                                <li>
                                    <h2 class="no-margins">2,346</h2>
                                    <small>登录</small>
                                    <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins ">4,422</h2>
                                    <small>注册</small>
                                    <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: 60%;" class="progress-bar"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins ">9,180</h2>
                                    <small>付费</small>
                                    <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins ">1,180</h2>
                                    <small>订单</small>
                                    <div class="stat-percent">25% <i class="fa fa-bolt text-navy"></i>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: 25%;" class="progress-bar"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- 下方地图 -->
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row" style="height: 450px">
                        <div class="col-sm-6">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="map1" style="height: 450px"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="map2" style="height: 450px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__JS__/plugins/peity/jquery.peity.min.js"></script>
<script src="__JS__/content.min.js?v=1.0.0"></script>
<script src="__JS__/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="__JS__/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="__JS__/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="__JS__/plugins/echarts/echarts-all.js"></script>
<script type="text/javascript">
    $(function(){

        // 基于准备好的dom，初始化echarts实例
        var a = echarts.init(document.getElementById('flot-dashboard-chart'));
        b = {

            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['登录','注册','付费','订单']
            },

            grid: {
                left: '1%',
                top: '20%',
                right: '1%',
                bottom: '0%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['7月3日','7月6日','7月9日','7月12日','7月15日','7月18日','7月21日', '7月24日', '7月27日', '7月30日']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'登录',
                    type:'line',
                    stack: '总量',
                    data:[120, 132, 101, 134, 90, 230, 210, 210, 123, 165]
                },
                {
                    name:'注册',
                    type:'line',
                    stack: '总量',
                    data:[120, 132, 101, 134, 90, 230, 210, 210, 123, 165]
                },
                {
                    name:'付费',
                    type:'line',
                    stack: '总量',
                    data:[120, 132, 101, 134, 90, 230, 210, 210, 123, 165]
                },
                {
                    name:'订单',
                    type:'line',
                    stack: '总量',
                    data:[120, 132, 101, 134, 90, 230, 210, 210, 123, 165]
                },

            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        a.setOption(b);
        $(window).resize(a.resize);

        //map1用户充值分布
        var s = echarts.init(document.getElementById("map1"), 'infographic'),
        c = {
            title: {
                text: "充值用户分布",
                x: "center"
            },
            tooltip: {
                trigger: "item"
            },
            legend: {
                orient: "vertical",
                x: "left",
                data: ["充值用户分布"]
            },
            dataRange: {
                min: 0,
                max: 2500,
                x: "left",
                y: "bottom",
                text: ["高", "低"],
                calculable: !0
            },
            toolbox: {
                show: !0,
                orient: "vertical",
                x: "right",
                y: "center",
                feature: {
                    mark: {
                        show: !0
                    },
                    dataView: {
                        show: !0,
                        readOnly: !1
                    },
                    restore: {
                        show: !0
                    },
                    saveAsImage: {
                        show: !0
                    }
                }
            },
            roamController: {
                show: !0,
                x: "right",
                mapTypeControl: {
                    china: !0
                }
            },
            series: [{
                name: "充值用户分布",
                type: "map",
                mapType: "china",
                roam: !1,
                itemStyle: {
                    normal: {
                        label: {
                            show: !0
                        }

                    },
                    emphasis: {
                        label: {
                            show: !0
                        }

                    }
                },
                data: [{
                    name: "北京",
                    value: Math.round(1e3 * Math.random())
                },
                    {
                        name: "天津",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "上海",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "重庆",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "河北",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "河南",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "云南",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "辽宁",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "黑龙江",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "湖南",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "安徽",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "山东",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "新疆",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "江苏",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "浙江",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "江西",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "湖北",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "广西",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "甘肃",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "山西",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "内蒙古",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "陕西",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "吉林",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "福建",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "贵州",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "广东",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "青海",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "西藏",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "四川",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "宁夏",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "海南",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "台湾",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "香港",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "澳门",
                        value: Math.round(1e3 * Math.random())
                    }]
            }
            ]
        };
        s.setOption(c),
        $(window).resize(s.resize);

        //map2充值金额分布
        var d = echarts.init(document.getElementById("map2")),
        e = {
            title: {
                text: "充值金额分布",
                x: "center"
            },
            tooltip: {
                trigger: "item"
            },
            legend: {
                orient: "vertical",
                x: "left",
                data: ["充值金额分布"]
            },
            dataRange: {
                min: 0,
                max: 2500,
                x: "left",
                y: "bottom",
                text: ["高", "低"],
                calculable: !0
            },
            toolbox: {
                show: !0,
                orient: "vertical",
                x: "right",
                y: "center",
                feature: {
                    mark: {
                        show: !0
                    },
                    dataView: {
                        show: !0,
                        readOnly: !1
                    },
                    restore: {
                        show: !0
                    },
                    saveAsImage: {
                        show: !0
                    }
                }
            },
            roamController: {
                show: !0,
                x: "right",
                mapTypeControl: {
                    china: !0
                }
            },
            series: [{
                name: "充值金额分布",
                type: "map",
                mapType: "china",
                roam: !1,
                itemStyle: {
                    normal: {
                        label: {
                            show: !0
                        }
                    },
                    emphasis: {
                        label: {
                            show: !0
                        }
                    }
                },
                data: [{
                    name: "北京",
                    value: Math.round(1e3 * Math.random())
                },
                    {
                        name: "天津",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "上海",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "重庆",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "河北",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "河南",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "云南",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "辽宁",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "黑龙江",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "湖南",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "安徽",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "山东",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "新疆",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "江苏",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "浙江",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "江西",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "湖北",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "广西",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "甘肃",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "山西",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "内蒙古",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "陕西",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "吉林",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "福建",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "贵州",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "广东",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "青海",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "西藏",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "四川",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "宁夏",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "海南",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "台湾",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "香港",
                        value: Math.round(1e3 * Math.random())
                    },
                    {
                        name: "澳门",
                        value: Math.round(1e3 * Math.random())
                    }]
                }
            ]
        };
        d.setOption(e),
        $(window).resize(d.resize);
    })

</script>

</body>

</html>