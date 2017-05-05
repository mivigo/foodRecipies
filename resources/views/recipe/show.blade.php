<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Recipe - {{$recipe->title}} [{{$recipe->id}}]</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 panel panel-default">

                <div class="panel-heading">
                    <h1 class="panel-title">{{ $recipe->title }}</h1>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <hr/>
                            {{ $recipe->body }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    {{--@unless($recipe->ingredients->isEmpty())--}}
        {{--<h5>Ingredients: </h5>--}}
        {{--<ul>--}}
            {{--@foreach($recipe->ingredients as $ingredient)--}}
                {{--<li>{{ $ingredient->name }}</li>--}}
                {{--<li>{{ $ingredient->size }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--@endunless--}}

