Guitarparty.com API PHP client module
====================

Installation
------------

You can use this library as is by initializing the Guitarparty class and including Guitarparty.php in your code


Authentication
------------

You need to obtain your API key from [Guitarparty.com](http://www.guitarparty.com/developers/api-key/), to do so you must be a registered user on the website.

To authenticate your requests you have to insert your api in the first parameter when initializing the Guitarparty class

    require_once('guitarparty.php');
    $apiKey = 'your-guitarparty-apikey';
    $guitarParty = new Guitarparty($apiKey);

Usage
------------

[b]Get Single Song and display the cords, songId = 5[/b]

	$song = $guitarParty->getSong(5);
	echo '<h3>'.$song->title.' - '.$song->authors[0]->name.'</h3>';
	echo '<p>'.$song->body.'</p>';

	echo '<table>';
	echo '<tr>';
	foreach ($song->chords as $chord)
	{
		echo '<td><img src="'.$chord->image_url.'"></td>';
	}
	echo '</tr>';
	echo '</table>';
Outputs: 

	Jolene - Dolly Parton
	...
	
	

Search for Songs, searchString = 'Jolene'

	$songs = $guitarParty->searchSongs('Jolene');
	foreach($songs->objects as $song)
	{
		echo '<h3>'.$song->title.' - '.$song->authors[0]->name.'</h3>';
		echo '<p>'.$song->body.'</p>';

		echo '<table>';
		echo '<tr>';
		foreach ($song->chords as $chord)
		{
			echo '<td><img src="'.$chord->image_url.'"></td>';
		}
		echo '</tr>';
		echo '</table>';
	}
Outputs:

	Outputs: 
	Jolene - Dolly Parton
	...
	Jolene - Ray Lamontagne
	...


More detailed information about the API can be found on the [Guitarparty.com website](http://www.guitarparty.com/developers/api-docs/) 