@extends('maelstrom::layouts.form')


@section('content')

    @component('maelstrom::components.form', [
        'action' => $action,
        'method' => $method,
    ])

        @include('maelstrom::inputs.text', [
             'name' => 'name',
             'label' => 'Name',
             'required' => true,
        ])

        @include('maelstrom::inputs.colour', [
            'name' => 'colour',
            'label' => 'Colour',
            'required' => true,
            'default' => '#f44336',
        ])

        @include('maelstrom::inputs.transfer', [
            'label' => 'Linked posts',
            'name' => 'posts',
            'options' => [],
            'remote_uri' => route('maelstrom.form-options', 'posts'),
        ])

    @endcomponent

@endsection
