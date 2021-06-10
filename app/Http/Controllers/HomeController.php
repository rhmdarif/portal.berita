<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('pages.home');
    }
}
