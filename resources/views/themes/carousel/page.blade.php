@extends('themes.carousel.layout')

@section('title')

{{ $page->title }}

@endsection

@section('content')

<div class="row">

	<div class="col-sm-8 col-sm-offset-2">

		{!! $page->content !!}

	</div>

</div>

@endsection