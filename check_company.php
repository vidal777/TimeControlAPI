
<?php

include 'DatabaseConfig.php' ;

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 mysqli_set_charset($con,'utf8');

$nameCompany=$_GET['namecompany'];
$CIF=$_GET['CIF'];

$Sql_Query = "SELECT nameCompany from companies WHERE nameCompany='$nameCompany' OR CIF='$CIF'";


$result = mysqli_query($con,$Sql_Query);

if (mysqli_num_rows($result)==0) {
  echo "No Exists";

}else{
    echo "Exists";

}

mysqli_close($con);
?>
