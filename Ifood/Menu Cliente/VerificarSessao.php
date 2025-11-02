<?php
error_reporting(E_ALL);

if (!isset($_SESSION['emailCliente']) || $_SESSION['emailCliente'] == null) {
	header("Location: ../Menu Principal/MenuPrincipal.html");
	exit;
}

?>

