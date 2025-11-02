<?php
error_reporting(E_ALL);

if (!isset($_SESSION['emailEntregador']) || $_SESSION['emailEntregador'] == null) {
	header("Location: ../Menu Principal/MenuPrincipal.html");
	exit;
}

?>

