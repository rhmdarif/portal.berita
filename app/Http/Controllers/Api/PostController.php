<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getTrandingNow()
    {
        $post = Post::select("title", "url")->orderBy("id", "desc")->limit(5)->get();
        return $post;
    }

    public function getTop()
    {
        $post = Post::select("title", "url", "thumbnail", "image", "category_id")->orderBy("id", "desc")->with(['category'])->limit(10)->get();
        return $post;
    }

    public function getByCategory($category, $paginate=4)
    {
        if($category != 'all') {
            return Post::where('category_id', $category)->orderBy("id", "desc")->with(['category'])->cursorPaginate($paginate);
        } else {
            return Post::orderBy("id", "desc")->with(['category'])->cursorPaginate($paginate);
        }
    }

    public function getByCategoryPaginate($category)
    {
        $post_count = Post::where('category_id', $category)->count();

    }

}
