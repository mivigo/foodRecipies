@extends('app')

@section('content')

    <h1>Recipes</h1>
    <hr/>

    <meta name="_token" content="{{ csrf_token() }}"/>

    <div class="row" style="width: 100%; height: 20px;"></div>

    <a style="margin: 0  0  10px 10px; " class="btn btn-primary btn-xs"
       title="Add New Lead" data-toggle="modal" data-target="#createRecipe">New</a>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid"
           aria-describedby="dynamic-table_info">
        <thead>
        <tr role="row">

            <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1"
                aria-label="Domain: activate to sort column ascending">Рецепт
            </th>
            <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1"
                aria-label="Price: activate to sort column ascending">Описание
            </th>
            <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1"
                aria-label="Price: activate to sort column ascending">Владелец
            </th>
            <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1"
                aria-label="Price: activate to sort column ascending">Действия
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach ($recipes as $recipe)
                <tr role="row" class="odd error" >
                    <td>{{ $recipe->id }} {{ $recipe->title }}</td>
                    <td>{{ $recipe->body }}</td>
                    <td>{{ $recipe->user_id ? $recipe->user->name : 'n/a' }}</td>
                    <td>
                        <a href="{{ env('APP_URL') }}/recipes/{{ $recipe->id }}"
                           data-id="{{ $recipe->id }}"
                           data-toggle="modal"
                           data-target="#viewRecipe"
                           class="btn btn-success btn-xs click-action"
                           title="Overview">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>

                        <a href="{{ env('APP_URL') }}/recipes/{{ $recipe->id }}/edit"
                           data-id="{{ $recipe->id }}"
                           data-toggle="modal"
                           data-target="#editRecipe"
                           class="btn btn-primary btn-xs click-action"
                           title="Edit">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>

                        {!! Form::open([
                        'method'=>'DELETE',
                        'route' => ['recipes.destroy', $recipe->id],
                        'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Lead"/>',
                        array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'title' => 'Delete',
                        'onclick'=>'return confirm("Confirm delete?")'
                        )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
        @endforeach
        </tbody>

        @include ('recipe.modalCreate', ['submitButtonText' => 'Create Recipe'])
        @include ('recipe.emptyModal', ['name' => 'editRecipe'])
        @include ('recipe.emptyModal', ['name' => 'viewRecipe'])
@stop