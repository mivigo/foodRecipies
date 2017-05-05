@extends ('app')

@section('content')
    <h1>Write a new recipe</h1>

    <hr/>

    {!! Form::model($recipe = new \App\Recipe, ['url' => 'recipes']) !!}
    {{ csrf_field() }}
        <div class ="row">
            @include ('recipe.form', ['submitButtonText' => 'Create Recipe'])
        </div>
    {!! Form::close() !!}

{{--    @include('errors.list')--}}

@endsection