<?php
// GuitarParty.com Client Library 
// Author: Mani Gudvardarson 
// Version: 0.1 
// Date: 27.6.2012

class Guitarparty
{
	private $apiKey;
	private $apiUri = 'http://api.guitarparty.com/';
	private $apiEndpoint = 'v2/';
	
	
	private function makeRequest($endpoint, $type = 1, $data = null)
	{
		$endpoint = $this->apiUri.$this->apiEndpoint.$endpoint;
		$header = array('Content-Type: application/json',                                                                                
						'Content-Length: ' . strlen($data),
						'Guitarparty-Api-Key: '.API_KEY.'');
		$curl = curl_init($endpoint);
		if ($type == 2)
		{
			echo $data;
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);  
		}
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		
		$json = curl_exec($curl);
		curl_close($curl);
		echo '<pre>';
		print_r(json_decode($json));
		echo '</pre>';
		return json_decode($json);
	}
	
	public function __construct($apiKey)
	{
		$this->apiKey = $apiKey;
		define('API_KEY', $apiKey);
		define('URL', $this->apiUri.$this->apiEndpoint);
	}
		
	public function getSong($songId)
	{
		$song = $this->makeRequest('songs/'.$songId.'/');
		return $song;
	}
	
	public function searchSongs($searchString)
	{
		$searchString = urlencode($searchString);
		$songs = $this->makeRequest('songs/?query='.$searchString);
		return $songs;
	}
	
	public function getArtist($artistId)
	{
		$artist = $this->makeRequest('artists/'.$artistId.'/');
		return $artist;
	}
	
	public function searchArtists($searchString)
	{
		$searchString = urlencode($searchString);
		$songs = $this->makeRequest('artists/?query='.$searchString);
		return $songs;
	}
	
	public function getSongbooks()
	{
		$songbooks = $this->makeRequest('songbooks/');
		$i = 0;
		foreach($songbooks->objects as $songbook)
		{
			$i++;
			$id = explode("/", $songbook->uri);
			$songbooks[i][id] = $id[2];
		}
		return $songbooks;
	}
	
	public function createSongbook($title, $description = null, $isPublic = False)
	{
		$data = array('title' => $title, 'description' => $description, 'is_public' => $isPublic);
		$songbook = $this->makeRequest('songbooks', 2, json_encode($data));
		return $songbook;
	}
};





function requireDependencies() {
	if (version_compare(PHP_VERSION, '5.2.1', '<'))
	{
		throw new exception('PHP version >= 5.2.1 required');
	}
    if (!extension_loaded('curl'))
	{
		throw new exception('The Guitarparty library requires the curl extension.');
    }

}

requireDependencies();


?>
