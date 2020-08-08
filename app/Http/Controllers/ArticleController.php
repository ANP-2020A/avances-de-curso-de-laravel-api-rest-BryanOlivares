<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\Article as ArticleResources;
use App\Http\Resources\Article as ArticleCollection;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    private static $messege = [
        'required' => 'El campo :attribute es obligatorio.',
        'body.required' => 'El body no es válido.',
    ];
    public function index()
    {
        return new ArticleCollection(Article::paginate(10));
    }
    public function show(Article $article)
    {
        return  response()->json(new ArticleResources($article),200);
    }
    public function store(Request $request)
    {
        $request->validate( [
            'title' => 'required|string|unique:articles|max:255',
            'body' => 'required',
            'category_id'=> 'required|exists:categories, id'
        ], self::$messege);

        $article = Article::create($request->all());
        return response()->json($article, 201);
    }
    public function update(Request $request, Article $article)
    {
        $request->validate( [
            'title' => 'required|string|unique:articles,title,'.$article->id.'|max:255',
            'body' => 'required',
            'category_id'=> 'required|exists:categories, id'
        ], self::$messege);
        $article->update($request->all());
        return response()->json($article, 200);
    }
    public function delete(Request $request, Article $article)
    {
        $article->delete();
        return response()->json(null , 204);
    }

}
