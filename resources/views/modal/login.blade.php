<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labeledby="login_modal_label" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="login_modal_label">Login</h4>
				<!-- <button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button> -->
			</div>
			<div class="modal-body">
				<form method="post" id="login_form">
					{{csrf_field()}}

					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" id="username" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" id="password" class="form-control" required>
					</div>

					<button type="submit" id="login" class="btn btn-success">Login</button>
					<!-- <button type="button" class="btn btn-link" data-toggle="modal" data-target="#register_modal" data-dismiss="modal">Register</button> -->
				</form>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('submit', '#login_form', function(event){
			event.preventDefault();	

			var username = $('#username').val();
			var password = $('#password').val();

			if(username == '' || password == ''){
				$('#error_popup').modal('show');
				$('#login_modal').modal('hide');
				$('#error_popup_body').text("All input is required");
				$('#error_popup').data('target','#login_modal');
				$('#close_error_message').attr('data-target','#login_modal');
				$('#close_error_message_ok').attr('data-target','#login_modal');

			}else{
				$.ajax({
					url:'/login',
					method:'post',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(data){
						if(data == "Invalid Username or Password"){
							$('#error_popup').modal('show');
							$('#login_modal').modal('hide');
							$('#error_popup_body').text("Invalid Username or Password");
							$('#error_popup').data('target','#login_modal');
							$('#close_error_message').attr('data-target','#login_modal');
							$('#close_error_message_ok').attr('data-target','#login_modal');
						}else{
							window.location.href= "/viewbooks";
						}
					}	
				})
			}
		});
	});
</script>