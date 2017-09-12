<?php
  require 'connection.php';

  $sql = "SELECT * FROM user WHERE id_user = '$pseudo_connected'";
  $nb = $dbh->query($sql);
  while($row = $nb->fetch()){
    echo '<p class="menu_all_users"><a id="profile" data-toggle="modal" data-target="#modalPorfile"><img class="avatar" src="'.$row['path_avatar_user'].'" /></a></p>
          <p class="menu_all_users text-'.$row['color_user'].'">'.$row['name_user'].'</p>';
  }

 ?>
