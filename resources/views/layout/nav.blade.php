<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 ">
	<a class="navbar-brand" href="{{ route("home") }}">Laravel Basic</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="{{ route("example.index") }}">Crud - single model</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Crud - multiple models
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="{{ route("author.index") }}">Author</a>
					<a class="dropdown-item" href="{{ route("book.index") }}">Book</a>
					<a class="dropdown-item" href="{{ route("publisher.index") }}">Publisher</a>
				</div>
			</li>
		</ul>
	</div>
</nav>