<?php
header( 'Content-Type:text/html;charset=utf-8 ');
require'conn.php';
$id = $_GET['id'];
$sql="select * from article where id={$id}";
$rs=mysql_query($sql,$connect);
?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>blog</title>
    <!-- 使用chrome和最新版ie渲染 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="keywords" content="blog" />
    <meta name="description" content="blog" />
    <meta name="author" content="link" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"
    />
    <script src="js/vue.js"></script>
    <script type="text/javascript" src="js/move.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">

</head>

<body>
    <!-- header -->
    <div id="head-wrapper">
        <div class="head">
            <ul class="navbar">
                <li v-for="nav in navs">
                    <a href="index.html">{{nav.navbars}}</a>
                    <span>-</span>
                </li>
            </ul>
        </div>
    </div>
    <!-- header -->
 <?php
 while($obj=mysql_fetch_object($rs))
{
    echo "<div id='list-art' style='width: 70%; height: auto;margin: 20px auto;text-align:center;'>";
    echo "<img src='{$obj->imgsrc}' style='width:50%;margin: 0x auto;mdisplay:block;'>";
    echo "<h2 style='text-align:center;'>{$obj->title}</h2>";
    echo "<h3 style='text-align:center;'>内容</h3>";
    echo "<p style='background:#111;color:#A6E22E;'>{$obj->allcontent}</p>";
    echo "</div>";
}
 ?>
     <div id="footer-wrapper">
        <div class="footer">
            <p style="color:white;font-size: 16px;text-align: center;line-height: 200px;">vue--------------------------</p>
        </div>
    </div>
     <script type="text/javascript">
        //请求菜单数据
        window.onload = function () {
            var meun = [];
            var content = [];
            (function () {
                var xmlhttp;
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                }
                else {

                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                };

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        var meunData = xmlhttp.responseText;
                        var meunD = JSON.parse(meunData);
                        //console.log(meunD)
                        //解析JSON,遍历加入菜单数组
                        for (key in meunD) {
                            //console.log(meunD[key]);
                            meun.push(meunD[key]);
                        }
                    }
                }
                var timeb =Date();
                console.log(timeb);
                xmlhttp.open("GET", `http://127.0.0.1/project/jsondata/meun.json?tim=${timeb}`, true);
                xmlhttp.send();
                console.log(meun);
            })();
            let navbar = new Vue({
                el: ".navbar",
                data: {
                    navs: meun
                    /*            [
                                    //后台传回json
                                    {navbars:"首页"},
                                    {navbars:"个人"},
                                    {navbars:"简介"},
                                    {navbars:"blog"},
                                    {navbars:"blog"},
                                    {navbars:"blog"}  
                                    ]*/
                }
            });
        }
        </script>  
</body>
</html>