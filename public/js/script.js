$(document).ready(function(){
	$(document).on("click", ".follow-user", followUser);
	$(document).on("click", ".unfollow-user", unfollowUser);
	$(document).on("click",".delete-post",deletePost);
	$(document).on("click",".like",likePost);
	$(document).on("click",".unlike", unlikePost);
	$(document).on("input", "#age_slider", displayRange);
	$(document).on("input", "#distance_slider", displayRange);


});

function displayRange(){
	age = document.getElementById("age_slider").value;
	document.getElementById("age").innerHTML=" - " + age;
	if(age=='16'){
		document.getElementById("age").innerHTML="";
	}
	distance = document.getElementById("distance_slider").value;
	document.getElementById("distance").innerHTML=distance;
}

function likePost(){
	var post_id = $(this).attr("data-pg");
	document.getElementById('like-' + post_id).innerHTML="Unlike";
	document.getElementById('like-' + post_id).className ="unlike pull-left";
	$.ajax({
		url: "/post/like/"+post_id,
		type: "get",
		success:function(data){
			console.log(data);
			var like_count = data.length;

			$("#likes-"+post_id).html(like_count+" likes");

			var likers = "";
			$.each(data, function(key, value){
				likers += "<div><a href='/profile/"+value['username']+"/about'>"+value['username']+"</a></div>";
			});
			$("#likersModal-"+post_id+" .modal-body").html(likers);		
		}
	});
}

function unlikePost(){
	var post_id = $(this).attr("data-pg");
	document.getElementById('like-' + post_id).innerHTML="Like";
	document.getElementById('like-' + post_id).className ="like pull-left";
	$.ajax({
		url: "/post/unlike/"+post_id,
		type: "get",
		success:function(data){
			console.log(data);
			var like_count = data.length;

			$("#likes-"+post_id).html(like_count+" likes");

			var likers = "";
			$.each(data, function(key, value){
				likers += "<div><a href='/profile/"+value['username']+"/about'>"+value['fname']+"</a></div>";
			});
			$("#likersModal-"+post_id+" .modal-body").html(likers);		
		}
	});
}

function followUser(){
	document.getElementById('follow-unfollow').innerHTML="Unfollow";
	document.getElementById('follow-unfollow').className ="pull-right btn btn-primary btn-warning unfollow-user";

	var user_name = $(this).attr("data-pg");
	$.ajax({
		url: "/profile/follow/"+user_name,
		type: "get",
		success:function(data){
			console.log("Data: " + data);
			var followers_count = data.length;
			console.log("Followers count " + followers_count);
			$("#followers-count-"+user_name).html("Follower(s) "+followers_count);

			var followers = "";
			 $.each(data, function(key, value){
				followers += "<div><a href='/profile/"+value['username']+"'>"+value['name']+"</a></div>";
			 });
			 $("#followerModal_"+user_name+" .modal-body").html(followers);
		}
	});
}

function unfollowUser(){
	document.getElementById('follow-unfollow').innerHTML="Follow";
	document.getElementById('follow-unfollow').className ="pull-right btn btn-primary follow-user";

	var user_name = $(this).attr("data-pg");
	console.log(user_name);
	$.ajax({
		url: "/profile/unfollow/"+user_name,
		type: "get",
		success:function(data){
			console.log("Data: " + data);
			var followers_count = data.length;
			console.log("Followers count " + followers_count);
			$("#followers-count-"+user_name).html("Follower(s) "+followers_count);

			var followers = "";
			 $.each(data, function(key, value){
				followers += "<div><a href='/profile/"+value['username']+"'>"+value['name']+"</a></div>";
			 });
			 $("#followerModal_"+user_name+" .modal-body").html(followers);
		}
	});
}

function deletePost(){
	var post_id = $(this).attr("data-pg");
	
	$.ajax({
		url: "/post/delete/"+post_id,
		type: "get",
		success:function(data){
			 console.log("Data: " + data);
			 $("#post-"+post_id).remove();
		}
	});
}

function audioPlay(post_id){

	$.ajax({
		url: "/post/play/"+post_id,
		type: "get",
		success:function(data){
			 $("#plays-"+post_id).html(data + " plays <span id='plays-{{$post->id}}' class='glyphicon glyphicon-repeat'></span> ");
		}
	});
}