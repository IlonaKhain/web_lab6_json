<!DOCTYPE html>
<html >
<head>
<link href="css/styleprofile.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<link href="css/styleforedit.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="scripts2.js"></script>

</script>
</head>

<body>

<?php 
$mainText="";
$infoText="";
    session_start();
    if(!isset($_SESSION['name'])){
      header("Location: http://localhost:8081/web-programing/lab6/mylogin.php");
      exit();
    }
   /* if($_GET['username']==null){
      header("Location: http://localhost:8081/web-programing/lab6/mylogin.php");
    }*/
    $sessionid=session_id();//call sessionid from cookies
    $response = file_get_contents("http://localhost:8081/web-programing/lab4/index.php?method=get&action=data&sessionid=$sessionid&isFull=0&offset=0");
    $json=json_decode($response,true);
   if($json["errormessage"]==null)
   {
     $mainText=substr($json["text"], 0,20);
     $infoText=$json["text"];
   }


?>


<div class="card" id="card"><!-- Face 2 -->

    <div class="card-face face-2"><!-- Back trigger -->
      <button class="card-face__back-button" data-card-back="data-card-back">
    </div><!-- Face 1 -->
    <div class="card-face face-1"><!-- Menu trigger -->
      <button class="card-face__menu-button" data-card-menu="data-card-menu">
        <img src="img/dots_1.svg" width="5" height="23" draggable="false"/>
      </button><!-- Avatar -->
    <div class="card-face__avatar">
      <img src="img/avatar_image1.png" width="110" height="110" draggable="false"/>
    </div><!-- Name -->
    <form method="post">
        <h2 class="card-face__name">
        <?php 
       
        echo $_GET["username"];
       
         ?>
           
         </h2><!-- Title -->
       
        <span class="card-face__title"><?php echo "$mainText";?></span>

        <textarea type="hidden" readonly class="card-face__info" id ="txtInfo" name= "txtInfo"  style="display:none;" >              
        </textarea>  
   </form>
   
   <figcaption> 
     <a> <button onclick="ReadMore()"  name ="btnLoadMore" class="btn btn-primary btn-block btn-large">Read More</button></a>
     <a ><button  id="edit" onclick="Edit()" class="btn btn-primary btn-block btn-large">Edit</button></a> 
     <a><form  method ="post" action="logout.php"><button  name ="btnLogOut" class="btn btn-primary btn-block btn-large" style="background-color:red; background-image: none">Log out</button></form></a>
    </figcaption>    

  <!-- The Modal -->
  <form method="post" action="save.php">
  <div id="myModal" name="myModal" class="modal">
    <!-- Modal content -->
    <div  class="modal-content">
      <span class="close">&times;</span>
      <!--<p>Some text in the Modal..</p>-->
      <textarea id="txtEdit" name="txtEdit"></textarea>
       <figcaption> 
      <button  id="save" onclick="Save()" class="btn btn-primary btn-block btn-large">Save</button>
   
      </figcaption>
    </div>

  </div>
  </form>  
    <figcaption>
    <a><img src="img/dribbble.svg" width="36" height="36" ></a>
     <a> <img src="img/beh.svg" width="36" height="36"></a>
     <a> <img src="img/plus_5.svg" width="36" height="36"></a>
  </figcaption>
  </div>

</div>
</body>
</html>