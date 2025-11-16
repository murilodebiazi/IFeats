<?php
session_start();
session_destroy();
  header('location: form-logar-admin.php');
?>