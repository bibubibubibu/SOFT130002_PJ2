<?php

require_once('config.php');

/*
 Displays a list of genres
*/

try {
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'select * from pics where id=:id';
    $id =  $_GET['id'];
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $pdo = null;
}
catch (PDOException $e) {
    die( $e->getMessage() );
}


?>

<!DOCTYPE html>

<style>
    #bgbody{
        background-color: ghostwhite;
    }
    #show{
        text-align: center;
        margin: 100px auto 200px auto;
        background-color: lightcyan;
        padding:60px 60px 60px 60px;
    }
    #mainpic{
        height: 400px;
    }
</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>照片详情</title>
    <link rel="stylesheet" type="text/css" href="./Style/mainstyle.css">
</head>

<header>
    <nav class="topframe">
        <h1 id="navigat">
            旅图LiveTour
            <a id="currentpage" href="main.php"> 首页 </a>
            <a href="browse.php"> 浏览页 </a>
            <a href="search.php"> 搜索页 </a>

        </h1>
        <div class="dropdown">
                <span class="user">
                用户中心
                </span>
            <div class="dropdown-content">
                <a href="login.php">登录</a><br>
                <a href="mypics.php">我的照片</a><br>
                <a href="mycollection.php">我的收藏</a><br>
                <a href="selfupload.php">上传</a>
            </div>
        </div>
    </nav>

</header>

<body id="bgbody">
<div id="show">
    <img id="mainpic" src="travel-images/large/<?php echo $row['source']; ?>.jpg" >
    <div class="thirteen wide column">
        <h2><?php echo "国家：",$row['country'],"; 城市：",$row['city']; ?></h2>
        <p><?php echo $row['description'],", 拍摄者：",$row['shooter']; ?></p>
    </div>
</div>


</body>
</html>
