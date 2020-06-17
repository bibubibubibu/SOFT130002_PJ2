<?php
$id =  $_GET['id'];
require_once('config.php');

$conn=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


$sql="delete from collect where collection='$id' AND user='Mike'";
$result=mysqli_query($conn,$sql);

if($result==1)
    echo "<script>alert('取消收藏成功');location='mycollection.php'</script>";
else
    echo "<script>alert('取消收藏失败');location='mycollection.php'</script>";
?>