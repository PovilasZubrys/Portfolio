<?php
session_start();

   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if(empty($errors)==true){
        $_SESSION['image'] = $file_name;

        move_uploaded_file($file_tmp,"../img/profile/".$file_name);
        $_SESSION['message'] = 'Successfully uploaded profile picture!';
        header('Location: http://localhost/portfolio/pages/controlpanel.php');
      }else{
        print_r($errors);
      }
   }
?>