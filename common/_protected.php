<?php
include(dirname(__FILE__)."/_public.php");

if(!empty($_SESSION["SAtoken"])) {

    $sql = "SELECT * FROM `auth` WHERE `token` = '".$_SESSION["SAtoken"]."' LIMIT 1;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
          while($row = $result->fetch_assoc()) {
            $auth = $row['authenticated'];

                if ($auth == 0){
                    header("location:signin.php");
                } else {
                    $_SESSION["SAaddr"] = $row['addr'];
                    }
         }

    }
}

if(empty($_SESSION["SAaddr"])) {
    header("location:signin.php");
}

?>
