$("#pseudoRegister").keyup(function(){
    var recherche = $(this).val();
    var key = 'motclé=' + recherche;
      if (recherche.length >= 2) {

        $.ajax({
          type : "GET",
          url : "script/viewPseudoConfirmed.php",
          data : key,
          success : function(server_response){
            $("#alertePseudo").html(server_response).show();
          }
        });
      }
  });
