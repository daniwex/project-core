<?php
    session_start();
    if(!$_SESSION['auth']){
        header('location:../index.php');
    }

?>