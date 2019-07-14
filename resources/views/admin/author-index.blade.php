@extends('maelstrom::layouts.index')

@section('buttons')
    @include('maelstrom::buttons.button', [
        'url' => route('authors.create'),
        'label' => 'Create Author'
    ])
@endsection
