<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/global.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</head>
<body class="bg-light">
	@include('nav.nav')
	@include('layouts.error')

	<div class="container">
		<form method="get" action="/search">
			{{csrf_field()}}
			<div class="form-group row">
				<label class="col-form-label">Search By : </label>
				<div class="col-sm-4">
					<select name="category" class="form-control">
						<option value="title">Title</option>
						<option value="author">Author</option>
						<option value="genre">Genre</option>
						<option value="section_name">Section</option>
					</select>
				</div>
				<div class="col-sm-4">
					<input type="text" name="search" class="form-control">
				</div>
				<button type="submit" class="btn btn-info float-right float">Search</button>
			</div>

			<div class="form-group row">
				<div class="col-sm-4">
					
				</div>
			</div>
		</form>

		<table class="table table-hover table-responsive-lg">
		<thead class="thead-dark text-center">
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Genre</th>
				<th>Library Section</th>
				<th>Borrow</th>
			</tr>
		</thead>
		<tbody class="text-center">
			@foreach($books as $book)
			<tr>
				<td>{{$book->title}}</td>
				<td>{{$book->author}}</td>
				<td>{{$book->genre}}</td>
				<td>{{$book->section_name}}</td>
				<!-- <td><a href="/borrow/{{$book->id}}" class="btn btn-info">Borrow</a></td> -->
				<td>
					@if(Auth::check())
						<a href="/borrow/{{$book->id}}" class="btn btn-primary">Borrow</a>
					@else
						<button class="btn btn-primary" data-toggle="modal" data-target="#login_modal">Login</button>
						<button class="btn btn-info" data-toggle="modal" data-target="#register_modal">Signup</button>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{$books->links()}}
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
</body>
</html>