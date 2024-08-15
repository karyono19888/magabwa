<?php

namespace App\Http\Controllers;

use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\BannerAdvertisment;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $articles = ArticleNews::with('category')
                    ->where('is_featured','not_featured')
                    ->latest()
                    ->take(3)
                    ->get();
                    
        $featured_articles = ArticleNews::with('category')
                    ->where('is_featured','featured')
                    ->inRandomOrder()
                    ->take(3)
                    ->get();

        $authors = Author::all();

        $adsBanner = BannerAdvertisment::where(['is_active' => 'active', 'type' => 'banner'])
                    ->take(1)
                    ->inRandomOrder()
                    ->get();
        
        $entertaiment_article = ArticleNews::whereHas('category', function ($category){
                                    $category->where('name','Entertainment');
                                })
                                ->where('is_featured','not_featured')
                                ->latest()
                                ->take(6)
                                ->get();
                                
        $entertaiment_article_featured = ArticleNews::whereHas('category', function ($category){
                                    $category->where('name','Entertainment');
                                })
                                ->where('is_featured','featured')
                                ->inRandomOrder()
                                ->take(1)
                                ->get();

        return view('front.index', compact('categories', 'articles', 'authors', 'featured_articles', 'adsBanner','entertaiment_article','entertaiment_article_featured'));
    }

    public function details(ArticleNews $article_news)
    {
        $articles = ArticleNews::with('category')
                    ->where('is_featured','not_featured')
                    ->where('id','!=',$article_news->id)
                    ->latest()
                    ->take(3)
                    ->get();
        $categories = Category::all();

        $adsBanner = BannerAdvertisment::where(['is_active' => 'active', 'type' => 'banner'])
            ->take(1)
            ->inRandomOrder()
            ->get();
            
        $squareBanner = BannerAdvertisment::where(['is_active' => 'active', 'type' => 'square'])
            ->take(2)
            ->inRandomOrder()
            ->get();

        $squareBanner_1 = $squareBanner->first();
        $squareBanner_2 = $squareBanner->count() > 1 ? $squareBanner->get(1) : $squareBanner->first();
        
        $author_news = ArticleNews::where('author_id', $article_news->author->id)
            ->where('id','!=',$article_news->id)
            ->inRandomOrder()
            ->get();
            
        return view('front.detail', compact('squareBanner_1','squareBanner_2','categories','article_news','articles','adsBanner', 'author_news'));
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $adsBanner = BannerAdvertisment::where(['is_active' => 'active', 'type' => 'banner'])
                ->take(1)
                ->inRandomOrder()
                ->get();
        return view('front.category', compact('categories','category','adsBanner'));
    }

    public function author(Author $author)
    {
        $categories = Category::all();
        $adsBanner = BannerAdvertisment::where(['is_active' => 'active', 'type' => 'banner'])
                ->take(1)
                ->inRandomOrder()
                ->get();
        return view('front.author', compact('author','categories','adsBanner'));
    }

    public function search(Request $request)
    {   
        $request->validate([
            'keywords' =>['required','string','max:255']
        ]);
        
        $categories = Category::all();

        $keyword = $request->keywords;
        $articles = ArticleNews::with(['category','author'])->where('name','like', '%'.$keyword.'%')
                ->paginate(6);
                
        return view('front.search', compact('categories','articles','keyword'));
    }
}