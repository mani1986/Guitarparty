<?php
// GuitarParty.com Client Library 
// Author: Mani Gudvardarson 
// Version: 0.1 
// Date: 27.6.2012

require_once('lib/request.php');
require_once('lib/songs.php');
require_once('lib/songbooks.php');
require_once('lib/artists.php');

class Guitarparty
{
	private $apiKey;
	private $apiUri = 'http://api.guitarparty.com/';
	private $apiEndpoint = 'v2/';
	
	
	public function makeRequest($endpoint)
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
		$songs = $this->makeRequest('songs/?query='.$searchString);
		return $songs;
	}
	
	public function getArtist($artistId)
	{
		$artist = $this->makeRequest('artists/'.$artistId.'/');
		return $artist;
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
