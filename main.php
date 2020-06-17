<?php

require_once('config.php');



/*
 Displays the list of paintings for the artist id specified in the id query string
*/
function outputPaintings() {
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
                outputSinglePainting($row);
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
    echo '<h3 class ="cityname">';
    echo $row['city'];
    echo '</h3>';
    echo $row['description'];
    echo '</li>';
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

<html>
<head>
    <meta charset="UTF-8">
    <title>旅图</title>
    <link rel="stylesheet" type="text/css" href="./Style/mainstyle.css">
</head>
<body class="mainbody">


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

<br>
<p>
<div id="imgs">
    <ul class="imglist">
        <?php outputPaintings(); ?>
    </ul>
</div>

</p>
<br>

<button id="alerter" onclick="document.body.scrollTop = document.documentElement.scrollTop = 0;"> 回顶部 </button>
<button id="refresher" onclick="alert('图片已刷新')"> 刷新 </button>

</body>

<footer>
    <table>
        <tr><th>联系我们</th><th>关于我们</th><th>法律相关</th></tr><br>
        <tr><td>公司地址</td><td>开发人员</td><td></td></tr>
        <tr><td>联系电话</td><td>加入我们</td><td></td></tr>
    </table><br>
    <div>&copy2017 livetour.com | 沪ICP备16307130207号-1 |  京公网安备 800820820号 | 营业执照 </div>
</footer>
</html>