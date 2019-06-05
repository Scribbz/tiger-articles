<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Requests;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get articles
        $articles = Article::paginate(10);

        //Return colletion(list) of articles as a resource
        return ArticleResource::collection($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //This function is used in Store function as a POST request
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if-> ?, else-> :
        $article = $request->isMethod('put') ?
        Article::findOrFail($request->article_id) : 
        new Article();

        $article->id = $request -> input('article_id');
        $article->title = $request -> input('title');
        $article->body = $request -> input('body');

        if ( $article->save() ) {
            # code...
            return new ArticleResource($article);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article or $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get a Single Article
        $article = Article::findOrFail($id);

        //Return single article as a resource
        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article or $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //This function is not used as articles are auto-generated
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //This function is used in Store function as a PUT Request
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article or $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get a Single Article
        $article = Article::findOrFail($id);

        if ( $article->delete() ) {
            # code...
            return new ArticleResource($article);
        }

    }
}