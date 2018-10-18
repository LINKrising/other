<?php
header( 'Content-Type:text/html;charset=utf-8 ');
$json = '';
$data = array();
class Article
{
public $id;
public $imgsrc;
public $title;
public $content;
public $allcontent;
}
require'conn.php';
$sql="select * from article limit 0,6";
$rs=mysql_query($sql,$connect);
if($rs){
while ($row = mysql_fetch_array($rs,MYSQL_ASSOC))
{
$articles = new Article();
$articles->id = $row["id"];
$articles->imgsrc = $row["imgsrc"];
$articles->title = $row["title"];
$articles->content = $row["content"];
$articles->allcontent = $row["allcontent"];
$data[]=$articles;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "$json";
}else{
echo "查询失败";
}
//文章数据查询并转化为json,与前端数据对接;

?>