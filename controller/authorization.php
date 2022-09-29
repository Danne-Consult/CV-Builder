<?php
$ch = curl_init('https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Basic ' . base64_encode('kZiJcAulhfAsGTMb2mQWARFehXjA5SbO:EA3569vgCjZsyiWw')
]);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
echo json_decode($response);