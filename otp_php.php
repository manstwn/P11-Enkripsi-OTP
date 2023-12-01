<?php

function converstringkeascii($string)
{
    $asciiArray = [];
    for ($i = 0; $i < strlen($string); $i++) {
        $asciiValue = ord($string[$i]);
        $asciiArray[] = $asciiValue;
    }
    return $asciiArray;
}

function convertasciikebinary($asciiArray)
{
    $binaryArray = [];
    foreach ($asciiArray as $asciiValue) {
        $binaryArray[] = str_pad(decbin($asciiValue), 8, '0', STR_PAD_LEFT); 
    }
    return $binaryArray;
}

function xorBinaryStrings($binary1, $binary2)
{
    $decimal1 = bindec($binary1);
    $decimal2 = bindec($binary2);
    $xorResult = $decimal1 ^ $decimal2;
    return str_pad(decbin($xorResult), 8, '0', STR_PAD_LEFT); 
}

echo ("=====================Enkripsi ONE TIME PAD (OTP)=====================\n");

$inputPlaintext = "RUSDI";
$inputKey = "CRUSH";

echo ("Input Plain Text  : " . $inputPlaintext . "\n");
echo ("Input Key  : " . $inputKey . "\n");

$asciiValuesPlaintext = converstringkeascii($inputPlaintext);
$asciiValuesKey = converstringkeascii($inputKey);

echo ("Nilai desimal dari PlainText : " . implode(" ", $asciiValuesPlaintext) . "\n");
echo ("Nilai desimal dari Key : " . implode(" ", $asciiValuesKey) . "\n");

$binaryPlaintext = convertasciikebinary($asciiValuesPlaintext); 
$binaryKey = convertasciikebinary($asciiValuesKey); 

echo ("Nilai biner dari PlainText : " . implode(" ", $binaryPlaintext) . "\n");
echo ("Nilai biner dari Key : " . implode(" ", $binaryKey) . "\n\n" );

$encryptionBinary = [];
$encryptionDecimal = [];
$encryptionString = "";

for ($i = 0; $i < count($binaryPlaintext); $i++) {

    $xorResult = xorBinaryStrings($binaryPlaintext[$i], $binaryKey[$i % count($binaryKey)]);

    $decimalValue = bindec($xorResult);
    $decimalValue = ($decimalValue < 32) ? $decimalValue + 32 : $decimalValue;
    $encryptionDecimal[] = $decimalValue;
    $encryptionString .= chr($decimalValue);
    $encryptionBinary[] = $xorResult;
}

echo ("=====================Enkripsi=====================\n");
echo ("Hasil EXOR PlainText & Key : " . implode(" ", $encryptionBinary) . "\n");
echo ("Hasil Biner ke Desimal : " . implode(" ", $encryptionDecimal) . "\n");
echo ("Hasil Desimal Ke ASCII : " . $encryptionString . "\n");

$decryptionBinary = [];
$decryptionDecimal = [];
$decryptionString = "";

for ($i = 0; $i < count($encryptionBinary); $i++) {

    $xorResult = xorBinaryStrings($encryptionBinary[$i], $binaryKey[$i % count($binaryKey)]);

    $decimalValue = bindec($xorResult);
    $decimalValue = ($decimalValue < 32) ? $decimalValue + 32 : $decimalValue;
    $decryptionDecimal[] = $decimalValue;
    $decryptionString .= chr($decimalValue);

    $decryptionBinary[] = $xorResult;
}

echo ("=====================Dekripsi=====================\n");
echo ("Hasil EXOR Enkripsi & Key   : " . implode(" ", $decryptionBinary) . "\n");
echo ("Hasil Biner ke Desimal : " . implode(" ", $decryptionDecimal) . "\n");
echo ("Hasil Desimal Ke ASCII : " . $decryptionString . "\n\n");

echo ("=====================Overview=====================\n");
echo ("Input Plain Text  : " . $inputPlaintext . "\n");
echo ("Input Key  : " . $inputKey . "\n");
echo ("Hasil Enkripsi : " . $encryptionString . "\n");
echo ("Hasil Dekripsi : " . $decryptionString . "\n");