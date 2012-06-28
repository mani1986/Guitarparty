<?php
	require_once('guitarparty.php');
	$apiKey = 'a5a569576ca8c3fae22d221aa9b4a09d64d97e25';
	$guitarParty = new Guitarparty($apiKey);
	
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
    echo '<hr>';

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
    echo '<hr>';
	
	$artist = $guitarParty->getArtist(1);
    echo $artist->name;
	echo '<hr>';
	
	$artists = $guitarParty->searchArtists('Dolly Parton');
	foreach($artists->objects as $artist)
	{
		echo $artist->name.'<br/>';
	}
	echo '<hr>';
	// Create Songbook
	$songbook = $guitarParty->createSongbook('Mani', 'Test1');
	echo $songbook;
	echo '<hr>';
	// Get Songbook
	$songbooks = $guitarParty->getSongbooks();
	foreach($songbooks->objects as $songbook)
	{
		echo '<h3>'.$songbook->title.' - '.$songbook->description.'</h3>';
	}
	echo '<hr>';
?>