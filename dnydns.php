<?php

	// Global Defines
	const USER = '';
	const PASS = '';
	const HOST = '';
	const MAIL = '';

	// Check IP Address
	# Get our current outside IP address
	$get_ip = file_get_contents('https://domains.google.com/checkip');
	# Get the IP address we currently have on file.
	$got_ip = file_get_contents('ipOnFile.txt');

	# If they match, do nothing.
	if ($get_ip == $got_ip)
		return 0;

	// If we get here, then the IP address we have on record is not the same as the one we have on file.
	# Update File
	file_put_contents('ipOnFile.txt', $get_ip);

	# Update Google's DNS Server
	$context = stream_context_create([
		'http' => [
			'method' => 'GET',
			'header' => 'Authorization: Basic ' . base64_encode(USER . ':' . PASS) . "\r\n"
					.	'User-Agent: Chrome/50.0 ' . MAIL
		]
	]);
	echo file_get_contents('https://domains.google.com/nic/update?hostname=' . HOST, FALSE, $context);
	print_r($http_response_header);

?>
