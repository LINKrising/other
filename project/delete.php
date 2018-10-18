<?php
header( 'Content-Type:text/html;charset=utf-8 ');
require'conn.php';
$id = $_GET['id'];
$sql="DELETE FROM article WHERE id='$id'";
$rs=mysql_query($sql,$connect);
if(mysql_affected_rows()){
    echo "数据删除成功";
};
echo "<script>";
    echo 'document.location.href = "cms.php"';
echo "</script>";
?>