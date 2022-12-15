$(document).ready(function(){
	$("#addQuestionBtn").click(function(){
		$("#addQuestionModal").show();
	});
	
	$(".viev-img").click(function(){
		$("#internalImg").attr("src",$("#" + $(this).attr("id") + " .image-domanda").attr("src"));
		$("#modalImage").show();
	});
	
	$(".close").click(function(){
		$("#modalImage").hide();
	});
	//apertura edit-modal

	$("#editBtn").click(function(){
		var row = $("#" + selectedId);
		
		var img = $("#img-" + selectedId + " .image-domanda").attr("src");
		var risp1 = row.find(".risp1").text();
		var risp2 = row.find(".risp2").text();
		var risp3 = row.find(".risp3").text();
		var risp4 = row.find(".risp4").text();
		var rispCorretta = row.find(".rispCorretta").text();
		
		$("#old-image").attr("src",img);
		$("#old_r1").val(risp1);
		$("#old_r2").val(risp2);
		$("#old_r3").val(risp3);
		$("#old_r4").val(risp4);
		$("#old_resatta").val(rispCorretta);
		$("#question_id").val(selectedId);
		$("#old_img_src").val(img);
		
		$("#editQuestionModal").show();
	});
	
	$("#deleteBtn").click(function(){
		if(confirm("La domanda selezionata verrà eliminata.")){
			$.ajax({
				url: 'action_deleteQuestion.php',
				type: 'POST',
				data: {id: selectedId},
				success: function(response){
					location.reload();
				}
			});
		}
	});
});

function closeModal(id){
	$("#" + id).hide();
}