<?php

class Update extends Dbh {
    public function updateDescription($description) {
        $stmt = $this->connect()->prepare('UPDATE about
                                SET description = :description
                                WHERE id = 1');

        $stmt->execute(['description' => $description]);
        header('Location: https://povilaszubrys.lt/pages/controlpanel.php');
    }

    public function updateProfile($fileName) {
        $stmt = $this->connect()->prepare('UPDATE about
                                            SET profile_picture = :fileName
                                            WHERE id = 1');

        $stmt->execute(['fileName' => $fileName]);
        header('Location: https://povilaszubrys.lt/pages/controlpanel.php');
    }

    public function updatePassword($password1, $password2, $id) {
        if ($password1 == $password2) {

            $encrypted_password = password_hash($password1, PASSWORD_DEFAULT);
            
            $this->connect()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "UPDATE `user` SET `password` = :password WHERE id = :id";

            $statement = $this->connect()->prepare($sql);

            //Bind our value to the parameter :id.
            $statement->bindValue(':id', $id);

            //Bind our :model parameter.
            $statement->bindValue(':password', $encrypted_password);

            //Execute our UPDATE statement.
            $statement->execute();

            header('Location: https://povilaszubrys.lt/pages/controlpanel.php');
        }
    }
}