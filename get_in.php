
<?php

include 'DatabaseConfig.php' ;

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

mysqli_set_charset($con,'utf8');


$data = $_POST['data'];
$uid = $_POST['uid'];
$get_in = $_POST['get_in'];
$name = $_POST['name'];
$address_in=$_POST['address_in'];

$Sql_Query = "INSERT INTO `schedule` (`uid`,`name` ,`data`, `get_in`, `get_out`,`address_in`,`address_out`) VALUES ('$uid','$name', '$data', current_timestamp(), '0000-00-00 00:00:00.000000','$address_in',' ')";


if(mysqli_query($con,$Sql_Query)){

  echo 'Data Submit Successfully';

}
else{

  echo 'Try Again';

}
mysqli_close($con);
?>
