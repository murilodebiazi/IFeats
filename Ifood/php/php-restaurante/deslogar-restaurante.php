<?php
session_start();
session_destroy();
header('Location: ../../html/menu-restaurante.html');
?>