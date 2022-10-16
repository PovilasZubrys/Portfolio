<?php

namespace App\Library;

class SendMail
{
    private string $email = 'contact@povilaszubrys.lt';

    public function sendMail($fields)
    {
        $sendersName = $fields['name'];
        $sendersEmail = $fields['email'];
        $sendersMessage = $fields['message'];

        $body = "You have just received an email:    
                Name:  $sendersName
                E-Mail: $sendersEmail
                Message: $sendersMessage";

        $headers = "From: $sendersEmail";

        if (mail($this->email, 'Contact Form', $body, $headers )) {
            return true;
        }
        return false;
    }
}