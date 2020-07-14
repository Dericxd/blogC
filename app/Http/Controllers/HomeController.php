<?php

namespace App\Http\Controllers;
use App\Category;
use App\Image;
use App\Post;
use App\Tag;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setLocale('es');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $images = Image::orderBy('id','desc')->paginate(6);
        $images->each(function ($image){
            $image->post;
        });

        $categories = Category::orderBy('name','ASC')->get();
        $tag = Tag::orderBy('name','ASC')->get();
        $post = Post::orderBy('id','desc')->get();

//        dd($categories);

        return view('dashboard')
            ->with('category', $categories)
            ->with('posts', $post)
            ->with('tags', $tag)
            ->with('image',$images);
    }
}
