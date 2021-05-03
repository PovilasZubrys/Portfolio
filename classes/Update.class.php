<?php

class Update extends Dbh {

    // Updating description
    public function updateDescription($description) {

        // Connecting to database and preparing fields to update
        $stmt = $this->connect()->prepare('UPDATE about
                                SET description = :description
                                WHERE id = 1');

        // Executing update.
        $stmt->execute(['description' => $description]);
        header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
        exit;
    }

    // Updating profile
    public function updateProfile($fileName) {

        // Connecting to database and preparing fields to update
        $stmt = $this->connect()->prepare('UPDATE about
                                            SET profile_picture = :fileName
                                            WHERE id = 1');

        // Executing update.
        $stmt->execute(['fileName' => $fileName]);
        header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
            exit;
    }

    // Updating password.
    public function updatePassword($password1, $password2, $id) {

        // Checking if both passwords given are the same
        if ($password1 == $password2) {

            // Encrypting password.
            $encrypted_password = password_hash($password1, PASSWORD_DEFAULT);
            
            // Making conenction to database
            $this->connect()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Setting which fields to update
            $sql = "UPDATE `user` SET `password` = :password WHERE id = :id";

            // Preparing update.
            $statement = $this->connect()->prepare($sql);

            //Bind our value to the parameter :id.
            $statement->bindValue(':id', $id);

            //Bind our :model parameter.
            $statement->bindValue(':password', $encrypted_password);

            //Execute our UPDATE statement.
            $statement->execute();
            
            header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
            exit;
        }
    }
}