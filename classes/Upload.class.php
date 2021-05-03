<?php
session_start();

class Upload extends Update {

    public function uploadImage() {

        if (isset($_FILES['image'])) {

            // Variables
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_explode = explode('.',$_Files['image']['name']);
            $file_end = end($file_explode);
            $file_strtolower = strtolower($file_end);
            $file_ext = $file_strtolower;

            // Setting allowed extensions
            $extensions= array("jpeg","jpg","png");

            // Setting message if extension not allowed.
            if(in_array($file_ext, $extensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }

            // Continue if there is no errors.
            if(empty($errors) == true) {
                
                // Updating database entry with new file name.
                $connect = new Update;
                $connect->updateProfile($file_name);
                move_uploaded_file($file_tmp,"../img/profile/".$file_name);

                // Sending message for succesful upload
                $_SESSION['message'] = 'Successfully uploaded profile picture!';

                // Redirecting to GET method
                header('Location: https://povilaszubrys.lt/pages/controlpanel.php');

            } else {
                print_r($errors);
            }
        }
    }
}