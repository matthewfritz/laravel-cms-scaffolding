@extends('themes.default.layout')

@section('title')

{{ $page->title }}

@endsection

@section('content')

{!! $page->content !!}

@endsection