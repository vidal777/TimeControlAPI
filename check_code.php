
<?php

include 'DatabaseConfig.php' ;

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 mysqli_set_charset($con,'utf8');

$code=$_GET['code'];

$Sql_Query = "SELECT uid,type from users WHERE uid='$code' ";


$result = mysqli_query($con,$Sql_Query);


if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  echo $row["type"],"/",$row["uid"];
}else{
  echo "No Exists";

}

mysqli_close($con);
?>
