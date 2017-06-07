<?php
 session_start();
  $sessionid=session_id();
  echo $sessionid;

// $modal=$_POST['myModal'];
 $text=$_POST['txtEdit'];
 $response = file_get_contents("http://localhost:8081/web-programing/lab4/index.php?method=set&action=data&sessionid=$sessionid&text=$text");
 echo $response;

   $json=json_decode($response,true);
      if($json["logoutmessage"]=="set is successfuly done")
   {
    // $modal.style.display = "none";
    header("Location: http://localhost:8081/web-programing/lab6/profile.php?&username=$user");
   }
?>