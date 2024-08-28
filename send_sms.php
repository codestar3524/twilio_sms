<?php  
require __DIR__ . '/vendor/autoload.php';  
use Twilio\Rest\Client;  

// Your Account SID and Auth Token from twilio.com/console  
$account_sid = '';  
$auth_token = ''; // Use environment variables in production  
$twilio_number = ""; // Ensure this number is SMS-capable and verified  

$client = new Client($account_sid, $auth_token);  

try {  
    // Use a verified destination number  
    $client->messages->create(  
        $phone_number, // Ensure this number is verified and correct  
        array(  
            'from' => $twilio_number,  
            'body' => rand(100000,999999)  
        )  
    );  
    echo "Message sent successfully.";  
} catch (\Twilio\Exceptions\RestException $e) {  
    echo "Error: " . $e->getMessage(); // Print error details for troubleshooting  
}