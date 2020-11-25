<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $Name =  filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $Mail =  filter_var($_POST['Email'],FILTER_SANITIZE_EMAIL);
        $Tell =  filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT); 
        $Mesg =  filter_var($_POST['Message'],FILTER_SANITIZE_STRING);
        $erosoUser =array();
         if(strlen($Name) <= 4 )
        {
          $erosoUser [] ="<strong>Username</strong> Must be larger than 3 characters";
        }
         if(strlen($Mesg) <= 20 )
        {
          $erosoUser [] ="<strong>Message</strong> can'\ t be less than 20  characters";
        }
        $headers =  'MIME-Version: 1.0' . "\r\n"; 
        $headers .= 'From: Your name '.$Mail."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
        //$headers = 'From'.$Mail.'\r\n';
        $mymail  = 'aachraf1996an@gmail.com';
        $subject = 'Contact Form'; 
        if(empty($erosoUser))
        {          
            mail($mymail,$subject,$Mesg,$headers);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
</head>
<body>

<form class="Contact-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <h1>Contacte US</h1>
    <?php  
        if(!empty($erosoUser))
        {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">';
              foreach($erosoUser as $val){ echo $val.'<br>';}
            echo '</div>';
        }
    ?>

    <input  class="form-control UserName" type="text" name="name" placeholder="Type Your name"             value="<?php if(isset($Name)){ echo $Name; } ?>">
    <i class="fa fa-user"></i>
    <div class="coustom-alert alert alert-danger">
    <strong>Username</strong> Must be larger than 3 characters
    </div>



    <input class="form-control Email" type="mail" name="Email" placeholder="Type Your valid Email"       value="<?php if(isset($Mail)){ echo $Mail; } ?>">
    <i class="fa fa-envelope"></i>
    <div class="alert alert-danger coustom-alert">
    <strong>Email</strong> Must be larger than 3 characters
    </div>



    <input class="form-control" type="tel" name="phone" placeholder="Type Your cell phone"         value="<?php if(isset($Tell)){ echo $Tell; } ?>">
    <i class="fa fa-phone"></i>

    <textarea  class="form-control" name="Message"  cols="30" rows="10" placeholder="*Type Message"><?php if(isset($Mesg)){echo $Mesg;}?></textarea>

    <input class="btn btn-success" type="submit" value="Send values">
    <i class="fa fa-send send-iqon"></i>
</form>
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <!-- <script src="js/jquery-3.2.1.min.JS"></script> -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
 <script srs="js/fontawesome.min.js"></script>

 <script src="js/SCRIPT1.JS"></script>
 
</body>
</html>