<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return response()->json([
            'Status-Code' => 200,
            'Message' => "List articles",
            'Article' => $articles,
        ], 200);
    }

    public function show(Article $article)
    {
        return response()->json([
            'Status-Code' => 200,
            'Message' => "Successfully",
            'Article' => $article,
        ], 200);
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return response()->json([
            'Status-code' => 201,
            'Message' => "Create Successfully",
            'Article' => $article,
        ], 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return response()->json([
            'Status-code' => '200',
            'Message' => "Update Successfully",
            'Article' => $article,
        ], 200);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json([
            'Status code' => 200,
            'Message' => "Delete Successfully",
        ], 200);
    }
}
