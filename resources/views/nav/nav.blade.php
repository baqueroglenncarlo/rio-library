<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	<a class="navbar-brand" href="/">Rio Library</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" >
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbar">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a href="/add" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add</a>
				<div class="dropdown-menu">
					<a href="/add" class="dropdown-item">Books</a>
					<a href="#" class="dropdown-item" data-toggle="modal" data-target="#section_modal">Section</a>
				</div>
			</li>
			<li class="nav-item">
				<a href="/viewbooks" class="nav-link">Books</span></a>
			</li>
			<li class="nav-item">
				<a href="/borrow" class="nav-link">Borrowed Books</a>
			</li>
			
		</ul>

		<ul class="navbar-nav">
			@if(Auth::check())
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="/borrow">{{Auth::user()->firstname}} {{Auth::user()->lastname}} </a> 
					<div class="dropdown-menu">
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
