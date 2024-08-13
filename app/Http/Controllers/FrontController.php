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
        $category = Category::all();

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

        $ads_banner = BannerAdvertisment::where(['is_active' => 'active', 'type' => 'banner'])
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

        return view('front.index', compact('category', 'articles', 'authors', 'featured_articles', 'ads_banner','entertaiment_article','entertaiment_article_featured'));
    }

    public function details()
    {
        
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $ads_banner = BannerAdvertisment::where(['is_active' => 'active', 'type' => 'banner'])
                ->take(1)
                ->inRandomOrder()
                ->get();
        return view('front.category', compact('categories','category','ads_banner'));
    }

    public function author()
    {
        
    }

    public function search()
    {
        
    }
}