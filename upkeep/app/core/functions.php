<?php

/** check which php extensions are required **/
check_extensions();
function check_extensions(){
    $required_extensions = [ 'mysqli', 'mbstring', 'curl', 'json', 'xml',  'openssl', 'bcmath', 'exif', 'fileinfo'];
    $not_loaded = [];

	foreach ($required_extensions as $ext) {
		
		if(!extension_loaded($ext))
		{
			$not_loaded[] = $ext;
		}
	}

	if(!empty($not_loaded))
	{
		show("Please load the following extensions in your php.ini file: <br>".implode("<br>", $not_loaded));
		die;
	}
}


function show($stuff){
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";

}

function esc($str){
    return htmlspecialchars($str);
}

function redirect($path){
    header("Location: " .ROOT."/".$path);
    die;
}



/** load image. if not exist, load placeholder image**/
function get_image(mixed $file = '',string $type = 'post'):string
{

	$file = $file ?? '';
	if(file_exists($file))
	{
		return ROOT . "/". $file;
	}

	if($type == 'user'){
		return ROOT."/assets/images/user.png";
	}else{
		return ROOT."/assets/images/noimage.jpg";
	}

}

//function sendSMS($phone_number, $message, $message_type="ARN"){
//
//    curl -X POST https://rest-api.telesign.com/v1/messaging\
//  -d phone_number=$phone_number\
//  -d message=$message\
//  -d message_type="ARN"\
//  -u '7EBDE7B2-57E7-4623-9FE0-CC7085F21644':'*********************************'
//}
