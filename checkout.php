<?php
require'./includes/db.php';
session_start(); 
session_unset(); 
session_destroy(); 

// Redirection vers la page de connexion
header('Location: login.php');
exit;
?>