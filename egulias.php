<?php

require_once 'vendor/autoload.php';

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;


// Create an instance of EmailValidator
$validator = new EmailValidator();

// Example with RFCValidation
$rfcValidation = new RFCValidation();
$email = "hirokikato1@gmail.edu";
$result = $validator->isValid($email, $rfcValidation);
echo "RFC Validation for $email: " . ($result ? 'Valid' : 'Invalid') . PHP_EOL;

// Example with DNSCheckValidation
$dnsCheckValidation = new DNSCheckValidation();
$email = "hirokikato1@gmail.net";
$result = $validator->isValid($email, $dnsCheckValidation);
echo "DNS Check Validation for $email: " . ($result ? 'Valid' : 'Invalid') . PHP_EOL;

// Example with MultipleValidationWithAnd
$multipleValidations = new MultipleValidationWithAnd([
    new RFCValidation(),
    new DNSCheckValidation()
]);
$email = "erpelding@excite.com";
$result = $validator->isValid($email, $multipleValidations);
echo "<div>";
echo "<h1>Email validator test</h1>";
echo "<h3>Multiple Validations for: $email result--" . ($result ? 'Valid' : 'Invalid') . "</h3>";


echo "</div>";
