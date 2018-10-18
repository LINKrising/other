<?php
header('Content-Type:text/html;charset=utf-8');
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];
// echo $username;
// echo strlen($username);
require'conn.php';
if (isset($myusername)) {
$sql="SELECT * from admintable where username='{$myusername}' and password='{$mypassword}'";
$rs=mysql_query($sql,$connect);
if(mysql_num_rows($rs) >0){
while($obj=mysql_fetch_object($rs))
{
  setcookie('xm',$obj->username,time()+4*60*60);
  setcookie('mm',$obj->password,time()+4*60*60);
  header("Location:cms.php");
}
}
else {
   echo "请输入正确账号密码";
   echo "<script>";
   echo 'document.location.href= "login.html"';
   echo "</script>";
}
}

 ?>