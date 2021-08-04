<?php

class Update extends Dbh 
{
    public function updateDescription($description)
    {
        $sql = "UPDATE about SET description = $description WHERE id = 1";

        $this->set($sql);

        header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
        exit;
    }

    public function updateProfile($fileName)
    {
        $sql = "UPDATE about SET profile_picture = $fileName WHERE id = 1";

        $this->set($sql);

        header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
        exit;
    }

    public function updatePassword($password1, $password2, $id)
    {
        if ($password1 == $password2) {
            $encrypted_password = password_hash($password1, PASSWORD_DEFAULT);
            
            $sql = "UPDATE `user` SET `password` = $encrypted_password WHERE id = $id";

            $statement = $this->connect()->prepare($sql);

            $this->set($sql);
            
            header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
            exit;
        }
    }
}