<?php
header('Content-Type: application/json');
session_start();
if(isset($_SESSION['SAtoken'])){
echo json_encode(["Logged" => True]);
}else{
 echo json_encode(["Logged" => False]);
}
?>