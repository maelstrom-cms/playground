@extends('maelstrom::layouts.basic')

<?php maelstrom(\App\Post::class)->setEntry(\App\Post::first()); ?>

@section('title')
    Sandbox
@endsection

@section('content')

    <form>

    @component('maelstrom::components.tabs')

        @component('maelstrom::components.tab', ['label' => 'Basic'])

            <?php
                $fields = [
                    [
                        '_component' => 'checkbox',
                        'name' => 'Checkbox',
                        'required' => true,
                        'help' => 'Are you here to party??!?!?!',
                        'default' => ['1'],
                    ],
                    [
                        '_component' => 'colour',
                        'name' => 'Colour',
                        'default' => '#f44336',
                    ],
                    [
                        '_component' => 'date',
                        'name' => 'Date Picker',
                    ],
                    [
                        '_component' => 'date_range',
                        'label' => 'Date Range Picker',
                        'name_end' => 'name_end',
                        'name_start' => 'name_start',
                    ],
                    [
                        '_component' => 'date_time',
                        'name' => 'Date Time Picker',
                    ],
                    [
                        '_component' => 'time',
                        'name' => 'Time Picker',
                    ],
                    [
                        '_component' => 'file',
                        'name' => 'File Uploader',
                    ],
                    [
                        '_component' => 'files',
                        'name' => 'Multiple File Uploader',
                    ],
                    [
                        '_component' => 'image',
                        'name' => 'Image Uploader',
                    ],
                    [
                        '_component' => 'images',
                        'name' => 'Multiple Image Uploader',
                    ],
                    [
                        '_component' => 'icon',
                        'name' => 'Icon Picker',
                        'default' => 'github',
                    ],
                    [
                        '_component' => 'markdown',
                        'name' => 'Markdown Editor',
                        'default' => '# Hello World',
                    ],
                    [
                        '_component' => 'number',
                        'name' => 'Number Input',
                    ],
                    [
                        '_component' => 'place',
                        'name' => 'Algolia Place Lookup',
                    ],
                    [
                        '_component' => 'radio',
                        'name' => 'Radio Buttons',
                    ],
                    [
                        '_component' => 'text',
                        'name' => 'Text Input',
                    ],
                    [
                        '_component' => 'text',
                        'name' => 'Text Area Input',
                        'html_type' => 'textarea',
                    ],
                    [
                        '_component' => 'random',
                        'name' => 'Random String',
                    ],
                    [
                        '_component' => 'rating',
                        'name' => 'Star Rating',
                    ],
                    [
                        '_component' => 'secret',
                        'name' => 'Secret / Password Input',
                    ],
                    [
                        '_component' => 'select',
                        'name' => 'Select Menu',
                        'remote_uri' => route('maelstrom.form-options', 'categories'),
                        'create_button' => ['url' => route('categories.create')],
                    ],
                    [
                        '_component' => 'select_multiple',
                        'name' => 'Multiple Select Menu',
                        'remote_uri' => route('maelstrom.form-options', 'categories'),
                    ],
                    [
                        '_component' => 'tags',
                        'name' => 'Tags',
                    ],
                    [
                        '_component' => 'transfer',
                        'name' => 'Transfer List',
                        'remote_uri' => route('maelstrom.form-options', 'categories'),
                        'create_button' => ['url' => route('categories.create')],
                    ],
                    [
                        '_component' => 'video',
                        'name' => 'YouTube / Vimeo',
                    ],
                    [
                        '_component' => 'wysiwyg',
                        'name' => 'WYSIWYG',
                    ],
                    [
                        '_component' => 'switch',
                        'name' => 'Switch',
                    ],
                ];

            ?>

          <div class="w-2/3">
              @foreach ($fields as $field)
                  @include('maelstrom::inputs.' . $field['_component'], $field)
              @endforeach
          </div>

        @endcomponent

        @component('maelstrom::components.tab', ['label' => 'Advance'])

            @include('maelstrom::components.repeater', [
                'name' => 'Repeater',
                'fields' => array_map(function ($field) {
                    $field['component'] = $field['_component'];
                    unset($field['_component']);

                    return $field;
                }, [
                    $fields[0],
                    $fields[1],
                    $fields[5],
                    $fields[6],
                    $fields[8],
                    $fields[10],
                    $fields[11],
                    $fields[13],
                    $fields[16],
                ]),
            ])

        @endcomponent

    @endcomponent

    </form>

@endsection
