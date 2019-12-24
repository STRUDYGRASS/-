<!DOCTYPE html>
<html>

<head>
    <title>大数据天气展示</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <div id="h1" style="margan-top:20px;">
        <h1 align="center">大数据天气显示</h1>
    </div>
    <div id="select" align="center">
        <div id="list">
            <select name="chose_graph"
                style="text-align:center;text-align-last:center;padding-left:6px;width:230px;height:40px;background-color:#e8e8e8;border-radius:5px;border:0px">
                <option>---选择---</option>
                <option value="option1">获取温度最高10大城市</option>
                <option value="option2">获取温度最低10大城市</option>
                <option value="option3">获取经纬度和平均温度的关系</option>
                <option value="option4">获取海拔和平均温度的关系</option>
                <option value="option5">获取海拔和人口数量的关系</option>
                <option value="option6">获取绿化覆盖率和平均气温的关系</option>
                <option value="option7">获取GDP和绿化覆盖率的关系</option>
                <option value="option8">获取GDP和人口数量的关系</option>
                <option value="option9">获取GDP和城市暂住人口的关系</option>
                <option value="option10">获取人均GDP和海拔的关系</option>
                <option value="option11">获取人均GDP和平均气温的关系</option>
            </select>
        </div>
        <div id="br" style="height:10px;"></div>
        <button onclick="show_graph()"
            style="width:230px;height:40px;background-color:#e8e8e8;border-radius:5px;border:0px;">确认</button>
    </div>
    <br>
    <br>
    <div id="bottom" align="center">
        <div id="show_ground" style="width:70%;">
        </div>
    </div>
</body>
<script>
    function show_graph() {
        if ($("select[name='chose_graph'] option:selected").index() == 1) {
            $.ajax({
                url: 'get_max10.php',
                cache: false,
                success: function (html) {
                    $("#show_ground").html(html);
                }
            });
        } else if ($("select[name='chose_graph'] option:selected").index() == 2) {
            $.ajax({
                url: 'get_min10.php',
                cache: false,
                success: function (html) {
                    $("#show_ground").html(html);
                }
            });
        } else if ($("select[name='chose_graph'] option:selected").index() == 3) {
            $.ajax({
                url: '3d_ll-avtmp.php',
                cache: false,
                success: function (html) {
                    $("#show_ground").html(html);
                }
            });
        } else if ($("select[name='chose_graph'] option:selected").index() == 4) {
            $.ajax({
                url: 'scatter_alt-avtmp.php',
                cache: false,
                success: function (html) {
                    $("#show_ground").html(html);
                }
            });
        } else if ($("select[name='chose_graph'] option:selected").index() == 5) {
            $.ajax({
                url: 'scatter_alt-pop.php',
                cache: false,
                success: function (html) {
                    $("#show_ground").html(html);
                }
            });
        } else if ($("select[name='chose_graph'] option:selected").index() == 6) {
            $.ajax({
                url: 'scatter_green-avtmp.php',
                cache: false,
                success: function (html) {
                    $("#show_ground").html(html);
                }
            });
        } else if ($("select[name='chose_graph'] option:selected").index() == 7) {
            $.ajax({
                url: 'scatter_gdp-green.php',
                cache: false,
                success: function (html) {
                    $("#show_ground").html(html);
                }
            });
        } else if ($("select[name='chose_graph'] option:selected").index() == 8) {
            $.ajax({
                url: 'scatter_gdp-pop.php',
                cache: false,
                success: function (html) {
                    $("#show_ground").html(html);
                }
            });
        } else if ($("select[name='chose_graph'] option:selected").index() == 9) {
            $.ajax({
                url: 'scatter_gdp-tpop.php',
                cache: false,
                success: function (html) {
                    $("#show_ground").html(html);
                }
            });
        } else if ($("select[name='chose_graph'] option:selected").index() == 10) {
            $.ajax({
                url: 'scatter_pgdp-alt.php',
                cache: false,
                success: function (html) {
                    $("#show_ground").html(html);
                }
            });
        } else if ($("select[name='chose_graph'] option:selected").index() == 11) {
            $.ajax({
                url: 'scatter_pgdp-avtmp.php',
                cache: false,
                success: function (html) {
                    $("#show_ground").html(html);
                }
            });
        }
    }
</script>

</html>