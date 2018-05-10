<?php 
require_once "Twilio\autoload.php";
    use Twilio\Rest\Client;
    
    
   $AccountSid = "AC12f20bfa2f6630b53c40266939dab38e";
    $AuthToken = "c2e4f138358a300f07031c7026c9341f";
    $TMsender = "+14256540807";

    // Instantiate a new Twilio Rest Client
    $client = new Client($AccountSid, $AuthToken);


?>