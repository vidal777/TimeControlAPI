<?php

include 'DatabaseConfig.php' ;

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 mysqli_set_charset($con,'utf8');

$data = $_POST['data'];
$uid = $_POST['uid'];
$name = $_POST['name'];
$email = $_POST['email'];
$type = $_POST['type'];

$Sql_Query = "insert into users (id,uid,email,name,data,type) values (NULL,'$uid','$email','$name','$data','$type')";

// $Sql_Query = "insert into users (id,uid,email,name,data,type) values (NULL,'uid','email','name','2020-06-18','type')";


 if(mysqli_query($con,$Sql_Query)){

 echo 'Data Submit Successfully';

 }
 else{

 echo 'Try Again';

 }
 mysqli_close($con);
?>
