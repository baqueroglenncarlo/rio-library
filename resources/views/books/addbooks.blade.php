<!DOCTYPE html>
<html>
<head>
	<title>Rio Library</title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/global.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body class="bg-light">
	@include('nav.nav')
	
	<div class="container-narrow">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Add New Book
			</div>
		

			<div class="panel-body">
				<form method="post" action="/addbook">
					{{csrf_field()}}

					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input type="text" name="title"  class="form-control" required>
					</div>

					<div class="form-group">
						<label for="author" class="control-label">Author</label>
						<input type="text" name="author" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="genre" class="control-label">Genre</label>
						<input type="text" name="genre" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="section" class="control-label">Section</label>
						<!-- <input type="text" name="section" class="form-control" required> -->
						<select class="form-control" name="section_id">
							@foreach($section as $sections)
								<option value="{{$sections->id}}">{{$sections->section_name}}</option>
							@endforeach	
						</select>
					</div>
					
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<a href="/add" class="btn btn-danger float-right">Cancel</a>
							<button type="submit" class="btn btn-success float-right">Save</button>

						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>
	
	@include('modal.login')
	@include('modal.section')
	@include('modal.error_popup')
	@include('modal.success_popup')

@if(!Auth::check())
<script type="text/javascript">
	$(document).ready(function(){
		$('#login_modal').modal('show');

		$('#login_modal').modal({
			backdrop:'static',
			keyboard:false
		});
	});
</script>
@endif

<script type="text/javascript">
	$(document).ready(function(){
		$('.form-control').keyup(function(event){
			var str = $(this).val();
			var array = str.split(' ');
			var newArray = [];

			for(var i=0; i < array.length; i++){
				newArray.push(array[i].charAt(0).toUpperCase() + array[i].slice(1));
			}
			this.value = newArray.join(' ');
		});
	});
</script>
	
</body>
</html>