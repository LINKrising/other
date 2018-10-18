<?php
header( 'Content-Type:text/html;charset=utf-8 ');
$meun1= $_GET['meun1'];
$meun2= $_GET['meun2'];
$meun3= $_GET['meun3'];
$meun4= $_GET['meun4'];
$meun5= $_GET['meun5'];
$meun6= $_GET['meun6'];
$myfile = fopen("jsondata/meun.json", "w");
$txt = '[{"navbars":"'.$meun1.'"},{"navbars":"'.$meun2.'"},{"navbars":"'.$meun3.'"},{"navbars":"'.$meun4.'"},{"navbars":"'.$meun5.'"},{"navbars":"'.$meun6.'"}]';
fwrite($myfile, $txt);
fclose($myfile);
echo "<script>";
echo 'document.location.href = "cms.php"';
echo "</script>";
?>