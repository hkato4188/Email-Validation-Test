<?php
require 'vendor/autoload.php';

use Verifalia\VerifaliaRestClient;
use Verifalia\VerifaliaRestClientOptions;

function validateEmail($email)
{
    $verifalia = new VerifaliaRestClient([
        VerifaliaRestClientOptions::USERNAME => 'hirokikato1@gmail.com',
        VerifaliaRestClientOptions::PASSWORD => 'password'
    ]);

    $job = $verifalia->emailValidations->submit($email);

    // Return validation results
    $result = $job->entries[0];
    return $result->status;
}

// test case:
$emailToValidate = 'hirokikato1@gmail.com';
$result = validateEmail($emailToValidate);

// output results
echo 'Classification: ' . $result->classification . "\n";
echo 'Status: ' . $result->status . "\n";
var_dump($result);
