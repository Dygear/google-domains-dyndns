<?php
// Global Defines
const HOSTS = [
	['HOST','MAIL','USER','PASS'],
	['HOST','MAIL','USER','PASS']
];

// Check Our Current IP Address

# Get our current external IP address
$get_ip = file_get_contents('https://domains.google.com/checkip');

# Failed to get IP address, probable network failure.
if ($get_ip === false) {
	return 1;
}

# Get the IP address we currently have on file.
$got_ip = explode(PHP_EOL, file_get_contents(__DIR__ . '/dnydns.log'))[0];

# If they match, do nothing. Google already has the correct IP.
if ($get_ip == $got_ip) {
	return 0;
}

// If we get here, then the IP address we have on record is not the same as the one we have on file.

# Update File
file_put_contents(__DIR__ . '/dnydns.log', $get_ip . PHP_EOL);

# Update Google's DNS Server
foreach (HOSTS as [$HOST, $MAIL, $USER, $PASS]) {
	$context = stream_context_create([
		'http' => [
			'method' => 'GET',
			'header' => "User-Agent: Chrome/50.0 {$MAIL}\r\n"
		]
	]);
	$status = file_get_contents("https://{$USER}:{$PASS}@domains.google.com/nic/update?hostname={$HOST}", FALSE, $context);
	file_put_contents(__DIR__ . '/dnydns.log', "{$HOST} {$status}" . PHP_EOL, FILE_APPEND);
}
