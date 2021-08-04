<?php

class Read extends Dbh {

    public function getDescription()
    {
        $sql = 'SELECT description, profile_picture 
                FROM about';

        $data = $this->get($sql);

        return $data;
    }

    public function getUser($userId)
    {
        $sql = "SELECT id, name, surname FROM user WHERE id = $userId";

        $user = $this->get($sql);

        return $user;
    }
}