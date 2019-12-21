<!DOCTYPE html>
<html>
    <head>
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<?php
set_time_limit(0);
$output = exec('python scatter_gdp-pop.py');
echo "<script>
var data = ";
echo iconv("GB2312","UTF-8",$output);
echo ";
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
// var data = [[2,3,1],[3,4,1]];

// 指定图表的配置项和数据
var option = {
    title: {
        text: 'GDP和人口数量的关系',
        x:'center',
        y:'top',
        textAlign:'left'
    },
    animation: false,
    legend: {
        show: false
    },
    tooltip: {
        trigger: 'item',
        axisPointer: {
            type: 'cross'
        }
    },
    xAxis: {
        type: 'value',
        min: 'dataMin',
        max: 'dataMax',
        splitLine: {
            show: true
        }
    },
    yAxis: {
        type: 'value',
        min: 'dataMin',
        max: 'dataMax',
        splitLine: {
            show: true
        }
    },
    series: [
        {
            name: 'scatter',
            type: 'scatter',

            symbolSize: function (val) {
                return val[2] * 10;
            },
            data: data
        },
      
    ]
}

// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);
</script>       
    </body>
</html>
