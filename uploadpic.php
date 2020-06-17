<?php
require_once('config.php');

$conn=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

$fileUpload=$_FILES['imageUpload'];
$source=substr($fileUpload['name'],0,strlen($fileUpload['name'])-4);
$shooter=$_POST['shooter'];
$description=$_POST['description'];
$country=$_POST['country'];
$city=$_POST['city'];
$time=date("Y-m-d");

$sql="select count(*) from pics";
$result=mysqli_query($conn,$sql);
$row =  $result->fetch_row();
$id = $row[0];

echo $source,"<br>";
echo $shooter,"<br>";
echo $description,"<br>";
echo $country,"<br>";
echo $city,"<br>";
echo $time,"<br>";

$sql="INSERT INTO pics ".
    "(source,id,shooter,country,city,description,time) ".
    "VALUES ".
    "('$source','$id','$shooter','$country','$city','$description','$time')";
$result=mysqli_query($conn,$sql);
if($result==1)
    echo "<script>alert('上传成功');location='main.php'</script>";
else
    echo "<script>alert('上传失败');location='main.php'</script>";

?>