<?php

require_once 'connection.php';

if (isset($_SESSION['id'])) {
  include 'viewChatAjax.php';
}
else {
  include 'formLogIn.php';
}
 ?>
