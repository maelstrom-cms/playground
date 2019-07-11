@extends('maelstrom::layouts.index')

@section('buttons')
    @include('maelstrom::buttons.button', [
        'url' => route('categories.create'),
        'label' => 'Create Category'
    ])
@endsection
