<div class="backBlockLogIn col-md-11">
		<!--head form-->
		<section>
				<h3 class="logIn">Login</h3>
		</section>
		<!--end head form-->
		<!--body form-->
		<section class="col-md-12">
		<form class="form-horizontal" method="post" enctype="multipart/form-data">
		  <div class="form-group barra">
		    <label for="pseudoRegister" class="col-sm-4 control-label">Pseudonyme</label>
		    <div class="col-sm-8">
					<div id="alertePseudo">
						<?php include 'viewPseudoConfirmed.php' ?>
					</div>
		      <input type="text" class="form-control" id="pseudoRegister" placeholder="Pseudonyme" name="pseudoRegister" required>
		    </div>
		  </div>
		  <div class="form-group barra">
		    <label for="passwordRegister" class="col-sm-4 control-label">Mot de passe</label></label>
		    <div class="col-sm-8">
		      <input type="password" class="form-control" id="passwordRegister" name="passwordRegister" placeholder="Mot de passe" required>
		    </div>
		  </div>
			<div class="form-group barra">
		    <label for="passwordConfirmed" class="col-sm-4 control-label">Confirmer votre mot de passe</label>
		    <div class="col-sm-8">
					<div id="alerte"></div>
		      <input type="password" class="form-control" id="passwordConfirmed" name="passwordConfirmed" placeholder="Mot de passe" required onkeyup="checkpass();">
		    </div>
		  </div>
			<div class="form-group barra">
		    <label for="avatar_userRegister" class="col-sm-4 control-label">Choissisez votre avatar</label>
		    <div class="col-sm-8">
		      <input type="file" class="form-control" id="avatar_userRegister" name="avatar_userRegister" placeholder="Avatar" required>
		    </div>
		  </div>
			<div class="form-group barra">
		    <label for="passwordRegister" class="col-sm-4 control-label">Choissisez votre couleur</label></label>
		    <div class="col-sm-8">
					<select id="color" name="color">
							<option value="red">Red</option>
							<option value="blue">Blue</option>
							<option value="yellow">Yellow</option>
							<option value="green">Green</option>
							<option value="orange">Orange</option>
							<option value="purple">Purple</option>
					</select>
		    </div>
		  </div>
		  <div class="form-group barra">
		    <div class="col-md-12">
		      <button type="submit" class="btn center-block">Se connecter</button>
		    </div>
		  </div>
		</form>
		</section>
		<!--end body form-->
</div>
