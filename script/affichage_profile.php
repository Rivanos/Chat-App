<?php

require 'connection.php';

// NOTE: Affichage du profile.
if (isset($_SESSION['id'])) {
    $pseudo_connected = $_SESSION['id'];
    $sql_checkIn = "SELECT * FROM user WHERE id_user = '$pseudo_connected'";
    $nb_checkIn = $dbh->query($sql_checkIn);
    if ($nb_checkIn->rowcount() == 1) {
        // NOTE: select requete sql pour voir si ca fonctionne :)
        $sql = "SELECT * FROM user WHERE id_user = '$pseudo_connected'";
        $nb = $dbh->query($sql);
        while($row = $nb->fetch()){ ?>
            <p class="menu_interact"><a id="profile" data-toggle="modal" data-target="#modalPorfile"><img class="avatar" src="<?= $row['path_avatar_user'] ?>" /></a></p>
            <p class="menu_interact text-<?= $row['color_user'] ?>"><?= $row['name_user']?></p>

            <div id="modalPorfile" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <form method="post" action"">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><img class="avatar" src="<?= $row['path_avatar_user'] ?>" />Editer votre profile</h4>
                            </div>
                            <div class="modal-body">
                                <h4>Changer votre avatar</h4>
                                <label for="file">Choose a file</label>
                                <input type="file" name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" />
                                 <h4>Changer votre Pseudonyme</h4>
                                <input id="user_name_edit_profile" type="text" name="user_name_edit_profile" required />
                                <hr />
                                <h4>Changer votre Mot de passe</h4>
                                <input id="user_pwd_old_edit_profile" type="text" name="user_pwd_old_edit_profile" required placeholder="Ancien mot de passe" />
                                <input id="user_pwd_edit_profile" type="text" name="user_pwd_edit_profile" required placeholder="Nouveau mot de passe" />
                                <hr />
                                <h4>Changer la couleur de votre pseudo</h4>
                                <select id="color" name="color">
                                    <option value="red">Red</option>
                                    <option value="blue">Blue</option>
                                    <option value="yellow">Yellow</option>
                                    <option value="green">Green</option>
                                    <option value="orange">Orange</option>
                                    <option value="purple">Purple</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button id="btn_edit" type="submit" class="btn btn-default">Appliquer les changements</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php    }
        }
    }
    ?>
