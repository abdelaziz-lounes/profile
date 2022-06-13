<?php


class Contact  { 

    
    
    private $mail;
    private $message;
    private $name  ;
    private $subject  ;


    public function __construct($mail,$name,$subject,$message){
        $this->message =$message;
        $this->name =$name;
        $this->subject =$subject;
        $this->mail =$mail;
        
    }

    public function sendMail(){
            if($this->emptyInput()==false){
                return "pls enter all sections!";
            }elseif($this->valid_Email()== false){
                return "unvalid email!";
            }else{
                require_once "../Mailer/mail.php";
                $mail->setFrom( $this->mail , 'aziz');
                $mail->addAddress('abdelazizlounes2@gmail.com');   
                $mail->Subject = 'Another contact from our clients:';
                $mail->Body    = 'MESSAGE: ' .$this->message . '<br>/ name:' . $this->name. '<br> /Email:'.$this->mail;
                $mail->send();
                return "email sent";
            }
    }
    protected function emptyInput(){
        
        if(empty($this->name) || empty($this->mail) || empty($this->message)){
            return false;

        }
        else{
            return true;
        }
    }

    protected function valid_Email(){

        if (!filter_var($this->mail, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

   
}