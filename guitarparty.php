<?php
// GuitarParty.com Client Library 
// Author: Mani Gudvardarson 
// Version: 0.1 
// Date: 27.6.2012


/* Config */

$api_key = 'a5a569576ca8c3fae22d221aa9b4a09d64d97e25';
//$url = 'http://api.guitarparty.com/v2/songbooks/';
$url = 'http://www.mbl.is';
/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "API_KEY=$api_key");

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close($ch);

// further processing ....
echo $server_output;
*/

//$header = array('Content-Type: application/json', 'Guitarparty-Api-Key=a5a569576ca8c3fae22d221aa9b4a09d64d97e25');
//$header = '';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
//curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
$xml = curl_exec($curl);
curl_close($curl);

print $xml;
?>
