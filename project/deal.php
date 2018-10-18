<?php
header( 'Content-Type:text/html;charset=utf-8 ');
require'conn.php';
$newtitle = $_GET['newtitle'];
$newcontent = $_GET['newcontent'];
$allcontent = $_GET['allcontent'];

$id = $_GET['aid'];
// echo $id;
// echo $newcontent;
$sql="UPDATE article SET title = '$newtitle', content='$newcontent', allcontent='$allcontent' WHERE id = '$id'";
$rs=mysql_query($sql,$connect);
if(mysql_affected_rows())
{
  echo "数据更新成功！";
}
echo "<script>";
    echo 'document.location.href = "cms.php"';
echo "</script>";

?>