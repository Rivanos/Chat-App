<?php session_start();

require 'connection.php';

if (isset($_POST['pseudo']) & isset($_POST['password'])) {

        $pseudo_connected = $_POST['pseudo'];
        $password_connected = $_POST['password'];
        $sql_checkIn = "SELECT * FROM user WHERE name_user = '$pseudo_connected' AND password_user = '$password_connected'";
        $nb_checkIn = $dbh->query($sql_checkIn);
        $_SESSION['id'] = $nb_checkIn->fetch()['id_user'];

        if ($_SESSION['id']) {
                $pseudo_connected = $_POST['pseudo'];
                $password_connected = $_POST['password'];
                $sql_checkIn = "SELECT * FROM user WHERE name_user = '$pseudo_connected' AND password_user = '$password_connected'";
                $nb_checkIn = $dbh->query($sql_checkIn);
                $_SESSION['pseudo'] = $nb_checkIn->fetch()['name_user'];
        }
}
?>
