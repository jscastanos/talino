@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'name',
        'label' => 'Branch Name',
        'maxlength' => 100
    ])
@stop
