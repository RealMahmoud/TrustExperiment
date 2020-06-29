<?php
session_start();
include(dirname(__FILE__)."/../common/_public.php");
header('Content-Type: application/json');

$token = $conn->real_escape_string($_POST['token']);
$token = htmlspecialchars($token);
if(!empty($token))
{


  $result =(object)array();

  $resultSQL = $conn->query("SELECT * FROM auth where token = '".$token."' LIMIT 1;");
  $row = $resultSQL->fetch_row();
  $result->id=$row[0];
  $result->token=$row[1];
  $result->nonce=$row[2];
  $result->sig=$row[3];
  $result->addr=$row[4];
  $result->authenticated=$row[5];
  $result->time=$row[6];
  echo json_encode($result);

} else {
    echo '{"success":false, "data": "Empty?"}';
}
?>
