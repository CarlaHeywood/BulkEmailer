<?php
  $from = $_POST['email'];


  $emails = $_POST['name'];

  $template = file_get_contents("template.html")

  $subject = "";
  $message = $template;
  //$message2 = "" . $_POST['message'] . "";
  $headers = "From: Carla Heywood <carla.heywood@gefinance.com>\r\n";

  if( mail("carlaheywood24@gmail.com",$subject,$message,$headers) ){
    //mail($email,"Carla Heywood",$message2,$headers);
    echo 'BulkEmailer - Sent';
  }
  else {
    die ('Please try again.');
  }
?>