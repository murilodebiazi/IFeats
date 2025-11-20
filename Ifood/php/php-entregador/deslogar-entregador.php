<?php
session_start();
session_destroy();
header('Location: ../../html/menu-entregador.html');
?>