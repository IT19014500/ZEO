<?php

include('../../../connection.php');

$c = 0;
$sql="SELECT * FROM contact ";
$result=$conn->query($sql);

use PHPMailer\PHPMailer\PHPMailer;

require_once '../phpmailer/Exception.php';
require_once '../phpmailer/PHPMailer.php';
require_once '../phpmailer/SMTP.php';

$mail= new PHPMailer(true);

$alert = '';

$c+=1;
while($record = mysqli_fetch_array($result)){
  $un = $record['uname'];
  $pw = $record['pwd'];

  $deun = base64_decode($un);
  $depw = base64_decode($pw);

  if($c==1){
    break;
}                     
}

if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $message= $_POST['message'];

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $deun;//smtp server mail
        $mail->Password = $depw;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port ='587';

        $mail->setFrom($deun);//smtp server mail
        $mail->addAddress($deun);//For receive Emails

        $mail->isHTML(true);
        $mail->Subject = 'Message Received(Zonal Contact Page)';
        $mail->Body = "<h3>Name : $name<br>Email : $email<br>Message : $message</h3>";
        
        $mail->send();
        $alert = '<div class="alert-success">
                    <span>Message Sent! Thank you for contacting us.</span>
                  </div>';
              

    }catch(Exception $e){
        $alert = '<div class="alert-error">
                    <span>'.$e->getMessage().'</span>
                  </div>';
    }
}
// Something went wrong! Please try again.
?>