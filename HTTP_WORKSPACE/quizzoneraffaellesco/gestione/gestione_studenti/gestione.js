$(document).ready(function(){
	$(".form-check-inline").change(function(){
		var selected_value = $("input[name='search-radio']:checked").val();
		if(selected_value == "search-username"){
			searchIn = 0;
			$("#search-box").attr("placeholder","Ricerca username...");
		}else if(selected_value == "search-email"){
			searchIn = 2;
			$("#search-box").attr("placeholder","Ricerca email...");
		}else if(selected_value == "search-nomescuola"){
			searchIn = 3;
			$("#search-box").attr("placeholder","Ricerca nome scuola...");
		}else{
			searchIn = 4;
			$("#search-box").attr("placeholder","Ricerca indirizzo scuola...");
		}
	});
	
	$("#addUserBtn").click(function(){
		$("#addStudentModal").show();
	});
	
	$("#closeAddModalBtn").click(function(){
		$("#addStudentModal").hide();
	});
	
	$("#editBtn").click(function(){
		var row = $("#" + selectedId);
		
		var username = row.find(".td-username").text();
		var password = row.find(".td-password").text();
		var email = row.find(".td-email").text();
		var nomescuola = row.find(".td-nomescuola").text();
		var indirizzo = row.find(".td-indirizzo").text();
		
		$("#new-username").val(username);
		$("#new-password").val(password);
		$("#old-email").val(email);
		$("#new-email").val(email);
		$("#new-nomeScuola").val(nomescuola);
		$("#new-indirizzo").val(indirizzo);
		
		$("#editStudentModal").show();
	});
	
	$("#closeEditModalBtn").click(function(){
		$("#editStudentModal").hide();
	});
	
	$("#deleteBtn").click(function(){
		if(confirm("Lo studente selezionato verrà eliminato.")){
			var row = $("#" + selectedId);
			var email = row.find(".td-email").text();
			
			$.ajax({
				url: 'action_removeStudent.php',
				type: 'POST',
				data: {usr_email:email},
				success: function(response){
					location.reload();
				}
			});
		}
	});
});

function generaPassword(){
	//viene generata una password random di 8 caratteri (5 lettere + 3 num)
	var randomstring = Math.random().toString(36).slice(-8);
	$("#addStudentModal #password").val(randomstring);
	$("#addStudentModal #password").attr("type","text");
}

function generaPasswordModificata(){
	//viene generata una password random di 8 caratteri (5 lettere + 3 num)
	var randomstring = Math.random().toString(36).slice(-8);
	$("#editStudentModal #new-password").val(randomstring);
	$("#editStudentModal #new-password").attr("type","text");
}