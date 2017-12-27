<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 ">
	<a class="navbar-brand" href="{{ route("home") }}">Laravel Basic</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="{{ route("example.index") }}">Example</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="{{ route("author.index") }}">Author</a>
			</li>
		</ul>
	</div>
</nav>