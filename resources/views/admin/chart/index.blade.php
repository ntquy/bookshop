@extends('layout.admin_layout')
@section('content')
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">	
			</div>
			<div class="panel-body">
				{!! $charts->render() !!}
			</div>

			<div class="panel-body">
				{!! $category_books->render() !!}
			</div>
			
		</div>
		
	</div>
	{!! Charts::scripts() !!}
	{!! $charts->script() !!}
	{!! $category_books->script() !!}
@endsection