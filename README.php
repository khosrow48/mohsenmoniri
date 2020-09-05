<?php
   $update = file_get_contents("php://input");
            $update_array  = json_decode($update, true); // json
 if(isset($update_array["message"]) ) {
    $text    = $update_array["message"]["text"];
   $chat_id = $update_array["message"]["chat"]["id"];
  }
   //=====================================
$reply ="پیام شما: " .$GLOBALS["text"];
$url = "https://api.telegram.org/bot" . "1336370070:AAEgVXnmd50k16Dyjk6-q7-bSuClhBs4dhU" . "/sendmessage";
$post_params = ['chat_id' => $GLOBALS['chat_id'] , 'text' => $reply];
 send_reply($url, $post_params);
   //=====================================
function send_reply($url, $post_params) {
 $cu = curl_init();
 curl_csetopt($cu, CURLOPT_URL, $url);
 curl_setopt($cu, CURLOPT_POSTFILDS, $post_params);
  curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);  // get result
  $result = curl_exec($cu);
   curl_close($cu);
   return $result;
    }
    //=====================================
    ?>
