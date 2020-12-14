$(document).ready(function(e) {
	$(".userdetails-1").click(function(){
		var mail=$(this).attr('det');
		$.ajax({
			type:"POST",
			url: "../checking/userdet.php",
			data: {mail:mail},
			success: function(data){
			$("#userdetails").html(data);	
			}
		});	
	});
});
