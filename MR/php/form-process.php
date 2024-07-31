<?php
 
$errorMSG = "";
 
// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}
 
// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// PHONE
if (empty($_POST["phone"])) {
    $errorMSG .= "Phone is required ";
} else {
    $phone = $_POST["phone"];
}

// PARTY
if (empty($_POST["party"])) {
    $errorMSG .= "Party size is required ";
} else {
    $party = $_POST["party"];
}

// DATE AND TIME
if (empty($_POST["datetime"])) {
    $errorMSG .= "Date and Time are required ";
} else {
    $datetime = $_POST["datetime"];
}
// // MSG SUBJECT
// if (empty($_POST["msg_subject"])) {
//     $errorMSG .= "Subject is required ";
// } else {
//     $msg_subject = $_POST["msg_subject"];
// }
 
 
// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}
 
//Add your email here
$EmailTo = "juanchobedoya4@gmail.com";
$Subject = "Reservacion Restaurante";
 
// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "Party Size: ";
$Body .= $party;
$Body .= "\n";
$Body .= "Date and Time: ";
$Body .= $datetime;
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
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
 
?>