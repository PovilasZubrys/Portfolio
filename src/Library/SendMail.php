<?php

namespace App\Library;

class SendMail
{
    private string $email = 'povilaszubrys@gmail.com';

    public function sendMail($fields)
    {
        $sendersName = $fields['name'];
        $sendersEmail = $fields['email'];
        $sendersMessage = $fields['message'];

        $body = "You have just received an email:    
                Name:  $sendersName
                E-Mail: $sendersEmail
                Message: $sendersMessage";

        $headers   = [];
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/plain; charset=utf-8";
        $headers[] = "From: noreply@povilaszubrys.lt";
        $headers[] = "X-Mailer: PHP/".phpversion();

        if (mail($this->email, 'Contact Form', $body, implode("\r\n",$headers) )) {
            return true;
        }
        return false;
    }
}