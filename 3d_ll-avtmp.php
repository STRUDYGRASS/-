<!DOCTYPE html>
<html>
    <head>
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<?php
set_time_limit(0);
$output = exec('python 3d_ll-avtmp.py');

echo "<script>
var data = ";
echo iconv("GB2312","UTF-8",$output);
echo ";
</script>";
?>
<script src="script/echarts.js"></script>
<script src="script/echarts-gl.js"></script>
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
        text: '经纬度和平均温度的关系',
        x:'center',
        y:'top',
        textAlign:'left'
    },
    tooltip: {},
        visualMap: {
        max: 50,
        inRange: {
            color: ['#313695', '#4575b4', '#74add1', '#abd9e9', '#e0f3f8', '#ffffbf', '#fee090', '#fdae61', '#f46d43', '#d73027', '#a50026']
        }
    },
    xAxis3D: {
        type: 'value',
        name:'经度'
    },
    yAxis3D: {
        type: 'value',
        name:'纬度'
    },
    zAxis3D: {
        type: 'value',
        splitNumber : 30,
        name:'平均温度'
    },
    grid3D: {

    },
    series: [{
        type: 'bar3D',
        data: data.map(function (item) {
            return {
                value: [item[1], item[0], item[2]],
            }
        }),
        shading: 'lambert',
    }]
};

// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);
</script>       
    </body>
</html>
