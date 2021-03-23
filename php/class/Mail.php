<?php

class Mail {
    public function sendMail($sendersName, $sendersEmail, $sendersMessage) {    

        // put your email address here     
        $youremail = 'info@povilaszubrys.lt';

        // prepare a "pretty" version of the message
        $body = "This is the form that was just submitted:     
                    Name:  $sendersName
                    E-Mail: $sendersEmail
                    Message: $sendersMessage"; 

        // Use the submitters email if they supplied one     
        // (and it isn't trying to hack your form).     
        // Otherwise send from your email address.     

        if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
            $headers = "From: $_POST[email]";     
        } else {
            $headers = "From: $youremail"; 
        }

        // finally, send the message     
        mail($youremail, 'Contact Form', $body, $headers );
    }
}