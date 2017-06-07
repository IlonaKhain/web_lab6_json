<?php

  session_start();
  $sessionid=session_id();
  $response = file_get_contents("http://localhost:8081/web-programing/lab4/index.php?method=logout&action=user&sessionid=$sessionid");
  session_destroy();

  header("Location: http://localhost:8081/web-programing/lab6/mylogin.php"); 

?>