
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
     
elseif(isset($message->photo)){

   bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"https://storage.pwrtelegram.xyz/$patch\n حجم فایلتون :$sizemb",
            ]);
        }
 elseif(isset($message->sticker)){
     
    bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"https://storage.pwrtelegram.xyz/$patch\n حجم فایلتون :$sizemb",
            ]);
        }
 elseif(isset($message->voice)){
     
    bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"https://storage.pwrtelegram.xyz/$patch\n حجم فایلتون :$sizemb",
            ]);
        }
 elseif(isset($message->audio)){
      
    bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"https://storage.pwrtelegram.xyz/$patch\n حجم فایلتون :$sizemb",
            ]);
        }
 elseif(isset($message->video)){
 
      $type1 = $message->video;
      
      $file = $type1[count($type1)-1]->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      $siz = $get->result->file_size;
      $sizemb = round($siz /1024/1024,1);
    bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"https://storage.pwrtelegram.xyz/$patch\n حجم فایلتون :$sizemb",
            ]);
        }
 elseif(isset($message->document)){
     
    bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"https://storage.pwrtelegram.xyz/$patch\n حجم فایلتون :$sizemb",
            ]);
        }
?>
