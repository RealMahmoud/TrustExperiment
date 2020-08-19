<?php
session_start();
include(dirname(__FILE__)."/../common/_public.php");
header('Content-Type: application/json');

$address = $conn->real_escape_string($_POST['Address']);
$address = htmlspecialchars($address);
if(!empty($token))
{


  $result =(object)array();

  $resultSQL = $conn->query("SELECT * FROM auth where address = '".$address."' LIMIT 1;");
  $row = $resultSQL->fetch_row();
  $result->id=$row[0];
  $result->lastToken=$row[1];
  $result->lastNonce=$row[2];
  $result->lastSig=$row[3];
  $result->address=$row[4];
  $result->authenticated=$row[5];
  $result->time=$row[6];
  echo json_encode($result);

} else {
   $result =(object)array();
   $result->success=false;
   echo json_encode($result);
}
?>
