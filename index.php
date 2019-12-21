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
        <option value="option3">获取平均温度和海拔的关系</option>
        <option value="option4">获取GDP和平均温度的关系</option>    
        <option value="option5">获取GDP和绿化率的关系</option>  
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
            else if ($("select[name='chose_graph'] option:selected").index() == 2){
                $.ajax({
                url: 'get_min10.php',
                cache: false,
                success: function(html) {
                    $("#show_ground").html(html);
                }
            }); 
            }
            else if ($("select[name='chose_graph'] option:selected").index() == 3){
                $.ajax({
                url: 'scatter_alt-avtmp.php',
                cache: false,
                success: function(html) {
                    $("#show_ground").html(html);
                }
            });
            }
            else if ($("select[name='chose_graph'] option:selected").index() == 4){
                $.ajax({
                url: 'scatter_gdp-avtmp.php',
                cache: false,
                success: function(html) {
                    $("#show_ground").html(html);
                }
            });
            }
            else if ($("select[name='chose_graph'] option:selected").index() == 5){
                $.ajax({
                url: 'get_green-gdp.php',
                cache: false,
                success: function(html) {
                    $("#show_ground").html(html);
                }
            });
            }
        }
    </script>
</html>