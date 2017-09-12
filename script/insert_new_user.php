<?php
	require 'connection.php';

// NOTE: gestion de l'enregistrement d'un nouvel utilisateur
if (isset($_POST['pseudoRegister']) & isset($_POST['passwordRegister'])){
	$users = array();
	$sql_check = "SELECT name_user FROM user";
	$nb_check = $dbh->query($sql_check);
		while($row = $nb_check->fetch()){
			$users[] = $row['name_user'];
		}
	if (isset($_POST['pseudoRegister']) & isset($_POST['passwordRegister'])) {

	$pseudo = $_POST['pseudoRegister'];
	$code_user = $_POST['passwordRegister'];

		if (!in_array($pseudo, $users)) {
			if (isset($_POST['passwordConfirmed'])& $_POST['passwordRegister'] === $_POST['passwordConfirmed']) {
				// NOTE: code Pour l'upload du fichier dans les fichiers sources.
				if (isset($_FILES['avatar_userRegister'])) {
					if(!empty($_FILES['avatar_userRegister']) && !empty($_POST)) {
						if($_FILES['avatar_userRegister']['error'] == 0 && is_uploaded_file($_FILES['avatar_userRegister']['tmp_name'])) {
							$code_user = $_POST['passwordRegister']; // code de l'utilisateur enregistré dans le formulaire.
							$file_name = $_FILES['avatar_userRegister']['name']; //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.pdf).
							$type_fichier = $_FILES['avatar_userRegister']['type']; //Le type du fichier. Par exemple, cela peut être « image/png ».
							$size = $_FILES['avatar_userRegister']['size'] ; //La taille du fichier en octets.
							$extension = strtolower(substr(strrchr($_FILES['avatar_userRegister']['name'], '.'), 1));
								if(move_uploaded_file($_FILES['avatar_userRegister']['tmp_name'], "assets/images/$code_user.$extension")) {
									$path = "assets/images/$code_user.$extension";
									echo 'Vous Avez bien été enregistré, veuillez vous connecter à présent.';
									$dbh->prepare("INSERT INTO user (name_user, password_user, path_avatar_user) VALUES('$pseudo', '$code_user', '$path')")->execute();
								}
								else {
									$dbh->prepare("INSERT INTO user (name_user, password_user) VALUES('$pseudo', '$code_user')")->execute();
								}
							}
							else {
								exit('Fichier non uploadé');
						}
					}
				}
			}
		}
		else {
		echo "<div class='alerteFailure'>
		Ce pseudonyme est déjà pris veuillez en choisir un autre.
		</div>";
		}
	}
}
?>
