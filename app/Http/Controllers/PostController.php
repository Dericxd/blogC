<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
//        $post->each(function ($post){
//            $post->category;
//        });
        $images = Image::all();
//        $images->each(function ($img){
//            $img->post;
//        });

        return view('admin.post.index')
            ->with('image', $images)
            ->with('posts', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->pluck('name', 'id');
        $tags = Tag::orderBy('id', 'desc')->pluck('name', 'id');

        return view('admin.post.create')
            ->with('category', $categories)
            ->with('tag', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('name')) {
            $file = $request->file('name');
            $name = 'post_' . $request->title . '_' . Auth::user()->name . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/img/post/';
            $file->move($path, $name);
        }

        $post = new Post($request->all());
        $post->user_id = Auth::user()->id;
//        $post->status = $request->status;
//        dd($post);
        $post->save();

        $post->tags()->sync($request->tags);

        $img = new Image();
        $img->name = $name;
        $img->post()->associate($post);
        $img->save();

        if ($post->status == 'publicado') {
            flash('La publicacion ' . $post->title . ' a sido creada y publicada')->success()->important();
        } elseif ($post->status == 'borrador') {
            flash('La publicacion ' . $post->title . ' se a creado y esta como borrador')->info()->important();
        } else {
            flash('La publicacion ' . $post->title . ' se a creado y esta inactiva')->warning()->important();
        }

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.post.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        $categories = Category::orderBy('id', 'desc')->pluck('name', 'id');
        $tags = Tag::orderBy('id', 'desc')->pluck('name', 'id');
        $image = Image::all();

        $my_tags = $posts->tags->pluck('id')->toArray();

//        dd($my_tag);

        return view('admin.post.edit')
            ->with('image', $image)
            ->with('post', $posts)
            ->with('category', $categories)
            ->with('tag', $tags)
            ->with('myTag', $my_tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->all());

//        dd($post,$img);
        if ($request->file('name') != null) {
            if ($request->file('name')) {
                $file = $request->file('name');
                $name = 'post_' . $request->title . '_' . Auth::user()->name . '_' . time() . '.' . $file->getClientOriginalExtension();
                $path = public_path() . '/img/post/';
                $file->move($path, $name);
            }

            $images = Image::all();
            foreach ($images as $image) {
                if ($post->id == $image->post_id) {
                    $img = Image::find($image->id);
                    $img->name = $name;
//                    $img->post()->associate($post);
                    $img->save();

                }
            }

        }

        $post->save();

        $post->tags()->sync($request->tags);

        if ($post->status == 'publicado') {
            flash('La publicacion ' . $post->title . ' a sido modificado y publicado')->success()->important();
        } elseif ($post->status == 'borrador') {
            flash('La publicacion ' . $post->title . ' se a modificado y se encuentra como borrador')->info()->important();
        } else {
            flash('La publicacion ' . $post->title . ' se a modificado y esta inactiva')->warning()->important();
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        flash('Borrada la publicacion')->error()->important();

        return redirect()->route('posts.index');
    }
}
