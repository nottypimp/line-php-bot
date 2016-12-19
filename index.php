<?php
$access_token = '0/o11lFR2+slryRj9F9vohGEDxRooT+mV4FaiVGfxTWAI6AxTa5Sazmz9SaRT5kYRyUqYO4WPckVvMfYEg5TCT9kurDoe7KtFs2IRS7gnCUhPd2z+aYPjgdfdTlknTW2Qfe5NPeHxKF5jraa5G4d8AdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
// 	if($text == 'บอกมา'){//คำอื่นๆ ที่ต้องการให้ Bot ตอบกลับเมื่อโพสคำนี้มา เช่นโพสว่า บอกมา ให้ตอบว่า ความลับนะ
// 			$response_format_text = ['contentType'=>1,"toType"=>1,"text"=>"ความลับนะ"];
// 	}
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
// 			if($text == 'holiday'){
// 			$messages = [
// 				'type' => 'text',
// 				'text' => 'จันทร์-อังคาร   2-3  มกราคม   2560  วันปีใหม่'
// 			}else{
			if($text == "holiday"){
	$holiday= "วันจันทร์ - อังคาร 2-3 มกราคม 2560  วันขึ้นปีใหม่                       วันเสาร์ 11  กุมภาพันธ์  2560  วันมาฆบูชา";
				
					 
			$messages = [
				'type' => 'text',
				'text' => $holiday
			];
			}
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
