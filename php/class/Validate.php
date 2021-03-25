<?php

class Validate {
    public function validateContact($sendersName, $sendersEmail, $sendersMessage) {
        
        // This is regex for what validation will be searched for.
        $specialCharacters = '/([A-Za-z])\w+/u';
        $numbers = '/[0-9]+/';
        $properEmail = '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/';
        $messageSpecial = '/^[A-Za-z0-9]+$/';

        // Checks if name isn't empty.
        if ($sendersName === '') {
            return false;
        }

        // Checks if name contains any special character.
        if (!preg_match_all($specialCharacters, $sendersName)) {
            return false;
        }

        // Checks if name contains numbers.
        if (preg_match_all($numbers, $sendersName)) {
            return false;
        }

        // Checks if name is longer than 50 characters.
        if (strlen($sendersName) > 50) {
            return false;
        }

        // Checks if isn't empty.
        if ($sendersEmail === '') {
            return false;
        }

        // Checks if email is a proper email.
        if(!filter_var($sendersEmail, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // Checks if message contains special characters
        if (!preg_match_all($messageSpecial, $sendersMessage)) {
            return false;
        }

        return true;
    }
}