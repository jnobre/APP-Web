<?php
//function incia_BD(){
    define("HOST", "127.0.0.1"); // The host you want to connect to.
    define("USER", "edp_teste"); // The database username.
    define("PASSWORD", "password"); // The database password. 
    define("DATABASE", "edp_teste"); // The database name.

    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if(mysqli_connect_errno()) {

            printf("Connect failed: %s\n", mysqli_connect_error());
        	exit();	
		}
   $mysqli->query("SET NAMES utf8");

//}

?>