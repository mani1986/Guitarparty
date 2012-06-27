<?php

class Guitarparty_request
{
	private $isSuccessful = TRUE;

	static public function makeRequest($endpoint)
	{
		$endpoint = URL.$endpoint;
		$header = array('Guitarparty-Api-Key: '.API_KEY.'');
		$curl = curl_init($endpoint);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$json = curl_exec($curl);
		curl_close($curl);
		return json_decode($json);
	}

}