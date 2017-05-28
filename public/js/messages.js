$(document).ready(function(){

	
		var form = document.getElementById("form");
		form.addEventListener('submit', sendMessage); 

		$(document).on("click", ".clickedMessage", gotoConvo)
		
	
});

function sendMessage(event) {
	event.preventDefault();
	
	var data = $("#"+this.id).serialize();
	
	$.ajax({
		url: 'messages',
		type: 'post',
		data: data,
		success: function(data) {
			alert("Success");
			window.location.reload();
		}
	});

	

}

function gotoConvo(event)	{
	var data = $(this).attr("id");
	window.location.href = '/messages/'+data;
}