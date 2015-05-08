Formularaufbau
<?php
if isset action && action==xyz
	$error = array();
	if ( email != true ) { $error[] = 'Email falsch'; }
	if ( name != true ) { $error[] = 'Name falsch'; }
	if ( text != true ) { $error[] = 'Text falsch'; }
	if count($error) == 0
		...mail / db eintrag...
		header location
		exit;

/** /
form method=post/get action=ziel
input hidden name=action value=xyz
input submit
/**/


// kurzschreibweise

$_GET['inhalt'] = isset($_GET['inhalt']) ? $_GET['inhalt'] : '';

if( isset($_GET['action']) && $_GET['action'] == 'event' ){
	header('Location: form.php?success=1');
}
if( isset($_GET['success']) && $_GET['success'] == 1 ){
	echo 'Das Formular wurde verschickt.';
}
?>

<form method="get" action="form.php">
	<input type="hidden" name="action" value="event" />
	<input type="text" name="inhalt" value="<?=$_GET['inhalt']?>" />
	<input type="submit" value="Senden" />
</form>
