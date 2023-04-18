<?php

$errors = [];
$errorMessage = '';
 function prompt(){
        echo("<script type='text/javascript'> alert('Thanks, your message successfully sent');   window.location.href='http://invcu.com/'; </script>");
        
          

       
    }

if (!empty($_POST)) {
    $fname = $_POST['f_name'];
     $lname = $_POST['l_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $phone=$_POST['phone'];
   

    if (empty($fname)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (empty($errors)) {
        $toEmail = 'info@invcu.com';
        $emailSubject = 'New email from your contant form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}","Email: {$email}","Subject:{$sub}", "Message:{$message}"] ;
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
           prompt();
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>