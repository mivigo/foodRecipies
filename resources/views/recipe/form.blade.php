{{--Temporary--}}
{{--{!! Form::hidden('user_id',1) !!}--}}

<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('title', 'Title: ') !!}
        {!! Form::text('title', null, ['class' =>'form-control']) !!}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('body', 'Body: ') !!}
        {!! Form::textarea('body', null, ['class' =>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('ingredient_list', 'Ingredients: ') !!}
    {{ csrf_field() }}
    {!! Form::select('ingredient_list[]',$ingredients, null, ['id' => 'ingredient_list', 'class' =>'form-control', 'multiple']) !!}
</div>

@section('footer')
    <script>
        $('#ingredient_list').select2({
            placeholder: 'Chose a tag',
            tags: true
        });
    </script>
@endsection