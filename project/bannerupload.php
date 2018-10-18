<!-- <?php 

// if (isset($_GET["meun1"])) {
// $str='[{"navbars":"'.$_GET["meun1"].'"},
//        {"navbars":"'.$_GET["meun2"].'"},
//        {"navbars":"'.$_GET["meun3"].'"},
//        {"navbars":"'.$_GET["meun4"].'"},
//        {"navbars":"'.$_GET["meun5"].'"},
//        {"navbars":"'.$_GET["meun6"].'"}]';
// // echo $str;
// $meunjson = fopen('jsondata/meun.json','w');
// fwrite($meunjson,$str);
// }
?> -->
<?php 
header( 'Content-Type:text/html;charset=utf-8 ');
// 允许上传的图片后缀
if (isset($_FILES["myfile"]["name"])) {
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["myfile"]["name"]);
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["myfile"]["type"] == "image/gif")
|| ($_FILES["myfile"]["type"] == "image/jpeg")
|| ($_FILES["myfile"]["type"] == "image/jpg")
|| ($_FILES["myfile"]["type"] == "image/pjpeg")
|| ($_FILES["myfile"]["type"] == "image/x-png")
|| ($_FILES["myfile"]["type"] == "image/png"))
&& ($_FILES["myfile"]["size"] < 204800)   // 小于 200 kb
&& in_array($extension, $allowedExts))
{
    if ($_FILES["myfile"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["myfile"]["error"] . "<br>";
    }
    else
    {
        if (file_exists("img/" . $_FILES["myfile"]["name"]))
        {
        //     echo "该图片存在";
        // }
        // else
        // {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["myfile"]["tmp_name"], "img/" . $_FILES["myfile"]["name"]);
            // echo "文件存储在: " . "img/" . $_FILES["myfile"]["name"];
          echo "<script>";
          echo "document.location.href = 'cms.php'";
          echo "</script>";
        }
    }
}
else
{
    echo "非法的文件格式";
    echo "<script>";
    echo 'document.location.href = "cms.php"';
    echo "</script>";
}

}
?>