<?php

$titulo = $_GET['titulo'];
$mensaje = $_GET['mensaje'];

 ////////ENVÍO DE NOTIFICACIÓN/////////
$fcmUrl = 'https://fcm.googleapis.com/fcm/send';
$token = 'aplicacion';
$apiKey = 'AAAAIwQQSaU:APA91bFfuN-bsTyGDdi5BQCS9UaT4eCWXvE0R2VbM7pC-tApRhqxuqu8Dj2DJD8Msp1X6LlMqRaG0ya9IOBIXYjs6ohyEajJrHUl0741mLQSsr27tcZjz3jARZB3GwtdyYw6xcbSF4mc';
$notification = ['title' => $titulo, 'body' => $mensaje, 'icon' => 'myIcon', 'sound' => 'mySound'];
$extraNotificationData = ["message" => $notification, "moredata" => 'dd'];
$fcmNotification = [
        
'to' => '/topics/' . $token,
'notification' => $notification, 'data' => $extraNotificationData];
$headers = ['Authorization: key=' . $apiKey, 'Content-Type: application/json'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $fcmUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
$result = curl_exec($ch);
curl_close($ch);
echo $result;





 