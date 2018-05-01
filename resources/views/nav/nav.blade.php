<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	<a class="navbar-brand" href="/">Rio Library</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" >
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbar">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a href="/" class="nav-link">Home</span></a>
			</li>
			<li class="nav-item">
				<a href="/viewbooks" class="nav-link">Books</span></a>
			</li>
			<li class="nav-item">
				<a href="/add" class="nav-link">Add Book</span></a>
			</li>
		</ul>

		<ul class="navbar-nav">
			@if(Auth::check())
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="/borrow">{{Auth::user()->firstname}} {{Auth::user()->lastname}} </a> 
					<div class="dropdown-menu">
						<a href="/borrow" class="dropdown-item">Borrowed Books</a>
						<a href="/logout" class="dropdown-item">Logout</a>
					</div>
				</li>
				
			@else
				<a class="text-light" href="#" data-toggle="modal" data-target="#login_modal">Login</a>
			@endif
		</ul>
			
	</div>
</nav>
<br><br><br>
