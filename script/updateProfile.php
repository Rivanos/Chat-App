<?php
require 'connection.php';

if (isset($_SESSION['id'])) {
$id = $_SESSION['id'];
}
if (isset($_SESSION['path'])) {
$path_now = $_SESSION['path'];
}
if (isset($_SESSION['pseudo'])) {
$pseudo_connected = $_SESSION['pseudo'];
}
if (isset($_POST['user_name_edit_profile'])) {
  $users = array();
  $sql_check = "SELECT name_user FROM user";
  $nb_check = $dbh->query($sql_check);
  while($row = $nb_check->fetch()){
    $users[] = $row['name_user'];
  }
  $user_change = $_POST['user_name_edit_profile'];
  if (!in_array($user_change, $users)) {
    $req= $dbh->prepare('UPDATE user SET name_user= "'.$user_change.'" WHERE id_user = "'.$id.'"')->execute();
  }
}
if (isset($_POST['user_pwd_old_edit_profile']) & isset($_POST['user_pwd_edit_profile'])) {
  $sql_check = "SELECT password_user FROM user";
  $nb_check = $dbh->query($sql_check);
  while($row = $nb_check->fetch()){
    $pwdBDD = $row['password_user'];
  }
  if ($_POST['user_pwd_old_edit_profile'] == $pwdBDD) {
  $password_change = $_POST['user_pwd_edit_profile'];
  $dbh->prepare('UPDATE user SET password_user= "'.$password_change.'" WHERE id_user = "'.$id.'"')->execute();
  }
}
if (isset($_POST['color'])) {
  $color_change = $_POST['color'];
  $dbh->prepare('UPDATE user SET color_user= "'.$color_change.'" WHERE id_user = "'.$id.'"')->execute();
}
?>
