<?php

function in($i){
    global $session;

    if ($i===0) {
        if ($session->get_logged_in()) {
            header("location:index.php");
        }
    }

    if ($i===1) {
        if (!$session->get_logged_in()) {
            header("location:login.php");
        }
    }

    if ($i === 2 ) {
        if(($session->get_logged_in() || !$session->get_logged_in()) && $session->rule !=2){
            header("location:index.php");
        }
    }
   
}

if (isset($_GET['logout'])) {
    $session->logout();
    header("location:login.php");
}





?>