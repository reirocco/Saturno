$(document).ready(function(){
	$("#btn_apri_regolamento").click(function(){
		$("#show_regolamento_modal").show();
	});
	
	$("#btn_modifica_regolamento").click(function(){
		window.location = "modifica_regolamento/";
	});
	
	/**************cambiamento testi*************/
	
	$("#quiz_name").on("keyup paste", function(){
		$("#edit_nome").removeAttr("disabled");
	});
	
	/**********************/
	
	$("#data_apertura").on("keyup paste change", function(){
		$("#edit_orario").removeAttr("disabled");
	});
	
	$("#orario_inizio").on("keyup paste change", function(){
		$("#edit_orario").removeAttr("disabled");
	});
	
	$("#orario_fine").on("keyup paste change", function(){
		$("#edit_orario").removeAttr("disabled");
	});
	
	/****************/
	
	$("#iscrizioni_aperte").on("change",function(){
		if(this.checked){
			$("#iscrizioni_lbl").text("Iscrizioni aperte");
		}else if(!this.checked){
			$("#iscrizioni_lbl").text("Iscrizioni chiuse");
		}
	});
	
	/********** salva cambiamenti **********/
	$("#edit_nome").click(function(){
		disableBtn("edit_nome");
		
		$.ajax({
			url: './action_editSettings.php',
			type: 'POST',
			data: {type: 'editName', newName: $("#quiz_name").val()},
			success: function(response){
				alert("successo");
				enableBtn("edit_nome");
			}
		});
	});
});



function closeModal(id){
	$("#" + id).hide();
}

function disableBtn(id){
	$('#' + id).attr("disabled","true").html('<span class="spinner-border spinner-border-sm"></span>  Attendere');
}

function enableBtn(id){
	$('#' + id).removeAttr("disabled").html('Salva');
}