@extends('maelstrom::layouts.form')


@section('content')

        @component('maelstrom::components.form', [
        'action' => $action,
        'method' => $method,
    ])

            <div class="w-1/2">
                @include('maelstrom::inputs.text', [
                    'name' => 'name',
                    'label' => 'Name',
                    'required' => true,
                ])

                @include('maelstrom::inputs.image', [
                    'name' => 'avatar',
                    'label' => 'Avatar',
                    'thumbnail' => 'avatar_url',
                ])

                @include('maelstrom::inputs.text', [
                    'name' => 'website',
                    'label' => 'Personal website',
                    'html_type' => 'url'
                ])

                @include('maelstrom::inputs.markdown', [
                    'name' => 'biography',
                    'label' => 'Biography',
                ])

            </div>

            @include('maelstrom::inputs.transfer', [
                'label' => 'Linked posts',
                'name' => 'posts',
                'options' => [],
                'remote_uri' => route('maelstrom.form-options', 'posts'),
            ])

        @endcomponent

@endsection
