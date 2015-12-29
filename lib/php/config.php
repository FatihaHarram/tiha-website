<?php
//fichier de configuration


//demande au php d'activer l'affichage des erreurs
ini_set('display_errors', 'on');
//demande d'affichage de toutes les erreurs
ini_set('error_reporting', E_ALL);


//initialiser les mails///////////////
// Please specify your Mail Server - Example: mail.example.com.
ini_set("SMTP","relay.skynet.be"); //relay.skynet.be 
//gmail = ini_set("SMTP","smtp.gmail.com"); ini_set("smtp_port","465");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port","587");

// Please specify the return address to use
ini_set('sendmail_from', 'f.harram@gmail.com');


//Paramètres de création de cookies de 7jours
$duree = time()+7*24*366;
$chemin = '/';
$domaine = $_SERVER['SERVER_NAME'];
$https = isset($_SERVER['HTTPS']);
$httponly = true;






?>