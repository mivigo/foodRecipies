@extends('app')

@section('content')
    <h1>Recipes</h1>
    <hr/>
    @foreach ($recipes as $recipe)
        <article>
            <h2>
                <a href="{{ url('/recipes', $recipe->id) }}">{{ $recipe->title }}</a>
            </h2>

            <div class = "body">{{ $recipe->body }}</div>
        </article>
    @endforeach
@stop
