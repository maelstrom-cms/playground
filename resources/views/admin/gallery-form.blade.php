@extends('maelstrom::layouts.form')


@section('content')

    @component('maelstrom::components.form', [
        'action' => $action,
        'method' => $method,
    ])

        @include('maelstrom::inputs.text', [
            'name' => 'name',
            'label' => 'Name',
        ])

        @include('maelstrom::components.repeater', [
            'name' => 'items',
            'label' => 'Gallery Images',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Title',
                    'component' => 'Text',
                    'required' => true,
                ],
                [
                    'name' => 'subtitle',
                    'label' => 'Subtitle',
                    'component' => 'Text',
                    'required' => true,
                ],
                [
                    'name' => 'show_button',
                    'label' => 'Include Button?',
                    'component' => 'Switch',
                    'hide_off' => ['button_url', 'button_text'],
                ],
                [
                    'name' => 'button_url',
                    'label' => 'Button URL',
                    'component' => 'Text',
                    'html_type' => 'url',
                    'required' => true,
                ],
                [
                    'name' => 'button_text',
                    'label' => 'Button Text',
                    'component' => 'Text',
                    'required' => true,
                ],
                [
                    'name' => 'image',
                    'label' => 'Image',
                    'component' => 'MediaManager',
                    'required' => true,
                ],
            ],
        ])

        @include('maelstrom::inputs.transfer', [
            'label' => 'Linked posts',
            'name' => 'posts',
            'options' => [],
            'remote_uri' => route('maelstrom.form-options', 'posts'),
        ])

    @endcomponent

@endsection
