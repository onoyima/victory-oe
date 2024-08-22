<?php 

if(isset($_POST['btn-send'])){
    


        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

     if(empty($name) || empty($email) || empty($subject) || empty($message)){
        header('location:index.php?error');
     }
     else
     {
        $to = "clintonfaze@gmail.com";


        if(mail($to,$subject,$message,$email))
        {
            header('location:index.php?success');
        }
     }
    }
    else
    {
        header('location:index.php?error');
    }
?>