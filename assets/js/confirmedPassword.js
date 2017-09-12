function checkpass()
{
var val1 = document.getElementById("passwordRegister");
var val2 = document.getElementById("passwordConfirmed");

  if(val1.value != val2.value)
  {
    $('#alerte').html("Veuillez insérer deux mot de passe identique");
    $('#alerte').addClass('alerteFailureLogIn');
    $('#alerte').removeClass('alerteNonFailureLogIn');
  }
  else
  {
    $('#alerte').html("Mot de passe valide !");
    $('#alerte').addClass('alerteNonFailureLogIn');
    $('#alerte').removeClass('alerteFailureLogIn');
  }
}
