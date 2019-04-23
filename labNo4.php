<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

    <?php 
    // Define these errors in an array
	$upload_errors = array(
                            UPLOAD_ERR_OK 				=> "No errors.",
                            UPLOAD_ERR_INI_SIZE  		=> "Larger than upload_max_filesize.",
                            UPLOAD_ERR_FORM_SIZE 		=> "Larger than form MAX_FILE_SIZE.",
                            UPLOAD_ERR_PARTIAL 			=> "Partial upload.",
                            UPLOAD_ERR_NO_FILE 			=> "No file.",
                            UPLOAD_ERR_NO_TMP_DIR 		=> "No temporary directory.",
                            UPLOAD_ERR_CANT_WRITE 		=> "Can't write to disk.",
                            UPLOAD_ERR_EXTENSION 		=> "File upload stopped by extension.");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // what file do we need to move?
        $tmp_file = $_FILES['file_upload']['tmp_name'];
        // set target file name
        // basename gets just the file name
        $target_file = basename($_FILES['file_upload']['name']);
        // set upload folder name
        $upload_dir = 'images';
        // Now lets move the file
        // move_uploaded_file returns false if something went wrong
        if(move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)){
            $message = "File uploaded successfully";
        } else {
            $error = $_FILES['file_upload']['error'];
            $message = $upload_errors[$error];
        } // end of if(move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file))
        //Check to see if you have a GET request
    }
    if ($_SERVER['REQUEST_METHOD'] == "GET"){
        $dir = "images";
        // IF query string parameter is set
        //  if(isset($_GET['del'])){
        //     //  Process deletion of file
        //    unlink($target_file[$dir]){
        //      echo "you have successfully deleted  your image"
        //   }//end if             
        if(is_dir($dir)){
            $dir_array = scandir($dir);
            foreach ($dir_array as $file) {
                // don't display the . and .. directories. Using the strpos() for this.
                if(strpos($file,'.') > 0){
                    //echo '<div class="col-md-4"><div class="thumbnail">';
                    echo "<img src=" . "images/" . $file .' height=300 class="card"/>';
                    echo '<input type="button" name="del" value="Delete">' . " filename: {$file}" . '<br><br>';
                   //echo '</div></div>';
                   
                }//end if
            }//end foreach
        } // end if
    }//end else 
      
                    
    // this will let you delete the image
	// use a $GET query string to delete the image
	//	unlink('uploads/cheese.jpg');
    
    // <a href="?del=$filename">


    ?>
    <?php if(!empty($message)) {echo "<p>{$message}</p>";} ?>
    <form action="<?html" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
            <input type="file" name="file_upload">
            <input type="submit" name="submit" value="Upload">
        </div>
    </form>

</body>



<!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>