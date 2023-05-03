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

//count due days from today
function dueDays($date){
    $today = date("Y-m-d");
    if($date < $today){
        return 0;
    }
    $diff = date_diff(date_create($today), date_create($date));
    return $diff->format("%a");
}

//date quote
function dateQuote($compareDate){
    $diff = floor(  ((strtotime('today')) - (strtotime($compareDate))) / (60 * 60 * 24));
    if ($diff == 0) {
        echo "Today";
    } else if ($diff == 1) {
        echo "Yesterday";
    } else {
        echo $diff . " days ago ";
    }
}


function generate_time_ago_string($datetime) {
    $timestamp = strtotime($datetime);
    $current_time = time();
    $time_diff = $current_time - $timestamp;

    $minute = 60;
    $hour = $minute * 60;
    $day = $hour * 24;
    $week = $day * 7;
    $month = $day * 30;

    if ($time_diff < $minute) {
        $time_ago = "just now";
    } elseif ($time_diff < $hour) {
        $minutes_ago = floor($time_diff / $minute);
        $time_ago = $minutes_ago . " minute" . ($minutes_ago > 1 ? "s" : "") . " ago";
    } elseif ($time_diff < $day) {
        $hours_ago = floor($time_diff / $hour);
        $time_ago = $hours_ago . " hour" . ($hours_ago > 1 ? "s" : "") . " ago";
    } elseif ($time_diff < $week) {
        $days_ago = floor($time_diff / $day);
        $time_ago = $days_ago . " day" . ($days_ago > 1 ? "s" : "") . " ago";
    } elseif ($time_diff < $month) {
        $weeks_ago = floor($time_diff / $week);
        $time_ago = $weeks_ago . " week" . ($weeks_ago > 1 ? "s" : "") . " ago";
    } else {
        $months_ago = floor($time_diff / $month);
        $time_ago = $months_ago . " month" . ($months_ago > 1 ? "s" : "") . " ago";
    }

    return $time_ago;
}


