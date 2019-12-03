<!DOCTYPE html>
<html>
    <head>
    <title>大数据天气展示</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>

        <select name="chose_graph">
        <option>--请选择--</option>
        <option value="option1">获取温度最高10大城市</option>
        <option value="option2" >获取温度最低10大城市</option>
        <option value="option3">下拉3</option>
        </select>

        <button onclick="show_graph()">select</button>
        <div id="show_ground">

        </div>
    </body>
    <script>
        function show_graph(){
            if ($("select[name='chose_graph'] option:selected").index() == 1){
                $.ajax({
                url: 'get_max10.php',
                cache: false,
                success: function(html) {
                    $("#show_ground").html(html);
                }
            });
            }
        }
    </script>
</html>