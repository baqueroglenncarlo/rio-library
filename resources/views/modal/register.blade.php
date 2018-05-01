<div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labeledby="register_modal_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="register_modal_label">Sign up</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="registration_form">
					{{csrf_field()}}

					<div class="form-group">
						<label>Firstname</label>
						<input type="text" name="firstname" class="form-control" id="firstname" required>
					</div>
					<div class="form-group">
						<label>Lastname</label>
						<input type="text" name="lastname" class="form-control" id="lastname" required>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" id="username_reg" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" id="password_reg" required>
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
					</div>

					<button type="submit" class="btn btn-success">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('submit','#registration_form', function(event){
			event.preventDefault();

			var firstname 	= $('#firstname').val();
			var lastname 	= $('#lastname').val();
			var username 	= $('#username_reg').val();
			var password 	= $('#password_reg').val();
			var conf 		= $('#password_confirmation').val();

			if(firstname == '' || lastname == '' || username == '' || password == '' || conf == ''){
				$('#error_popup').modal('show');
				$('#register_modal').modal('hide');
				$('#error_popup_body').text("All input is required");
				$('#error_popup').data('target','#register_modal');
				$('#close_error_message').attr('data-target','#register_modal');
				$('#close_error_message_ok').attr('data-target','#register_modal');
			}else if(password != conf){
				$('#error_popup').modal('show');
				$('#register_modal').modal('hide');
				$('#error_popup_body').text("Password not matched!!");
				$('#error_popup').data('target','#register_modal');
				$('#close_error_message').attr('data-target','#register_modal');
				$('#close_error_message_ok').attr('data-target','#register_modal');
			}else{
				$.ajax({
					url:'/register',
					method:'post',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(data){
						if(data == 'User Found'){
							$('#error_popup').modal('show');
							$('#register_modal').modal('hide');
							$('#error_popup_body').text("Username is alreay exist!!");
							$('#error_popup').data('target','#register_modal');
							$('#close_error_message').attr('data-target','#register_modal');
							$('#close_error_message_ok').attr('data-target','#register_modal');
						}else{
							$('#success_popup').modal('show');
							$('#success_popup_body').text("You can now login to your account.");
							$('#registration_form')[0].reset();
							$('#register_modal').modal('hide');
							$('#success_popup').data('target','#login_modal');
							$('#close_success_message').attr('data-target','#register_modal');
						}
					}

				})
			}
		});
	});
</script>