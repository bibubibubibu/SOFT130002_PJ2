<?php
$id =  $_GET['id'];
require_once('config.php');

$conn=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


$sql="delete from pics where id='$id'";
$result=mysqli_query($conn,$sql);

if($result==1)
    echo "<script>alert('删除成功');location='mypics.php'</script>";
else
    echo "<script>alert('删除失败');location='mypics.php'</script>";
?>