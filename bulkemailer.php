<?php
    // echo $_SERVER['PHP_SELF']; // Made it!

    $campaign = $_POST['subject'];
    echo ('Choosen Campaign/Subject: ' . "<b>" . $campaign . "</b>" . "<br>");
    
    //*************************      File Upload      ***************************//
    $errors = array();
    $currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";
    $fileExtensionsAllowed = ['txt','doc','exl']; // These will be the only file extensions allowed
    $fileLimitMb = 10; // File limit in MB
    $uploadOk = true;

    $listFileName = $_FILES['listFile']['name'];

    if(empty($listFileName)){ // Check upload file was selected
        echo "<br>" .'No file input found.. ';
        $uploadOk = false;
    }
    else{
        echo 'List File to Upload: ' . "<b>" . $listFileName . "</b>" . "<br>************<br><br>";
        //print_r($_FILES);
    }
    
    $fileSize = $_FILES['listFile']['size'];
        // echo "Size: " . $fileSize . "<br>";
    $fileTmpName  = $_FILES['listFile']['tmp_name'];
        // echo "TmpName: " . $fileTmpName . "<br>";
    $fileType = $_FILES['listFile']['type'];
       //  echo "Type: " . $fileType . "<br><br>";
    $fileExtension = strtolower(end(explode('.',$listFileName)));
    //$fileType = strtolower(pathinfo($listFileName,PATHINFO_EXTENSION));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($listFileName);
    
    // Check if file already exists
    if (file_exists($uploadPath) && !empty($listFileName)){
        echo $exists . "File already exists. ";
        $uploadOk = false;
    }

    // Check file size
    if ($fileSize > ($fileLimitMb * 100000)) {
        echo "File must be less than " . $fileLimitMb . "MB. ";
        $uploadOk = false;
    }

    // Allow certain file formats 
    if(! in_array($fileExtension,$fileExtensionsAllowed) && !empty($listFileName)) {
        echo "Sorry, only TXT, DOC, EXL files are allowed. ";
        $uploadOk = false;
    }

    // Check if $uploadOk then process
    if ($uploadOk == false) {
        echo "File was not uploaded. <br><br>";
     } else {
        if (move_uploaded_file($fileTmpName, "uploads/" .$listFileName)) {
            echo "The file ". basename($listFileName). " has been uploaded successfully.";
        } else {
            echo "Sorry, there was an error uploading your file. Try again.";
        }
     }
     //***********************************************************************//
    



    // Open the file with a list  // fopen("listFileName","mode: r - read only")
    $openedList = fopen($uploadPath,"r");
    echo "<br>openedList: " . $openedList ;

     // Lock file while open - no other processes can happen while locked
     flock($openedList, LOCK_EX);
        
    if($openedList){ // Check if file opened successfully
        while(! feof($openedList))  {
            $email = fgets($openedList, 1000); // Read full line/email address until new line
            echo "<br>Email: " . $email;
        }
        // flock($openedList, LOCK_UN); // unlock first if needed
        fclose($openedList);
    }

    // if($openedList){ // Check if file opened successfully

    //     // While not at the end of the file
    //     while(! feof($openedList))  {
    //       $email = fgets($openedList); // Read full line/email address until new line
    
    //       // Prepare email details 
    //       $subject = "BulkEmailer Successful!!";
    //       $headers = "From: Carla Heywood <carla.heywood@gefinance.com>\r\n";
    
    //       // Use html template from another file
    //       $body = file_get_contents("template.html");
    
    //       // Send template email
    //       if(  // If email is successful, let me know.
    //           mail( 
    //             $email, 
    //             $subject,
    //             $message = $body,
    //             $headers
    //           )
    //         ){
    //           echo 'BulkEmail Successful!!';
    //         }
    //       else{ // If email is NOT successful, die (what about the rest of the list?)
            
    //         if(! feof($openedList){ // if we are not at the end of the list, let me know which email did not send
    //           echo "Failed to send at this email: " . $email . "\n Please try again.";
    //           die ('Please try again.');
    //         }
    //         else{ // if we are at the end, let me know the last email to send.
    //           echo 'End of file.' . $email . 'last email to send.';
    //         }
    //       }
          
    //     }
    //     // Close the list file that we opened - should also unlock
    //     // flock($openedList, LOCK_UN); // unlock first if needed
    //     fclose($openedList);

    //     //Delete uploaded file when complete
    //     if(unlink("testmail"){
    //     echo 'File Deleted.'
    //     }
    //     else{ // File was not deleted. Check if open, close it, nd try to delete again. 
    //     echo 'File NOT Deleted.'
    //     }
    // }
    // else{ // File could not be opened, let me know. 
    //     echo "File did not open successfully."
    // }
?>