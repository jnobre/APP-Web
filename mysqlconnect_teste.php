<?php

//function incia_BD(){
    define("HOST", "127.0.0.1"); // The host you want to connect to.
    define("USER", "edp_teste"); // The database username.
    define("PASSWORD", "password"); // The database password. 
    define("DATABASE", "edp_teste"); // The database name.
    
   mysql_connect(HOST, USER , PASSWORD) or die(mysql_error());

   mysql_select_db(DATABASE) or die(mysql_error());
   mysql_query("SET NAMES utf8") or die(mysql_error());
//}

?>