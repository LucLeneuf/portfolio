<?php
session_start();

if ($_SESSION['username']) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {

    }else{
        echo 'url non valide';
    }
}else{
    echo 'vous n\'êtes pas identifié';
}
