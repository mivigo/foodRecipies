@extends ('app')

@section('content')
    <h1>Write a new recipe</h1>

    <hr/>

    {!! Form::model($recipe = new \App\Recipe, ['url' => 'recipes']) !!}
    {{ csrf_field() }}
    @include ('recipe.form', ['submitButtonText' => 'Create Recipe'])

    {!! Form::close() !!}

{{--    @include('errors.list')--}}

@endsection