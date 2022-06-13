<?php

if(isset($_POST["sub"])){
    // grabing the data
    $mail = $_POST['mail'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //instantiate signupcontr class

     include "../controls/contact-contr.class.php";
     
   
     $contact = new Contact($mail,$name,$subject,$message);

     // running error handlers and user signup

     echo $contact->sendMail();
    
    //going to back to front page
}