<?php
session_start();
include(dirname(__FILE__)."/../common/_public.php");
header('Content-Type: application/json');

$address = $conn->real_escape_string($_POST['Address']);
$address = htmlspecialchars($address);
if(!empty($address))
{


  $result =(object)array();

  $resultSQL = $conn->query("SELECT * FROM auth where address = '".$address."' ORDER BY `auth`.`id` DESC LIMIT 1;");
  $row = $resultSQL->fetch_row();
if($row[0] ==null){
  $result->id='--';
  $result->lastToken='--';
  $result->lastNonce='--';
  $result->lastSig='--';
  $result->address=$address;
  $result->time='--';
}else{
  $result->id=$row[0];
  $result->lastToken=$row[1];
  $result->lastNonce=$row[2];
  $result->lastSig=$row[3];
  $result->address=$row[4];
  $result->time=$row[6];
}

  echo json_encode($result);

} else {
   $result =(object)array();
   $result->success=false;
   echo json_encode($result);
}
?>
