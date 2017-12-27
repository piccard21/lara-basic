@if ($flash = session('message'))
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="alert alert-success" role="alert">
					{{ $flash }}
				</div>
			</div>
		</div>
	</div>
@endif