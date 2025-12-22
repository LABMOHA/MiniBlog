<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // 

        //$articles= Article::all();
        $articles = Article::with('user')
        ->where('user_id', auth()->id())
            ->latest()
            ->take(50)
            ->get();

        return View('home', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return View('Article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article = new Article($validated);
        $article->user_id = auth()->id();
        $article->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article  $article)

    {
        return View('Article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article  $article)
    {

        return View('Article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {

        $validared = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $article->update($validared);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article  $article)
    {
        //

        $article->delete();
        return redirect('/');
    }
}
