<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    //
    public function index($url_post)
    {
        $post = Post::where('url', $url_post)->first();
        if($post == null) {
            return redirect('/');
        }

        // return $post;
        return view('pages.read', ['post' => $post]);
    }
}
