@if(count($errors))
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="list-group mt-2 mb-2">
					@foreach ($errors->all() as $error)
						<li class="list-group-item list-group-item-danger">{{$error}}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endif