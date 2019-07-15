@extends('maelstrom::layouts.form')


@section('content')

    @component('maelstrom::components.form', [
        'action' => $action,
        'method' => $method,
    ])
        @include('maelstrom::inputs.text', [
            'name' => 'name',
            'label' => 'Tag',
        ])

        @include('maelstrom::inputs.transfer', [
            'label' => 'Linked posts',
            'name' => 'posts',
            'options' => [],
            'remote_uri' => route('maelstrom.form-options', 'posts'),
        ])

    @endcomponent

@endsection
