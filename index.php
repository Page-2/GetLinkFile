<?php 

ob_start();

$API_KEY = '1246606857:AAHpch56R2GUj_b6RJOYk2UB2MeP3chH9gE';
##------------------------------##
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>$mode
 ]);
 }
 function senddocument($chat_id,$document,$caption){
    bot('senddocument',[
        'chat_id'=>$chat_id,
        'document'=>$document,
        'caption'=>$caption
    ]);
}
 function sendaction($chat_id, $action){
 bot('sendchataction',[
 'chat_id'=>$chat_id,
 'action'=>$action
 ]);
 }

function getFilesize($file)
{
if (is_file($file)) {
$filePath = $file;
if (!realpath($filePath)) {
$filePath = $_SERVER["DOCUMENT_ROOT"] . $filePath;
}
$fileSize = filesize($filePath);
$sizes = array("TB", "GB", "MB", "KB", "B");
$total = count($sizes);
while ($total-- && $fileSize > 1024) {
$fileSize /= 1024;
}
return round($fileSize) . " " . $sizes[$total];
}
return false;
}
 //====================ᵗᶦᵏᵃᵖᵖ======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
//====================ᵗᶦᵏᵃᵖᵖ======================//
if(preg_match('/^\/([Ss]tart)/',$text)){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"به ربات تبدیل فایل به لینک خوش امدید",
            ]);

        }


 elseif(isset($message->video)){
 $video = $message->video;
$file = $video->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
       $siz = $get->result->file_size;
     $LinkD = "https://api.telegram.org/file/bot$API_KEY/$patch";
     $s1 =  getFilesize($LinkD);
      
     
    bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"$s1" ,
                 
                
            ]);
        }
 

?>
