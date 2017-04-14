@extends('themes.default.layout')

@section('title')
	Page Not Found
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<p>The page you are looking for could not be found.</p>

			<p>This is a custom error page that overrides the regular page renderer.</p>
		</div>
	</div>
@endsection