<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/global.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</head>
<body>
	@include('nav.nav')
	<div class="container">
		<form method="get" action="/search/borrowed">
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
			<thead class="thead-dark">
				<tr>
					<th>Title</th>
					<th>Author</th>
					<th>Genre</th>
					<th>Return</th>
				</tr>
			</thead>

			<tbody>
				@foreach($book as $books)
					<tr>
						<td>{{$books->title}}</td>
						<td>{{$books->author}}</td>
						<td>{{$books->genre}}</td>
						<td><a href="/return/{{$books->book_id}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus">Return</span></a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
</body>
</html>