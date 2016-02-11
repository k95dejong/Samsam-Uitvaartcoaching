<?php
$errorMSG = "";
// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Naam is vereist";
} else {
    $name = $_POST["name"];
}
// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email vereist";
} else {
    $email = $_POST["email"];
}
// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Bericht is vereist";
} else {
    $message = $_POST["message"];
}
$EmailTo = "jeleanenightbreeze@gmail.com";
$Subject = "Bericht van SamSam Contactformulier";
// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);
// redirect to success page
if ($success && $errorMSG == ""){
    echo "success";
}else{
    if($errorMSG == ""){
        echo "Er is iets mis gegaan.";
    } else {
        echo $errorMSG;
    }
}
?>