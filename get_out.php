
<?php

include 'DatabaseConfig.php' ;

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

mysqli_set_charset($con,'utf8');

$uid = $_POST['uid'];
$data = $_POST['data'];
$name = $_POST['name'];
$address_out=$_POST['address_out'];

$null="0000-00-00 00:00:00.000000";

$Sql_Query ="UPDATE `schedule` Set `get_out`=CURRENT_TIMESTAMP , `address_out`='$address_out' where `uid`='$uid' and `name`='$name' and `data`='$data' and `get_out`='$null'" ;


if(mysqli_query($con,$Sql_Query)){

  echo 'Data Submit Successfully';

}
else{

  echo 'Try Again';

}
mysqli_close($con);
?>
