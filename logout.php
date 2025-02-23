<?php
    session_start();
    unset($_SESSION['user_user_id']);
    unset($_SESSION['user_name']);
    session_destroy();
    header('Location: /rshs-archive');

?>