<?php

$hostname="localhost";  
$username="root";     
$password="root";
$dbname="admin";


//1--连接mysql
$connect=@mysql_connect($hostname,$username,$password) or die("连接失败！...");

//2--连接database
$conn_db=mysql_select_db($dbname,$connect);


//避免乱码
mysql_query("SET NAMES 'UTF8'");   //先指定编码格式为utf-8,此处必须写成

?>