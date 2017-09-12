<?php

require 'connection.php';

                  // NOTE: select requete sql pour voir si ca fonctionne :)
                    $sql = "SELECT * FROM message, user WHERE message.user_message = user.id_user ORDER BY date_message ASC";
                    $nb = $dbh->query($sql);
                      while($row = $nb->fetch()){
                          $message = $row['message_message'];
                          // NOTE: implantation des emoticones :)
                          $message_with_emojis = str_replace(":(", "<img src='assets/images/Emojis/emojis/emo_angry.png' />",$message);
                          $message_with_emojis = str_replace(":/", "<img src='assets/images/Emojis/emojis/emo_sad.png' />",$message_with_emojis);
                          $message_with_emojis = str_replace(";)", "<img src='assets/images/Emojis/emojis/emo_wink.png' />",$message_with_emojis);
                          $message_with_emojis = str_replace(";(", "<img src='assets/images/Emojis/emojis/emo_cry.png' />",$message_with_emojis);
                          $message_with_emojis = str_replace(":}", "<img src='assets/images/Emojis/emojis/emo_cat.png' />",$message_with_emojis);
                          $message_with_emojis = str_replace(":|", "<img src='assets/images/Emojis/emojis/emo_noreaction.png' />",$message_with_emojis);
                          $message_with_emojis = str_replace(":)", "<img src='assets/images/Emojis/emojis/emo_smile.png' />",$message_with_emojis);
                          echo '
                          <div class="box-message">
                            <p class="flotte"><img class="avatar" src="'.$row['path_avatar_user'].'" /></p>
                            <p class="message text-'.$row['color_user'].'">'.$row['name_user'].' : '.$message_with_emojis.'</p>
                          </div>';
                      }
?>
