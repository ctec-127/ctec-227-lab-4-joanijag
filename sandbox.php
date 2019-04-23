else{
            $dir = "images";
            // if(isset($_GET['del'])){
            //     unlink($upload_dir[$dir]){
            //         echo "you have successfully deleted  your image"
            //  }//end if
                if ($_SERVER['REQUEST_METHOD'] == "GET") {
                    if(is_dir($dir)){
                        $dir_array = scandir($dir);
                        foreach ($dir_array as $file) {
                            // don't display the . and .. directories. Using the strpos() for this.
                            if(strpos($file,'.') > 0){
                                echo "filename: {$file}<br/>";
                                echo "<img src=" . "images/" . $file ." height=200/><br>";
                                // echo "<a href="?del=$filename">;
                            }//end if
                        }//end foreach
                    } // end if
                }//end if
            // }//end if
        }//end else 




        if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['del'])) {
            unlink($upload_dir[$dir]){
                echo "you have successfully deleted  your image";
            }//end if