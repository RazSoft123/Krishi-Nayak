<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test to upload an image</title>
</head>
<body>
    <form action="imageupload.php" method="post" enctype=”multipart/form-data”>
        <input type="file" name="up_image" id="up_image"> upload file </input>
        <button type="submit"> submit </button>
    </form>

    <?php
        $targetdir = "res/img/postimg";
        $targetfile = $targetdir;
        basename($_FILES["filetoupload"]["name"]);
        $uploadok = 1;
        $imagefiletype = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

        // if(isset($_POST["up_image"])){
        //     $check = getimagesize($_FILES["filetoupload"]["up_image"]);
        //     if($check !== false){
        //         echo "File is an image".$check["mime"].".";
        //         $uploadok = 1;
        //     }else {
        //         echo "File is not an image";
        //         $uploadok = 0;
        //     }
        // }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $targerfile = $_POST["up_image"];
            echo "File name by input field.".$targerfile;

            //Checking if file is uploaded
            echo "Uploaded file is ".$_FILES["up_image"]["name"];
        }

        // //Check if file already exist
        // if($_FILES["filestoupload"]["size"] > 500000){
        //     echo "Sorry file size is too large";
        //     $uploadok = 0;
        // }

        // // Allow certain file formats
        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        // && $imageFileType != "gif" ) {
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        // $uploadOk = 0;
        // }

        // // Check if $uploadOk is set to 0 by an error
        // if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        // // if everything is ok, try to upload file
        // } else {
        // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        // } else {
        //     echo "Sorry, there was an error uploading your file.";
        // }
        // }

    ?>

</body>
</html>