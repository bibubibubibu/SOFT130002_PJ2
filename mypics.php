<?php

require_once('config.php');

function deletepic($id){

}

function outputPaintings($shooter) {
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select count(*) from pics";
        $result = $pdo->query($sql);
        $num = $result->fetch();
        $pdo = null;
        $result= null;
        for($id = 0;$id<$num[0];$id++){
            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'select * from pics where id=' . $id;
            $result = $pdo->query($sql);
            while ($row = $result->fetch()) {
                if($row['shooter']==$shooter) outputSinglePainting($row);
            }
            $pdo = null;
        }

    }catch (PDOException $e) {
        die( $e->getMessage() );
    }
}

/*
 Displays a single painting
*/
function outputSinglePainting($row) {
    echo '<li class="inline">';
    $img =  '<img src="travel-images/large/' .$row['source'] .'.jpg">';
    echo constructGenreLink($row['id'], $img);
    echo '<span class="dectitle">';
    echo $row['country'];
    echo " - ";
    echo $row['city'];
    echo '</span><br>';
    echo $row['description'];
    echo '<br>';
    echo '<button onclick="javascrtpt:window.location.href=\'selfupload.php\'">修改</button>';
    echo '<p>';
    echo '<a href="delete.php?id=' . $row['id'] .'">删除</s>';
    echo '</p>';
    echo '</li>';;
    // end class=item
}

/*
Generate a link
*/

function constructGenreLink($id, $label) {
    $link = '<a href="detail.php?id=' . $id . '">';
    $link .= $label;
    $link .= '</a>';
    return $link;
}

?>

<!DOCTYPE html>

<style>

    li.inline{
        z-index: initial;
        list-style: none;
        height: 200px;
        width: 900px;
        padding:10px 10px;
        margin: 10px 10px 10px 10px;
        background-color: white;
    }

    li.inline img{
        display:block;
        height: 95%;
        float: left;
        padding-right: 10px;
    }


    #content{width:auto; background:ghostwhite;padding-top: 10px;padding-bottom: 10px;}

    #footcontent{clear: both}

</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的照片</title>
    <link rel="stylesheet" type="text/css" href="./Style/mainstyle.css">
</head>
<body class="mainbody">
<header>
    <nav class="topframe">
        <h1 id="navigat">
            旅图LiveTour
            <a href="main.php"> 首页 </a>
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
</header><br>

</div>
<div id="content">
    <p>
    <ul >
        <?php
        outputPaintings('Mike');
        ?>
    </ul>
    </p>

</div>

<p></p>

<table id ="pages">
    <tr><td>&lt;</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>…</td><td>&gt;</td></tr>
</table>

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
