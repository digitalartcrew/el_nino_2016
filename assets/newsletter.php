<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

include dirname(dirname(__FILE__)).'/config.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{
include 'functions.php';

$email = trim($_POST['e-mail']);

$error = '';

// Check email

if(!$email)
{
$error .= '<div class="alert">Please enter an e-mail address.</div>';
}

if($email && !ValidateEmail($email))
{
$error .= '<div class="alert">Please enter a valid e-mail address.</div>';
}

// Check message (length)


if(!$error)
{
ini_set("sendmail_from", WEBMASTER_EMAIL); // for windows server

// The e-mail message being sent to the admin - you can change the content of the message below.
$mail = mail(WEBMASTER_EMAIL, "Newsletter Signup Request", "Sweet, you can add " . $email . " to the newsletter mailing list!",
     "From: <".$email.">\r\n"
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion());


if($mail)
{
echo 'OK';
}

}
else
{
echo '<div class="notification_error">'.$error.'</div>';
}

}
?>