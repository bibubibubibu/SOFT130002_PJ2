<!DOCTYPE html>

<style>

    #reg{
        text-align: center;
        margin: 200px auto 200px auto;
    }

    #footcontent{clear: both}

</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
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



<div id="reg">
    <form action="testregister.php" method="post">
        <p>用户名: <input type="text" name="username" /></p>
        <p>邮箱:<input type="email" name="email"></p>
        <p>密码:<input name="pwd1" type="password"></p>
        <p>确认密码:<input name="pwd2" type="password"></p>
        <p><input type="submit" value="注册" /> </p>

    </form>

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
