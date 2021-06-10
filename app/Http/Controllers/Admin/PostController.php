<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->has('search')) {
            $posts = Post::where('title', 'like', "%".$request->search."%")->orderBy('id', 'desc')->paginate(10);
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(10);
        }

        return view('pages.admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('pages.admin.post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'category' => 'required|exists:categories,id',
            'artikel' => 'required|string',
            'tags' => 'nullable|string',
            'thumbnail' => 'required|image',
            'image' => 'required|image',
        ]);

        if($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $user_id = auth()->user()->id;
        $url = $user_id."-".date('Ymd')."-".str_replace(" ", '-', preg_replace("/[^A-Za-z\ ]/", '', $request->title));

        $post = Post::where('url', $url)->count();
        if($post > 0) {
            return back()->with('error', 'Judul artikel telah terdaftar');
        }

        $base_storage = "/storage/";
        $thumbnail_extension = $request->file('thumbnail')->extension();
        $thumbnail_path = $request->file('thumbnail')->storeAs(
        'thumbnail',
        $url.".".$thumbnail_extension,
        'public'
        );

        $image_extension = $request->file('image')->extension();
        $image_path = $request->file('image')->storeAs(
        'image',
        $url.".".$image_extension,
        'public'
        );

        Post::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'author' => $user_id,
            'content' => $request->artikel,
            'sort_content' => substr($request->artikel, 0, 200),
            'thumbnail' => $base_storage.$thumbnail_path,
            'image' => $base_storage.$image_path,
            'url' => $url,
            'tags' => $request->tags ?? ""
        ]);
        return back()->with('success', 'Artikel berhasil diterbitkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();
        return view('pages.admin.post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'category' => 'required|exists:categories,id',
            'artikel' => 'required|string',
            'tags' => 'nullable|string',
            'thumbnail' => 'nullable|image',
            'image' => 'nullable|image',
        ]);

        if($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $user_id = auth()->user()->id;
        $url = $user_id."-".date('Ymd')."-".str_replace(" ", '-', preg_replace("/[^A-Za-z\ ]/", '', $request->title));

        $post_count = Post::where('url', $url)->count();
        if($post_count > 0) {
            return back()->with('error', 'Judul artikel telah terdaftar');
        }

        $base_storage = "/storage/";

        $update = [
            'title' => $request->title,
            'category_id' => $request->category,
            'author' => $user_id,
            'content' => $request->artikel,
            'sort_content' => substr($request->artikel, 0, 200),
            'url' => $url,
            'tags' => $request->tags ?? ""
        ];
        if($request->has('thumbnail')) {
            $thumbnail_extension = $request->file('thumbnail')->extension();
            $thumbnail_path = $request->file('thumbnail')->storeAs(
            'thumbnail',
            $url.".".$thumbnail_extension,
            'public'
            );

            $update['thumbnail'] = $base_storage.$thumbnail_path;
        }
        if($request->has('image')) {
            $image_extension = $request->file('image')->extension();
            $image_path = $request->file('image')->storeAs(
                                'image',
                                $url.".".$image_extension,
                                'public'
                            );
            $update['image'] = $base_storage.$image_path;
        }

        $post->update($update);
        return back()->with('success', 'Artikel berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return ['status' => true, 'msg' => "Artikel berhasil dihapus"];
    }
}
