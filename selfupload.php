<!DOCTYPE html>
<style>


    td:hover{color: lightskyblue}

    .topframe {
        z-index: 100;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: fixed;
        top: 80px;
        right: 0px;
        background-color: darkgoldenrod;
        min-width: 120px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        text-align: center;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    #preview {
        width: 300px;
        height: 300px;
        overflow: hidden;
    }
    #preview img {
        width: 100%;
        height: 100%;
    }

    inpout.imageUpload {
        width: 200px;
        height: 50px;
    }


</style>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的上传</title>
    <link rel="stylesheet" type="text/css" href="./Style/mainstyle.css">

    <script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript">

        function preview(file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var $img = $('<img>').attr("src", e.target.result);
                $('#preview').empty().append($img);
            }
            reader.readAsDataURL(file);
        }

        $(function() {
            $('[type=file]').change(function(e) {
                var file = e.target.files[0];
                preview(file);// 方法2
            })
        })
    </script>

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
</header>

<br>
<p>
<form enctype="multipart/form-data" action="uploadpic.php" method="post">
    <div id="preview" style="border:1px solid gray;"></div>
    <input type="file" name="imageUpload">
<p>照片作者<input type="text" name="shooter" /></p>
<p>照片描述<input type="text" name="description" /></p>
<p>拍摄国家<input type="text" name="country" /></p>
<p>拍摄城市<input type="text" name="city" /></p>
<p>
    <input type="submit" value="上传" />
</p>
</form>

</p>

<br>

<button id="alerter"> 回顶部 </button>
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
