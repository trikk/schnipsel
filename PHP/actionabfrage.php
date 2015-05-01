<?php

// 1. Weg
// variable wird zuerst geprüft, ob sie existiert.
if ( isset($_POST['action']) && $_POST['action'] == 'asdf' ) {
	
}


// 2. Weg
// variable wird gesetzt falls sie nicht existiert
if ( !isset($_POST['action']) ) {
	$_POST['action'] = '';
}
if ( $_POST['action'] == 'aufgabe1' ) {
	
}
// elseif überspringt
elseif ( $_POST['action'] == 'aufgabe2' ) {
	
}
//alternative schnelle schreibweise
$_POST['action'] =  ( isset($_POST['action']) ) ? $_POST['action'] : '';

?>
