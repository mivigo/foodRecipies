{!! Form::open(array('action'=>['RecipeController@store'],'method'=>'POST',
    'class' => 'form-horizontal' )) !!}
<div class ="row">
    <div id="createRecipe" tabindex='-1' class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Lead</h4><br/>
                    <span class="modal-title"> Details</span>
                </div>

                <div class="modal-body">
                    <div class="row">
                        @include ('recipe.form')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" type="submit" class="btn btn-cyan btn-primary">
                        <i class ="fa fa-2 fa-spin"></i>&nbsp; {{ $submitButtonText }}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
{!! Form::close() !!}
