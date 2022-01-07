<?php

$name= $_POST['name'];
$phone= $_POST['phone'];
$email= $_POST['email'];
$subject= $_POST['subject'];
$message= $_POST['message'];
$body= "
Nama : $name <br/>
HP : $phone <br/>
Email: $email <br/>
Subject : $subject <br/>
Message : $message
";

function Send_Mail($to,$subject,$body)
{
require 'PHPMailer/class.phpmailer.php';
 
$email= $_POST['email'];
$mail = new PHPMailer;
$mail->IsSMTP(); // SMTP & jika isSMTP saya ganti jadi isMail() dia muncul error, sedangkan jika memakai isSMTP() tidak muncul pesan apapun
$mail->SMTPAuth = true; // SMTP authentication
$mail->Host= "smtp.gmail.com";
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->SetFrom("email@gmail.com","email sender");
$mail->Username = "marketing@maturnuwun.co.id"; // username gmail yang akan digunakan untuk mengirim email
$mail->Password = "200313Maturnuwun"; // Password email
$mail->SetFrom($email, 'Message Form Website');
$mail->AddReplyTo($email,'Message Form Website');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->AddAddress($email);
if(!$mail->Send()){
	echo "gagal " . $mail->ErrorInfo;
	return false;
}
else{
	echo "<br/><br/><center><h3>email telah terkirim</h3></center>";
	return true;
}

}

$to = "marketing@maturnuwun.co.id"; //email tujuan
$subject = $_POST['subject']; ; // subject email
Send_Mail($to,$subject,$body);
?>
<script type="text/javascript">
setTimeout(
  function(){
    window.location = "https://maturnuwun.co.id/contact.php" 
  },
1000); // waktu tunggu atau delay
</script>

