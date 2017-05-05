<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;
use App\Tag;
use Auth;
use App\Http\Controllers\Controller;
//use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecipeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
//        $this->middleware('auth', ['except' => 'create']);
    }

    public function  index () {

        $ingredients = Ingredient::pluck('name', 'id');
        $recipes = Recipe::latest('updated_at')->get();

        return view('recipe.index', compact('recipes','ingredients'));
    }

    public function show ($id) {

        $recipe = Recipe::FindOrFail($id);

        return view ('recipe.show', compact('recipe'));
    }

    public function create (Request $request) {
        $ingredients = Ingredient::pluck('name');
        return view ('recipe.create', compact('recipe', 'ingredients'));

    }

    public function store (Request $request) {

//        $rules = [
//            'title' => 'required|min:3',
//            'body'  => 'required',
//        ];
//
//        $validate = Validator::make($request->input(), $rules);
//        if ( $validate->fails() ) {
//        return redirect ('recipes');
//        }

        $recipe = Auth::user()->recipes()->create($request->all());

        $recipe->ingredients()->attach($request->input('ingredients'));
        flash()->success('Successfully Created');

//        $this->syncTags($recipe, $request->input('ingredient_list'));

        return redirect ('recipes');
    }

    private function syncTags(Request $recipe, array $ingredients)
    {
        $recipe->tags()->sync($ingredients);
    }

        public function edit ($id, Request $request) {

        $recipe = Recipe::findOrFail($id);
        $ingredients = Ingredient::pluck('name', 'id');
        return view ('recipe.edit', compact('recipe', 'ingredients'));
    }

    public function update($id, Request $request) {
        $recipe = Recipe::findOrFail($id);
        $recipe->update($request->all());

        $this->syncTags($recipe, $request->input('ingredients_list'));

        return redirect('recipes');
    }
    public function destroy($id)
    {
        Recipe::destroy($id);
        flash('Task has been successfully DELETED!', 'danger');
        return redirect('recipes');
    }
}
