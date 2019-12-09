<?php
require 'functions.php';

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if($_POST)
{
    $email = $_POST['email'];

        $selectquery = mysqli_query($conn, "SELECT * FROM user WHERE EMAIL = '$email'");
        $count = mysqli_num_rows($selectquery);
        $row = mysqli_fetch_array($selectquery);

        $tes = $row['PASSWORD'];
        
        // echo $count;

        if($count > 0 )
        {
            // echo $row['PASSWORD'];
            
    $mail = new PHPMailer(true);

try {

    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'jonathansterben@gmail.com';                     
    $mail->Password   = 'e41180362';                               
    $mail->SMTPSecure =  'ssl' ;         
    $mail->Port       =  465;                                    

   
    $mail->setFrom('jonathansterben@gmail.com', 'Admin Naura Farm');
    $mail->addAddress($row["EMAIL"]);     



    $mail->isHTML(true);                                 
    $mail->Subject = 'Here is the subject';
    $mail->Body    =  'Silahkan Ganti Password Anda di http://localhost/My_Clinic/web%20fix/web%20e/resetpass.php' ;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // "Password anda adalah <b>$tes</b>"
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        }
}   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        email : <input type="text" name="email">
        <input type="submit">
    </form>
</body>
</html>