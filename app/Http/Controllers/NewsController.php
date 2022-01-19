<?php
namespace App\Http\Controllers;

use App\Category;
use App\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function category($slug) {
        $category = Category::where('slug')->first();

        return view('news.category', [
            'category'=>$category,
            'articles' => $category->articles()->where('published', 1)->paginate(12)
        ]);

    }
    public function article($slug){
        return view('news.article', [
            'article' => Article::where('slug', $slug)->first()
        ]);
    }
}
