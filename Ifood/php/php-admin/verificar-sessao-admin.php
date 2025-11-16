<?php
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 'ok') {
	$msg = urlencode('Voce não tem permissao!');
	header("location: ./form-logar-admin.php?retorno=$msg");
	exit;
}
?>

