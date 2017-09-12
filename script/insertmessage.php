<?php

    require 'connection.php';
    if (isset($_POST['ajax'])) {
        session_start();
    if (isset($_POST['message'])) {
        $id = $_SESSION['id'];
        $message = $_POST['message'];
        $dbh->prepare("INSERT INTO message (message_message, user_message) VALUES('$message', '$id')")->execute();
    }
}

 ?>
