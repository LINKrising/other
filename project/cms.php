<?php 
header( 'Content-Type:text/html;charset=utf-8 ');
if(isset($_COOKIE['xm'])&&isset($_COOKIE['mm'])){
$_COOKIE['xm'];
$_COOKIE['mm'];
}
else{
  echo "非法访问";
exit;
}
?>
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
     <!-- 移动端 -->
     <!--     <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
    <style>
		*{
			padding: 0;
			margin: 0;

		}
		ul{
			list-style: none;
			display: inline-block;
		}
		ul li{
			display: inline-block;			
		}
		#control .container{
			width: 100%;
			height: 60px;
			background: black;
			color:white;
			text-align: center;
			line-height: 60px;
		}
        .form-navbar>input{
            float:inline-block;
        }
        #img-container img{
            display: block;
            width: 30%;
            height: 150px;
        }
        #img-container1 img{
            display: block;
            width: 30%;
            height: 150px;
        }
    </style>
</head>

<body>

  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
          <span class="sr-only">切换导航</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">BLOG后台管理</a>
      </div>
      <div class="collapse navbar-collapse" id="example-navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="#">导航菜单</a>
          </li>
          <li>
            <a href="#">轮播图</a>
          </li>
          <li>
            <a href="#">文章管理</a>
          </li>
          <li id="btnexit">
            <a href="#">退出系统</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
        <div class="col-xs-3" id="myScrollspy">
            <ul class="nav nav-tabs nav-stacked" id="myNav">
                <li class="active"><a href="#section-1">导航菜单</a></li>
                <li><a href="#section-2">轮播图</a></li>
                <li><a href="#section-3">文章管理</a></li>
            </ul>
        </div>
        <div class="col-xs-9">
            <h2 id="section-1">导航菜单</h2>
<form class="form-inline" role="form" action="meun.php" method="GET">
  <div class="form-group">
    <label for="firstname" class="col-sm-3 control-label">菜单1</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" placeholder="文本输入" name="meun1">
    </div>
  </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-3 control-label">菜单2</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" placeholder="文本输入" name="meun2">
    </div>
  </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-3 control-label">菜单3</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" placeholder="文本输入" name="meun3">
    </div>
  </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-3 control-label">菜单4</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" placeholder="文本输入" name="meun4">
    </div>
  </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-3 control-label">菜单5</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" placeholder="文本输入" name="meun5">
    </div>
  </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-3 control-label">菜单6</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" placeholder="文本输入" name="meun6">
    </div>
      </div>
    <input type="submit" class="btn btn-danger" value="提交">
    <input type="reset" name="res" value="重填" class="btn btn-danger" />
</form>


            <hr>
            <h2 id="section-2">轮播图</h2>
            <form action="bannerupload.php" method="post" enctype="multipart/form-data">
                

                <label for="myfile" id="label-for-file">请选择文件</label>
                <input type="file" name="myfile" style="display: none;" id="myfile">
                <div id="img-container"></div>
                <input type="submit" name="sub" value="提交" class="btn btn-danger">
            </form>
            <hr>
            <h2 id="section-3">文章管理</h2>
            <div class="table-responsive">
	<table class="table">
		<caption>文章列表</caption>
		<thead>
			<tr>
				<th>imgsrc</th>
				<th>title</th>
				<th>content</th>
			</tr>
		</thead>
		<tbody>

 <?php
 $nump = 2;
 if (isset($_GET['num'])) {
   if ($_GET['num']<0) {
     $num = 0;
   }
   else {
      $num = $_GET['num'];
   } 
 }
 else {
   $num = 0;
 }
 
  require'conn.php';
  $sql="SELECT * FROM article LIMIT {$num},2";
  $sql_rows = "SELECT * FROM article";
 $rs=mysql_query($sql,$connect);
 $rs_rows=mysql_query($sql_rows,$connect);
 $rows_count = @mysql_num_rows($rs_rows);
while($obj=mysql_fetch_object($rs))
{
  echo "<tr>";
  echo "<td>$obj->imgsrc</td>";
  echo "<td>$obj->title</td>";
  echo "<td>$obj->content</td>";
  echo '<td><a href="revise.php?id='.$obj->id.'">修改</a></td>';  
  echo '<td><a href="delete.php?id='.$obj->id.'">删除</a></td>';  
  echo "</tr>";
}           
 ?>
</tbody>
<ul class="pager">
	<li class="active"><a href="cms.php?num=<?php echo $num-1; ?>">Previous</a></li>
  <li><a href="cms.php?num=<?php echo $num+1; ?>">Next</a></li>
  <button class="btn btn-primary">共有<?php echo $rows_count;?>个博客</button>
</ul>
</table>
<h4>添加文章</h4>
            <form action="add.php" method="post" enctype="multipart/form-data">
                <label for="mytitle">标题</label>
                <input type="text" class="form-control" name="mytitle" id="title">
                <label for="mycontent">简介</label>
                <textarea class="form-control" name="mycontent" rows="3"></textarea>
                <label for="allcontent">内容</label>
                <textarea class="form-control" name="allcontent" rows="3"></textarea>
                <label for="myfile1" id="label-for-file">请选择文件</label>
                <input type="file" name="myfile1" style="display: none;" id="myfile1">
                <div id="img-container1"></div>
                <input type="submit" name="sub" value="提交" class="btn btn-danger">
            </form>
</div>  
        </div>
    </div>

</div>


<!-- [
                {"navbars":"首页"},
                {"navbars":"个人"},
                {"navbars":"简介"},
                {"navbars":"blog"},
                {"navbars":"blog"},
                {"navbars":"blogs"}  
] -->

 <script type="text/javascript">
//上传图片实时预览
    let myFiles = document.querySelector("#myfile");
    let imgContainer = document.getElementById("img-container");
    myFiles.addEventListener("change", function() {
        var reader;
        var oFiles = this.files[0];
        if (!/^image\//.test(oFiles.type)) {
            console.log('文件类型出错');
        } else if (oFiles.size > 1024 * 400) {
            console.log("过于大文件");
        } else {
            var img = document.createElement("img");
            imgContainer.appendChild(img);

            reader = new FileReader();
            reader.readAsDataURL(oFiles);
            reader.onload = function() {
                console.log(this.result);
                img.src = this.result;
            }
        }
    },false);
    let myFiles1 = document.querySelector("#myfile1");
    let imgContainer1 = document.getElementById("img-container1");
    myFiles1.addEventListener("change", function() {
        var reader;
        var oflies = this.files[0];
        console.log(oflies);
        if (!/^image\//.test(oflies.type)) {
            console.log('文件类型出错');
        } else if (oflies.size > 1024 * 400) {
            console.log("过于大文件");
        } else {
            var img = document.createElement("img");
            imgContainer1.appendChild(img);

            reader = new FileReader();
            reader.readAsDataURL(oflies);
            reader.onload = function() {
                console.log(this.result);
                img.src = this.result;
            }
        }
    },false);
  var exitBtn = document.getElementById("btnexit");
        exitBtn.onclick = function(){
                        if(confirm("真的要退出系统吗？")) 
            {   document.cookie = "";
                window.location='login.html';
            }

        }
    

</script>
</body>
</html>