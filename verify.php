<?php
$access_token = '0/o11lFR2+slryRj9F9vohGEDxRooT+mV4FaiVGfxTWAI6AxTa5Sazmz9SaRT5kYRyUqYO4WPckVvMfYEg5TCT9kurDoe7KtFs2IRS7gnCUhPd2z+aYPjgdfdTlknTW2Qfe5NPeHxKF5jraa5G4d8AdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

