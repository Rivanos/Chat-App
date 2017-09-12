<?php

require 'connection.php';

// NOTE: confirmation du pseudonyme (pas de doublon dans la DB).
if (isset($_GET['motclé'])) {
    $pseudo = $_GET['motclé'];
    $users = array();
    $sql_check = "SELECT name_user FROM user";
    $nb_check = $dbh->query($sql_check);
      while($row = $nb_check->fetch()){
        $users[] = $row['name_user'];
      }
        if (!in_array($pseudo, $users)) {
          echo "<p class='alerteNonFailureLogIn'>Ce pseudonyme est valide.</p>";
        }
        else {
          echo "<p class='alerteFailureLogIn'>Ce pseudonyme est déjà utilisé.</p>";
        }
}

 ?>
