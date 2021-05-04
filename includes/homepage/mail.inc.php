<?php

// Email stuff
// if the url field is empty
if(isset($_POST['url']) && $_POST['url'] == '') {
    $sendersName = $_POST['name'];
    $sendersEmail = $_POST['email'];
    $sendersMessage = $_POST['message'];
    
    // Validating contact form.
    $validate = new Validate;
    $result = $validate->validateContact($sendersName, $sendersEmail, $sendersMessage);

    if ($result === true) {
        $send = new Mail;
        $send->sendMail($sendersName, $sendersEmail, $sendersMessage);
    } else {
        $messageError = 'Oops, something went wrong. :(';
    }
} // otherwise, let the spammer think that they got their message through