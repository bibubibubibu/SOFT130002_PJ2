<?php

require_once('config.php');



function testlogin(){
    $conn=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
    $name=$_POST['username'];
    $pwd=$_POST['password'];
    $sql="select id,username,password from user where username='$name' AND password='$pwd';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);if(!$row){

        echo "<script>alert('密码错误，请重新输入');location='login.html'</script>";

    }
    else {

        echo "<script>alert('登录成功');location='123'</script>";

    }
}


?>

<!DOCTYPE html>

<style>

    #login{
        text-align: center;
        margin: 200px auto 200px auto;
    }

    #footcontent{clear: both}

</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="./Style/mainstyle.css">
</head>
<body>
<header>
    <nav class="topframe">
        <h1 id="navigat">
            旅图LiveTour
            <a href="main.php"> 首页 </a>
            <a href="browse.php"> 浏览页 </a>
            <a href="search.php"> 搜索页 </a>
        </h1>
    </nav>
</header>


<div id="login">
    <form action="testlogin.php" method="post">
        <p>用户名: <input type="text" name="username" /></p>
        <p>密码: <input type="password" name="password" /></p>
        <input type="submit" value="登录" />
    </form><br>
    <button onclick="window.location.href='register.php'">注册</button>
</div>

</body>

<footer id="footcontent">
    <table>
        <tr><th>联系我们</th><th>关于我们</th><th>法律相关</th></tr><br>
        <tr><td>公司地址</td><td>开发人员</td><td></td></tr>
        <tr><td>联系电话</td><td>加入我们</td><td></td></tr>
    </table><br>
    <div>&copy2017 livetour.com | 沪ICP备16307130207号-1 |  京公网安备 800820820号 | 营业执照 </div>
</footer>
</html>
