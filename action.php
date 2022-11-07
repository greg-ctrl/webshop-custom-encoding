<?php 

function encode(string $text) {
    $encodedText = base64_encode($text);
    echo $encodedText;
    echo "\n";
    $cipherText = encipher($encodedText, 3);
    return $cipherText;
}


function decode(string $text) {
    $decodedText = base64_decode($text);
    $plainText = decipher($cipherText, 3);
    return $plainText;
}


function cipher($ch, $key) {
	if (!ctype_alpha($ch))
		return $ch;

	$offset = ord(ctype_upper($ch) ? 'A' : 'a');
	return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}

function encipher($input, $key) {
	$output = "";

	$inputArr = str_split($input);
	foreach ($inputArr as $ch)
		$output .= cipher($ch, $key);

	return $output;
}

function decipher($input, $key) {
	return encipher($input, 26 - $key);
}
