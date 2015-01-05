<?php
error_reporting(E_ERROR);
function login_status(){
    if($_SESSION['logado']==1)
    {
           return 1;     
    }
    else
    {
           return -1;
    }    
}


?>