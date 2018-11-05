<?php

if(!empty($_POST)) extract($_POST);


$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$fonction = $_POST['fonction'];
$enterprise = $_POST['enterprise'];
$message = $_POST['message'];
$pack = $_POST['pack'];



$dest="vanessa.asse@gmail.com";
$objet="Demande de devis via le site d'Auverlink";
$mess="
    
      \n";
$mess.="Nom : $lastname
    \n";
$mess.="Prénom : $firstname
    \n";
$mess.="Email : $email
    \n";
$mess.="Téléphone: $phone
    \n";
$mess.="Fonction: $fonction
    \n";
$mess.="Entreprise: $enterprise
    \n";
$mess.="Message : $message
    \n";
$mess.="Pack : $pack
    \n";
$mess.="
    \n";

$headers = "MIME-Version: 1.0\n";
$headers .= "content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: vanessa.asse@gmail.com\n";
if (mail($dest,$objet,htmlspecialchars($mess),$headers)){
    header("location: mailOk.php");
}else{
    header("location: errorMail.php");
}


