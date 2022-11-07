<?php 

function encode(string $text) {
    $text = base64_encode($text);
    $text = encipher($text, 3);
    return $text;
}

function decode(string $text) {
    $text = decipher($text, 3);
    $text = base64_decode($text);
    return $text;
}

function cipher($ch, $key) {
	if (!ctype_alpha($ch)) {
		return $ch;
	}

	$offset = ord(ctype_upper($ch) ? 'A' : 'a');
	return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}

function encipher($input, $key) {
	$output = "";

	$inputArr = str_split($input);
	foreach ($inputArr as $ch) {
		$output .= cipher($ch, $key);
	}

	return $output;
}

function decipher($input, $key) {
	return encipher($input, 26 - $key);
}
