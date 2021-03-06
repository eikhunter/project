<?php
include("includes/header.php");


if(isset($_POST['post'])){
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text'], 'none');
}


 ?>

 <div class="pst-Post">
	 <div class="pst-Post_Inner">
		 <div class="pst-Post_Columns">
			 	<div class="pst-Post_Column">
			 		<div class="pst-Post_ProfileContainer">
			 			<a class="pst-Post_ProfileImage" href="<?php echo $userLoggedIn; ?>">  <img class="pst-Post_ProfileImg" src="<?php echo $user['profile_pic']; ?>"> </a>
			 		</div>
			 	</div>
				<div class="pst-Post_Column-post">
					<form class="post_form pst-Post_Form" action="index.php" method="POST">
						<textarea class="post_Post_Textarea" name="post_text" id="post_text" placeholder="Paste your url here..."></textarea>
						<input class="pst-Post_Button" type="submit" name="post" id="post_button" value="Post">
					</form>
			 	</div>
		 </div>

		 <div class="pst-Posts">
			 <div class="posts_area"></div>
			 <img id="loading" src="assets/images/icons/loading.gif">
		 </div>
	 </div>
 </div>

	<script>
	var userLoggedIn = '<?php echo $userLoggedIn; ?>';

	$(document).ready(function() {

		$('#loading').show();

		//Original ajax request for loading first posts
		$.ajax({
			url: "includes/handlers/ajax_load_posts.php",
			type: "POST",
			data: "page=1&userLoggedIn=" + userLoggedIn,
			cache:false,

			success: function(data) {
				$('#loading').hide();
				$('.posts_area').html(data);
			}
		});

		$(window).scroll(function() {
			var height = $('.posts_area').height(); //Div containing posts
			var scroll_top = $(this).scrollTop();
			var page = $('.posts_area').find('.nextPage').val();
			var noMorePosts = $('.posts_area').find('.noMorePosts').val();

			if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
				$('#loading').show();

				var ajaxReq = $.ajax({
					url: "includes/handlers/ajax_load_posts.php",
					type: "POST",
					data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
					cache:false,

					success: function(response) {
						$('.posts_area').find('.nextPage').remove(); //Removes current .nextpage
						$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage

						$('#loading').hide();
						$('.posts_area').append(response);
					}
				});

			} //End if

			return false;

		}); //End (window).scroll(function())


	});

	</script>




	</div>
</body>
</html>

<div class='pst-Status'
	<div class='pst-Status_User'>
		<div class='pst-Status_UserPicture' onClick='javascript:toggle$id()'>
			<a class='pst-Status_UserPictureImage'><img class='pst-Status_UserPictureImg' src='$profile_pic' width='50'></a>
		</div>
		<div class='pst-Status_PostedBy' style='color:#ACACAC;'>
			<a href='$added_by'> $first_name $last_name </a> $user_to &nbsp;&nbsp;&nbsp;&nbsp;<span class'pst-Status_Time'>$time_message</span>
			$delete_button
		</div>
	</div>
	<div id='post_body'>
		$body
	</div>
	<div class='newsfeedPostOptions'>
		Comments($comments_check_num)&nbsp;&nbsp;&nbsp;
		<iframe src='like.php?post_id=$id' scrolling='no'></iframe>
	</div>
	<div class='post_comment' id='toggleComment$id' style='display:none;'>
		<iframe src='comment_frame.php?post_id=$id' id='comment_iframe' frameborder='0'></iframe>
	</div>
	<hr>
</div>
