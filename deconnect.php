<?php
session_start();

if(isset($_SESSION['connected'])) {

    session_unset(); // On détruit toutes les variables stockés dans session
    session_destroy(); // Détruit les cookies de la session (miam)
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
    
}