
<?php

include 'DatabaseConfig.php' ;

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 mysqli_set_charset($con,'utf8');

$i=$_GET['position'];
$uidAdmin=$_GET['uidAdmin'];

if ($i==3){
  $data_entrada=$_GET['data_entrada'];
  $data_sortida=$_GET['data_sortida'];
}
//Recollim el nom de l'empresa
$sql = "SELECT nameCompany From users WHERE uid='$uidAdmin'";

$result = mysqli_query($con,$sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nameCompany=$row["nameCompany"];
}

//Recollim el nombre de usuaris
$items = array();
$sql = "SELECT uid From users WHERE nameCompany='$nameCompany'";

$result2 = mysqli_query($con,$sql);

if ($result2->num_rows > 0) {
    while($row2 = $result2->fetch_assoc()) {
        $items[]=$row2["uid"];
    }
}

//print_r($items);

//Per cada usuari recollim el nombre d'hores treballades
$suma=0.0;
$valors['users']= array();

foreach ($items as $uid) {
  switch ($i) {
    case 0:  //Last Month
        $month=date('n')-1;
        $Sql_Query = "SELECT name,data,price,concept,idPhoto,comments from expense WHERE MONTH(data)='$month' AND uid='$uid'";
        break;
    case 1: //Last Week
        $week=date('W')-1;
        $Sql_Query = "SELECT name,data,price,concept,idPhoto,comments from expense WHERE WEEK(data)='$week' AND uid='$uid' ";
        break;
    case 2:  //Last Day
        $day=date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-1, date("Y")));
        $Sql_Query = "SELECT name,data,price,concept,idPhoto,comments from expense WHERE data='$day' AND uid='$uid'";
        break;
    case 3:
        $Sql_Query = "SELECT name,data,price,concept,idPhoto,comments from expense WHERE data>='$data_entrada' AND data<='$data_sortida' AND uid='$uid' ";
        break;

  }
  //$Sql_Query = "SELECT get_in,get_out from expense WHERE MONTH(data)='$month' AND name='$name' AND get_out!='0000-00-00 00:00:00.000000'";
  $result = mysqli_query($con,$Sql_Query);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $name=$row["name"];
      $valors['users'][]=array("name"=>$row["name"],"date"=>$row["data"], "price" =>$row["price"] , "concept"=>$row["concept"], "idPhoto"=>$row["idPhoto"],"comments"=>$row['comments'] );

    }
  }
}


echo json_encode($valors);

/*
if($result){


  echo 'Data Submit Successfully';


}
else{

  echo 'Try Again';

}
*/
mysqli_close($con);
?>
