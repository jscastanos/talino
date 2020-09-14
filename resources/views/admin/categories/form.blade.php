@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'name',
        'label' => 'Category Name',
        'maxlength' => 100
    ])

    @formField('color', [
        'name' => 'badge_color',
        'label' => 'Badge Color',
        'default' => '#007BFF'
    ])
@stop
