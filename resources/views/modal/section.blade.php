<div class="modal fade" id="section_modal" tabindex="-1" role="dialog" aria-labeledby="section_modal_label" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="section_modal_label">Add Section</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="add_form">
					{{csrf_field()}}

					<div class="form-group">
						<label>Section name</label>
						<input type="text" name="section_name" id="section_name" class="form-control" required>
					</div>

					<button type="submit" id="submit" class="btn btn-success">Submit</button>
					<!-- <button type="button" class="btn btn-link" data-toggle="modal" data-target="#register_modal" data-dismiss="modal">Register</button> -->
				</form>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('submit', '#add_form', function(event){
			event.preventDefault();	

			var section = $('#section_name').val();

			if(section == ''){
				$('#error_popup').modal('show');
				$('#section_modal').modal('hide');
				$('#error_popup_body').text("Input is required.");
				$('#error_popup').attr('data-target','#section_modal');
				$('#close_error_message').attr('data-target','#section_modal');
				$('#close_error_message_ok').attr('data-target','#section_modal');

			}else{
				$.ajax({
					url:'/section',
					method:'post',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(data){
						if(data == "Already Exist"){
							$('#error_popup').modal('show');
							$('#section_modal').modal('hide');
							$('#error_popup_body').text(section+" is already exist.");
							$('#error_popup').attr('data-target','#section_modal');
							$('#close_error_message').attr('data-target','#section_modal');
							$('#close_error_message_ok').attr('data-target','#section_modal');
						}else{
							$('#success_popup').modal('show');
							$('#success_popup_body').text("New section added.");
							$('#section_modal').modal('hide');
							$('#add_form')[0].reset();
							$('#success_popup_ok').attr('data-target','#section_modal');
						}
					}	
				})
			}
		});
		
		$('#section_name').keyup(function(event){
			var str = $(this).val();
			var array = str.split(' ');
			var newArray = [];

			for(var i=0; i < array.length; i++){
				newArray.push(array[i].charAt(0).toUpperCase() + array[i].slice(1));
			}
			this.value = newArray.join(' ');
		});

		$('.close').on('click', function(event){
			window.location.href= "/add";
		})
	});
</script>