<?php

include 'DatabaseConfig.php' ;

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

mysqli_set_charset($con,'utf8');


$name = $_POST['name'];
$nameCompany = $_POST['nameCompany'];
$CIF=$_POST['CIF'];
$numberWorkers=$_POST['numberWorkers'];
$email=$_POST['email'];

$message = '<html><body>';
$message .= '<h1 style="color:green;">Gracias por confiar en nuestros servicios para poder controlar la jornada laboral de tus trabajadores.
A continuación encontraras los códigos que te permitirán a ti y a tus empleados registraros a nuestra aplicación y hacer uso de ella.</h1>';
$message .= '<p style="color:#080;font-size:18px;">';



$int = (int)$numberWorkers;

for ($i = 1; $i <= $int; $i++) {
  if ($i==1){
    $identificador= uniqid();
    $Sql_Query= "INSERT INTO `users` (`id`, `uid`, `email`, `name`, `data`, `type`, `nameCompany`) VALUES (NULL, '$identificador', '', '', current_timestamp(), 'Admin', '$nameCompany')";
    $message.= "Admin: ";
    $message.= $identificador;
  }else{
    $identificador= uniqid();
    $Sql_Query= "INSERT INTO `users` (`id`, `uid`, `email`, `name`, `data`, `type`, `nameCompany`) VALUES (NULL, '$identificador', '', '', current_timestamp(), 'User', '$nameCompany')";
    $message.= "User: ";
    $message.= $identificador;
  }
  mysqli_query($con,$Sql_Query);
  $message.= '<br>';
}

$message.='</p>';
$message.= '</body></html>';

//$to = "accescontrolworkers@gmail.com";
$subject = "TimeControl codes for register";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


if(mail($email,$subject,$message,$headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}

$Sql_Query = "INSERT INTO `companies` (`id`,`name` ,`nameCompany`, `CIF`, `numberWorkers`, `email`, `date`) VALUES (NULL,'$name', '$nameCompany', '$CIF','$numberWorkers','$email',current_timestamp())";

if(mysqli_query($con,$Sql_Query)){

  echo 'Data Submit Successfully';

}
else{

  echo 'Try Again';

}
mysqli_close($con);
?>
