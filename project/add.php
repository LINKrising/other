
<?php 
// 允许上传的图片后缀
header( 'Content-Type:text/html;charset=utf-8 ');
require'conn.php';
$mytitle = $_POST["mytitle"];
$mycontent = $_POST["mycontent"];
$allcontent = $_POST["allcontent"];
if (isset($_FILES["myfile1"]["name"])) {
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["myfile1"]["name"]);
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["myfile1"]["type"] == "image/gif")
|| ($_FILES["myfile1"]["type"] == "image/jpeg")
|| ($_FILES["myfile1"]["type"] == "image/jpg")
|| ($_FILES["myfile1"]["type"] == "image/pjpeg")
|| ($_FILES["myfile1"]["type"] == "image/x-png")
|| ($_FILES["myfile1"]["type"] == "image/png"))
&& ($_FILES["myfile1"]["size"] < 20480000)   
&& in_array($extension, $allowedExts))
{
    if ($_FILES["myfile1"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["myfile1"]["error"] . "<br>";
    }
    else
    {
        if (file_exists("img/" . $_FILES["myfile1"]["name"]))
        {
            echo "该图片存在";
             echo "<script>";
           echo 'document.location.href = "cms.php"';
           echo "</script>";
        }
        else
        {
            //如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            $newsrc = "img/".$_FILES["myfile1"]["name"];
            move_uploaded_file($_FILES["myfile1"]["tmp_name"], $newsrc);
            //echo $newsrc.$mycontent.$mytitle.$allcontent;
            $sql="INSERT INTO article(imgsrc,title,content,allcontent) VALUES('$newsrc','$mytitle','$mycontent','$allcontent')";
            $rs=mysql_query($sql,$connect);
            if(mysql_affected_rows()){
             echo "数据添加成功";
            };
           echo "<script>";
           echo 'document.location.href = "cms.php"';
           echo "</script>";
            
        }
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



?>