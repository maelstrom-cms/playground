@extends('maelstrom::layouts.index')

@section('buttons')
    @include('maelstrom::buttons.button', [
        'url' => route('posts.create'),
        'label' => 'Create Post'
    ])
@endsection
