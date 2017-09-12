<?php
    require 'script/sessionStart.php';
    require 'script/insert_new_user.php';
    require 'script/insertmessage.php';
    require 'script/updateProfile.php';

    if (isset($_POST['destroy'])) {
        // Détruit toutes les variables de session
        $_SESSION = array();

        // Si vous voulez détruire complètement la session, effacez également
        // le cookie de session.
        // Note : cela détruira la session et pas seulement les données de session !
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        // Finalement, on détruit la session.
        session_destroy();
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Chatapp</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/logIn.css">
<link type="text/css" rel="stylesheet" href="assets/css/style.css" />
</head>

<div id="wrapper" class="wrapper">
    <div id="menu">
        <?php include 'script/affichage_profile.php' ?>
          <?php if (isset($_SESSION['id'])): ?>
            <p class="logout">
              <form class="deconnection" action="" method="post">
                <input class="logout desconnect" type="submit" name="destroy" value="Déconnexion">
              </form>
            </p>
          <?php endif; ?>
    <?php if (!isset($_SESSION['id'])): ?>
        <p class="logout"><a data-toggle="modal" data-target="#modalSenregistrer">S'enregister</a></p>
        <!-- Modal -->
            <div class="modal fade" id="modalSenregistrer" role="dialog">
            <div class="modal-dialog">

                    <?php include 'script/formRegister.php' ?>

            </div>
            </div>
    <?php endif; ?>
        <div style="clear:both"></div>
    </div>

    <div id="chatbox">
      <?php include 'script/viewChat.php' ?>
    </div>
        <input name="message" type="text" id="message" size="63" />
        <input name="message_envoye" type="submit"  id="message_envoye" value="Envoyer"/>
</div>
<div id="all_users" class="wrapper">
  <div class="user_box">
    bonjour je vais afficher tous les utilisateurs :)
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/confirmedPassword.js"></script>
<?php if (isset($_SESSION['id'])): ?>
  <script type="text/javascript" src="assets/js/chat.js"></script>
<?php endif; ?>
<script type="text/javascript" src="assets/js/alertePseudo.js"></script>
</body>
</html>
