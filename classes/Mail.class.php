<?php

class Mail
{
    public function sendMail($sendersName, $sendersEmail, $sendersMessage)
    {    
        $yourEmail = 'info@povilaszubrys.lt';

        $body = "You have just received an email:    
                    Name:  $sendersName
                    E-Mail: $sendersEmail
                    Message: $sendersMessage"; 

        if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
            $headers = "From: $_POST[email]";     
        } else {
            $headers = "From: $yourEmail"; 
        }

        mail($yourEmail, 'Contact Form', $body, $headers );
        $_SESSION['message']['success'] = 'Email was sent succesfully. I will contact you soon!';
        
        header("Location: https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        exit;
    }
}