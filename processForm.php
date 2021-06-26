<?php

$msg="";
$css_class="";

$conn = mysqli_connect("localhost","root","","image-upload");
    if(isset($_POST['save-user'])) {
         echo "<pre>",print_r($_FILES['profileImage']['name']), "</pre>";
        
         $name=$_POST['name'];
         $phone=$_POST['phone'];
         $address=$_POST['address'];
         $profileImageName= time() . '_' . $_FILES['profileImage']['name'];
        
         $target='images/' . $profileImageName;
         if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
             $sql="INSERT INTO users (name,phone,address,profile_image) VALUES ('".$name."','".$phone."','".$address."','$profileImageName')";
             if(mysqli_query($conn,$sql)) {
             $msg="Image uploaded and save to database";
             $css_class= "alert-success";
         }
         else {
            $msg="Database error: Failed to save user";
            $css_class= "alert-danger";
         }
    }
}
?> 