<?php

require_once('config.php');


function outputPaintings() {
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $country ="'英国'";
        $sql = "select count(*) from pics where country = $country";
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
<style>

    #aside{width:200px; float:left; background:lightgray;}

    #content{width:780px; float:right; background:ghostwhite;}

    #footcontent{clear: both}

    #currentpage{
        text-decoration: overline;
    }

    select.choose{
        width: 80px;
        height: 25px;
        font-size: 14px;
        margin: 5px 5px 5px 5px;
        z-index: 100;
    }
</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>浏览页</title>
    <link rel="stylesheet" type="text/css" href="./Style/mainstyle.css">
</head>
<body class="mainbody">
<header>
    <nav class="topframe" >
        <h1 id="navigat">
            旅图LiveTour
            <a href="main.php"> 首页 </a>
            <a id="currentpage" href="browse.php"> 浏览页 </a>
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

<form id="aside">
    <p><input id="title">
        <button onclick="alert('图片已刷新')">搜索</button></p>
    <p>
    <ul> 热门国家浏览
        <li>意大利</li>
        <li>法国</li>
    </ul>
    </p>
    <p>
    <ul> 热门城市浏览
        <li>梵蒂冈</li>
        <li>巴黎</li>
    </ul>
    </p>

</form>
<form id="content">
    <p>
        <span>国家</span>
        <select name="country" class="choose">
            <option value="Italy">意大利</option>
            <option value="France">法国</option>
        </select>
        <span>城市</span>
        <select name="country" class="choose">
            <option value="Rome" selected="selected">罗马</option>
            <option value="Gilongpo">吉隆坡</option>
        </select>
        <span>主题</span>
        <select name="country" class="choose">
            <option value="street" selected="selected">街市</option>
            <option value="moutain">山水</option>
        </select>
        <button onclick="alert('图片已刷新')">确定</button>

    <ul class="imglist">
        <?php outputPaintings(); ?>
    </ul>
    </p>

</form>

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
