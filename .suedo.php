<?php

if (isset($_POST["submit"])) {
  // Display form inputs
  echo ('Choosen Campaign/Subject: ' . $campaign = $_POST['subject']);
  echo ('List File Uploaded: ' . $_POST['listFile'];
}
  
  // Using $_POST input from html form  -- $message = "Email: ". $_POST['email'] ."\n\n" . "Subject: " . $_POST['subject'] ."\n\n" . "Message: " . $_POST['message'];

  // Open the file with a list  // fopen("filename","mode: r - read only")
  $fn = fopen($campaign,"r");

  // Lock file while open - no other processes can happen while locked
  flock($fn, LOCK_EX);
  
  if($fn){ // Check if file opened successfully

    // While not at the end of the file
    while(! feof($fn))  {
      $email = fgets($fn); // Read full line/email address until new line

      // Prepare email details 
      $subject = "BulkEmailer Successful!!";
      $headers = "From: Carla Heywood <carla.heywood@gefinance.com>\r\n";

      // Use html template from another file
      $body = file_get_contents("template.html");

      // Send template email
      if(  // If email is successful, let me know.
          mail( 
            $email, 
            $subject,
            $message = $body,
            $headers
          )
        ){
          echo 'BulkEmail Successful!!';
        }
      else{ // If email is NOT successful, die (what about the rest of the list?)
        
        if(! feof($fn){ // if we are not at the end of the list, let me know which email did not send
          echo "Failed to send at this email: " . $email . "\n Please try again.";
          die ('Please try again.');
        }
        else{ // if we are at the end, let me know the last email to send.
          echo 'End of file.' . $email . 'last email to send.';
        }
      }
      
    }
    // Close the list file that we opened - should also unlock
    // flock($fn, LOCK_UN); // unlock first if needed
    fclose($fn);

    //Delete uploaded file when complete
    if(unlink("testmail"){
      echo 'File Deleted.'
    }
    else{ // File was not deleted. Check if open, close it, nd try to delete again. 
      echo 'File NOT Deleted.'
    }
  }
  else{ // File could not be opened, let me know. 
    echo "File did not open successfully."
  }
?>