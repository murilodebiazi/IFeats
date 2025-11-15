<?php
error_reporting(E_ALL);

if (!isset($_SESSION['emailRestaurante']) || $_SESSION['emailRestaurante'] == null) {
	header("Location: ../../html/menu-principal.html");
	exit;
}
?>