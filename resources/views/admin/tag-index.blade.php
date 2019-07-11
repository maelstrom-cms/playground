@extends('maelstrom::layouts.index')

@section('buttons')
    @include('maelstrom::buttons.button', [
        'url' => route('tags.create'),
        'label' => 'Create Tag'
    ])
@endsection
