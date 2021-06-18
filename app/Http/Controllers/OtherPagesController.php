<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherPagesController extends Controller
{
    //
    public function author()
    {
        return view('pages.author');
    }
}
