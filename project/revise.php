<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title></title>
    <!-- 使用chrome和最新版ie渲染 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- SEO页面关键词 -->
    <meta name="keywords" content="" />
    <!-- SEO页面描述 -->
    <meta name="description" content="" />
    <!-- 作者 -->
    <meta name="author" content="link" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<form class="form-horizontal col-lg-4" role="form" action="deal.php" method="get">
<?php 
header( 'Content-Type:text/html;charset=utf-8 ');
require'conn.php';
$id = $_GET['id'];
$sql='select * from article where id='.$id;
$rs=mysql_query($sql,$connect);
while($obj=mysql_fetch_object($rs)){
       echo'<div class="form-group">';
        echo '<input type="text" class="form-control" style="display:none;" name="aid" value='."$obj->id>";
		echo '<label for="title" class="col-sm-2 control-label">标题</label>';
		echo '<div class="col-sm-10">';
			echo '<input type="text" class="form-control" name="newtitle" id="title" value='."$obj->title";
		echo '></div>';
    echo '</div>';
       	echo'<div class="form-group">';
		echo '<label for="title" class="col-sm-2 control-label">简介</label>';
		echo '<div class="col-sm-10">';
			echo '<textarea class="form-control" name="newcontent" rows="3">'.$obj->content.'</textarea>';
		echo '</div>';
  echo '</div>';
         	echo'<div class="form-group">';
		echo '<label for="title" class="col-sm-2 control-label">内容</label>';
		echo '<div class="col-sm-10">';
			echo '<textarea class="form-control" name="allcontent" rows="3">'.$obj->allcontent.'</textarea>';
		echo '</div>';
	echo '</div>'; 
}

?>
<button type="submit" class="btn btn-danger">确认</button>
</form>

</body>
</html>