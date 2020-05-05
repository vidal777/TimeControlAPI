<?php

include 'DatabaseConfig.php' ;

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

mysqli_set_charset($con,'utf8');


$data=$_POST['data'];
$uid = $_POST['uid'];
$name = $_POST['name'];
$price = $_POST['price'];
$comments=$_POST['comments'];
$concept=$_POST['concept'];
$id=$_POST['id'];

$Sql_Query = "INSERT INTO `expense` (`uid`,`name` ,`data`, `price`, `comments`, `concept`, `id`) VALUES ('$uid','$name', '$data', '$price','$comments','$concept','$id')";


if(mysqli_query($con,$Sql_Query)){

  echo 'Data Submit Successfully';

}
else{

  echo 'Try Again';

}
mysqli_close($con);
?>
