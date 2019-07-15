@extends('maelstrom::layouts.form')


@section('content')

    @component('maelstrom::components.form', [
        'action' => $action,
        'method' => $method,
        'novalidate' => true,
    ])
        @if (maelstrom()->getEntry())
            <div class="flex">
                <div class="w-1/2 pr-10">
                    @include('maelstrom::inputs.text', [
                        'name' => 'name',
                        'label' => 'Title',
                        'required' => true,
                    ])
                </div>
                <div class="w-1/2">
                    @include('maelstrom::inputs.text', [
                        'name' => 'slug',
                        'label' => 'Slug',
                        'required' => true,
                    ])
                </div>
            </div>
        @else
            @include('maelstrom::inputs.text', [
                'name' => 'name',
                'label' => 'Title',
                'required' => true,
            ])
        @endif

        @include('maelstrom::inputs.rating', [
            'name' => 'rating',
            'label' => 'Difficulty Level',
            'required' => true,
        ])

        @include('maelstrom::inputs.wysiwyg', [
            'name' => 'body',
            'label' => 'Post Content',
            'required' => true,
        ])

        <div class="flex">
            <div class="w-1/2 pr-10">
                @include('maelstrom::inputs.select', [
                    'name' => 'category_id',
                    'label' => 'Category',
                    'required' => true,
                    'remote_uri' => route('maelstrom.form-options', 'categories'),
                ])
            </div>
            <div class="w-1/2">
                @include('maelstrom::inputs.tags', [
                     'name' => 'tag_ids',
                     'label' => 'Tags',
                     'remote_uri' => route('maelstrom.form-options', 'tags'),
                 ])
            </div>
        </div>

        @include('maelstrom::inputs.switch', [
            'name' => 'is_featured',
            'label' => 'Is featured?',
            'hide_off' => ['featured_headline', 'featured_image'],
        ])

        @include('maelstrom::inputs.text', [
            'name' => 'featured_headline',
            'label' => 'Featured Headline',
        ])

        @include('maelstrom::components.media_manager', [
            'name' => 'featured_image',
            'label' => 'Featured Image',
        ])

        @include('maelstrom::inputs.select', [
            'name' => 'gallery_id',
            'label' => 'Attach Gallery',
            'remote_uri' => route('maelstrom.form-options', 'galleries'),
        ])

        @include('maelstrom::inputs.select', [
            'name' => 'author_id',
            'label' => 'Author',
            'required' => true,
            'remote_uri' => route('maelstrom.form-options', 'authors'),
        ])

    @endcomponent

@endsection
