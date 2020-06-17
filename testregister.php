<?php
require_once('config.php');

$conn=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
$name=$_POST['username'];
$pwd1=$_POST['pwd1'];
$pwd2=$_POST['pwd2'];
$email=$_POST['email'];

$sql="select count(*) from users where name='$name'";
$result=mysqli_query($conn,$sql);
$row =  $result->fetch_row();
echo $row[0];
if($row[0]!=0)
{
    echo "<script>alert('用户已存在');location='register.php'</script>";
}
else if($pwd1!=$pwd2){
    echo "<script>alert('密码不一致，请重新输入');
        location='register.php'</script>";
}
else{
    $sql="INSERT INTO users ".
        "(name,email,password) ".
        "VALUES ".
        "('$name','$email','$pwd1')";
    $result=mysqli_query($conn,$sql);
    if($result==1)
        echo "<script>alert('注册成功');location='login.php'</script>";
    else
        echo "<script>alert('注册失败');location='login.php'</script>";
}
?>
