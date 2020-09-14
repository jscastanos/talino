@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'title',
        'label' => 'Title',
        'maxlength' => 100
    ])

    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Description',
        'toolbarOptions' => [
            ['header' => [1, 2, false]],
            'bold',
            'italic',
            'underline',
            'image',
            'link'
        ]
    ])

    @formField('medias',[
        'name' => 'cover',
        'label' => 'Cover Image'
    ])
@stop
