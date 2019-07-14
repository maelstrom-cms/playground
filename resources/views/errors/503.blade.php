@extends('errors::illustrated-layout')

@section('title', __('Service Unavailable'))
@section('code', 'BRB')
@section('message', __($exception->getMessage() ?: "We're currently refreshing the demo database, this normally takes around 30 seconds and happens every hour, please try again in a moment."))

@section('image')
    <div style="background-image: url({{ asset('503.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center"></div>
@endsection
