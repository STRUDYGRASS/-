<!DOCTYPE html>
<html>
    <head>
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<?php
#header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
$output = exec('C:\Users\User\AppData\Local\Programs\Python\Python37\python.exe get_min10.py');

echo "<script>
var data = ".$output.";
</script>";
?>
<script src="script/echarts.js"></script>
    </head>
    <body>
        <div id="test" style="width: 1000px;height:800px;">
        </div>

        <script>
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('test'));

// 指定图表的配置项和数据
var option = {
    title: {
        text: 'ECharts 入门示例'
    },
    tooltip: {},
    grid:{//直角坐标系内绘图网格
            show:true,//是否显示直角坐标系网格。[ default: false ]
            left:"20%",//grid 组件离容器左侧的距离。
            right:"30px",
            borderColor:"#c45455",//网格的边框颜色
            bottom:"20%" //
        },
    legend: {
        data:['销量']
    },
    xAxis: {
        axisLabel : {//坐标轴刻度标签的相关设置。
                interval:0,
                rotate:"45"
            },
        data: data[0]
    },
    yAxis: {
    },
    series: [{
        name: '销量',
        type: 'bar',
        data: data[1],
        itemStyle: {
                    normal: {
                        label: {
                            show: true, //开启显示
                            position: 'top', //在上方显示
                            textStyle: { //数值样式
                                color: 'black',
                                fontSize: 16
                            }
                        }
                    }
                },
    }]
};

// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);
</script>       
    </body>
</html>
