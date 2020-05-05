<?php

include 'DatabaseConfig.php' ;

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 mysqli_set_charset($con,'utf8');

 $uid = $_POST['uid'];
 $name = $_POST['name'];

 $Sql_Query ="UPDATE `users` Set `name`='$name'  where `uid`='$uid'" ;
 

 if(mysqli_query($con,$Sql_Query)){

   echo 'Data Submit Successfully';

 }
 else{

   echo 'Try Again';

 }
 mysqli_close($con);
 ?>
