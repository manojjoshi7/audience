<?php
$dataschedule["interval"]="DAILY";
$dataschedule["url"]="http://app.redretarget.com/sapp/feeds/50a96db470a2e0ebdcd9e1dfaadb0f74ac2637a6.xml";
$dataschedule["hour"]="1";
$dataschedule["minute"]="5";
$schedule= json_encode($dataschedule);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://graph.facebook.com/v2.5/938060679624147/product_feeds");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"name=onetwothree&schedule=".$schedule."&access_token=CAAYMfhpISYABAGaOnvIhJI8nV1FraPDivkpU1r5Fe41JoSzbPUUCw77Czbj2EZAlLZBUOnq2XvlhKRY7KqHKXrsD4lz93JCdUQUAaVQQ84aCbhVIZCgNp35cwhPXwyXSG7CdZALNilrfgny5vZBFveXhiFG9ZA2aQnrlZCdPtSSEaK6alOqJL6fU6mTk1aP4PYZD");
// in real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));
// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec ($ch);
curl_close ($ch);
print_r($server_output);
?>
