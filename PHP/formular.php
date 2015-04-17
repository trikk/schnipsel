<?php
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
