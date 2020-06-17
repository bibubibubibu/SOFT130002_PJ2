<?php

require_once('config.php');

$conn=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
$name=$_POST['username'];
$pwd=$_POST['password'];
$sql="select count(*) from users where name='$name' AND password='$pwd'";
$result=mysqli_query($conn,$sql);
$row =  $result->fetch_row();
echo $row[0];
if($row[0]==1)
{
    echo "<script>alert('登录成功');location='main.php'</script>";
    // 释放结果集

}
else{
    echo "<script>alert('密码错误，请重新输入');
    location='login.php'</script>";
}
?>