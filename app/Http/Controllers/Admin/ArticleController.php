<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /*@return
     */
    public function index()
    {
        return view('admin.articles.index', [
            'articles' => Article::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /*@return
     */

    public function create(){
        return view('admin.articles.create', [
            'article'    => [],
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);

    }


    /*@param
     * @returns
     */

    public function store(Request $request)
    {
       $article = Article::create($request->all());

       if($request->input('categories')) :
         $article->categories()->attach($request->input('categories'));
           endif;

           return redirect()->route('admin.article.index');
    }
    /*@param
     * @returns
     */

    public function show(Category $category){
        //
    }

    /*@param
     * *@param
     * @returns
     */

    public function edit(Article $article){
        return view('admin.articles.edit',
        [
            'article'    => $article,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /*@param
         * *@param
         * @returns
         */

    public function uptade(Request $request, Article $article)  {
        $article->update($$request->exept('slug'));

       $article->categories()->detach();

        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');
    }


    /*@param
     * @returns
     */

    public function destroy(Article $article){
        $article->categories()->detach();
        $article->delete();

        return redirect()->route('admin.article.index');
    }

}
