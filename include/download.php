<?php
    require 'function.php';
    require 'connection.php';
    if($_GET['user'] == $_SESSION['logged_user']){
        file_force_download("../".$_GET['file']);
    } else {
        echo ("Нет доступа к файлу");
    }
?>