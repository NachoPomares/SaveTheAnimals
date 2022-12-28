<?php 
    ob_start();

    // Inicio de sesion en la BBDD
    if(!isset($_SESSION)) {
        session_start(); }

    $hostname = "localhost";
    $username = "c";
    $password = "436004886ASDasd?";
    $dbname = "save_the_animals";

    $connection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.")
?>
