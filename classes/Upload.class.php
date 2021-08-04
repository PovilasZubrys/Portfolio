<?php
session_start();

class Upload extends Update {

    public function uploadImage()
    {
        if (isset($_FILES['image'])) {

            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_explode = explode('.',$_Files['image']['name']);
            $file_end = end($file_explode);
            $file_strtolower = strtolower($file_end);
            $file_ext = $file_strtolower;

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext, $extensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }

            if(empty($errors) == true) {
                
                $connect = new Update;
                $connect->updateProfile($file_name);
                move_uploaded_file($file_tmp,"../img/profile/".$file_name);

                $_SESSION['message'] = 'Successfully uploaded profile picture!';

                header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
                exit;

            } else {
                print_r($errors);
            }
        }
    }
}