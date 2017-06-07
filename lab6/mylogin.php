<!DOCTYPE html>
<html >
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
// define variables and set to empty values
$errorUser = $errorPass="";
	$username ="";
	$password ="";
	$errorUser = $errorPass="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
 	$user = $_POST['u'];
 	echo $user;
 	$pass=$_POST['p'];
 	$response = file_get_contents("http://localhost:8081/web-programing/lab4/index.php?method=login&action=user&username=$user&password=$pass");
 	echo $response;
 	$json=json_decode($response,true);
 	if ($json["errormessage"]==null){
 	//	echo "errormessage=null";
 		session_id($json["sessionid"]);
 		session_start();//cookies created
    $_SESSION['name']=$user;
 		header("Location: http://localhost:8081/web-programing/lab6/profile.php?&username=$user");
 		exit();
 	}			
 	elseif ($json["errormessage"]=="such user doesn't exist, login is unavaible")
 	{
 		$errorPass="*".$json["errormessage"];
 	}
 	else
 	{
 		$errorUser="*".$json["errormessage"];
 	}
	
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>


  <div class="login">
	<h1>Login</h1>
    <form method="post">
    	<input type="text" name="u" placeholder="Username" required="required" value="" />
    	<label><?php echo "$errorUser";?></label>
    	<!--placehold - tipped text; required - obvious to fill type - tell to form the type --> 
     	<!-- output error if it is occured-->
        <input type="password" name="p" placeholder="Password" required="required" value=""/>
        <label><?php echo "$errorPass";?></label>
        <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
</div>
  
    

</body>
</html>