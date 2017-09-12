$('#message_envoye').on('click', function(){
  var message = $("#message").val();
  console.log(message);
  $.ajax({
    type : "POST",
    url : "script/insertmessage.php",
    data : {message:message, ajax:true},
    success : function(server_response){
      $("#chatbox").html(server_response);
      $('#message').val(' ');
    }
  });
})
setInterval(function(){
  var message = $("#message").val();
  console.log(message);
  $.ajax({
    type : "POST",
    url : "script/viewChatAjax.php",
    data : {message:message},
    success : function(server_response){
      $("#chatbox").html(server_response);
    }
  });
},
0);
$('#btn_edit').on('click', function(){
  var color = $("#color").val();
  var user_name_edit_profile = $('#user_name_edit_profile').val();
  var user_avatar_edit_profile = $('#user_avatar_edit_profile').val();
  $.ajax({
    type : "POST",
    url : "script/affichage_profile.php",
    data : {color:color, user_avatar_edit_profile:user_avatar_edit_profile,user_name_edit_profile:user_name_edit_profile},
    success : function(server_response){
      $("#chatbox").html(server_response);
    }
  });
})
