
<?php ini_set('error_reporting', 'E_ALL');
$botToken = "1246606857:AAHpch56R2GUj_b6RJOYk2UB2MeP3chH9gE"; 
$webSite = "https://api.telegram.org/bot" . $botToken;
$update = file_get_contents("php://input"); 
$update = json_decode($update, TRUE); 
$chatId = $update["message"]["chat"]["id"]; $message = $update["message"]["text"]; 
switch ($message) { case "/start": sendMessage($chatId, "شروع می کنیم");
break;
case "salam": sendMessage($chatId, "salam be ruye mahet");
break;
default: sendMessage($chatId, "chi migi ??");
}
function sendMessage($chatId, $message) 
{ $url = $GLOBALS['webSite'] . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($message);
file_get_contents($url); 
} ?>
