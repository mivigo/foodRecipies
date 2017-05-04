<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
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

        $recipes = Recipe::latest('updated_at')->get();

        return view('recipe.index', compact('recipes'));
    }

    public function show (RecipeRequest $recipe) {

        return view ('recipe.show', compact('recipe'));

    }

    public function create (RecipeRequest $recipe) {

//        return view ('recipe.create', compact('recipe'));

    }

    public function store (RecipeRequest $request) {

        Auth::user()->create($request->all());
//        Recipe::create($request->all());
        flash()->success('Successfully Created');
        return redirect ('recipes');

    }
    public function edit (RecipeRequest $request) {

        $tags = Tag::pluck('name', 'id');
        return view ('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request) {
//        $article = Article::findOrFail($id);
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));
//        $article->tags()->sync($request->input('tag_list'));

        return redirect('articles');
    }

    private function syncTags(Article $article, array $tags) {
        $article->tags()->sync($tags);
    }

    private function createArticle(ArticleRequest $request) {
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($article, $request->input('tag_list'));
        return $article;
    }

}
