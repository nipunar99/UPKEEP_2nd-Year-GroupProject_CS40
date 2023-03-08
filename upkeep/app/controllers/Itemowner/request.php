<?php
 $arr = [];
 $arr["name"] = "kavindu";
print_r($arr);

$grandparent_dir = dirname(dirname(dirname(__DIR__)));
require $grandparent_dir. '/vendor/autoload.php';
use Orhanerday\OpenAi\OpenAi;

// Set up the API client
$open_ai = new OpenAi('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');

$prompt = $_GET['prompt'];

// Generate text based on user input
$length = 1000;
$temperature = 0.7;


//set api data 
$complete = $open_ai->completion([
    'model' => 'text-davinci-003',
    'prompt' =>$prompt,
    'max_tokens' => $length,
    'temperature' => $temperature,
    'top_p' => 1,
    'frequency_penalty' => 0,
    'presence_penalty' => 0,
    'stream' => true
], function ($curl_info, $data){
    // get stream data
    echo $data;
    echo PHP_EOL;
    ob_flush();
    flush();
    return strlen($data);

});

?>
