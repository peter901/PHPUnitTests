<?php 


class Mailer {


    public function sendMessage($email, $message){

        if(empty($email)){
            throw new Exception("{$email} is empty");
        }
        sleep(3);

        echo "Send '{$message}' to '{$email}' ";

        return true;
    }
}