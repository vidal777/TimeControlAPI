<?php

include 'DatabaseConfig.php' ;

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 mysqli_set_charset($con,'utf8');

//$data = $_POST['data'];
$uid = $_POST['uid'];
$name = $_POST['name'];
$email = $_POST['email'];
$code = $_POST['code'];


$Sql_Query ="UPDATE `users` Set `data`=CURRENT_TIMESTAMP , `uid`='$uid', `email`='$email', `name`='$name'  where `uid`='$code'" ;



 if(mysqli_query($con,$Sql_Query)){

 echo 'Data Submit Successfully';

 }
 else{

 echo 'Try Again';

 }
 mysqli_close($con);
?>
