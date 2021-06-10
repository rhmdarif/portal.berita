<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VisitorActivity;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('pages.admin.dashboard');
    }

    public function get_data()
    {
        $visitor_count = Post::sum('visitor_count');
        $visitor_today = VisitorActivity::where('created_at', 'like', date("Y-m-d ")."%")->count();

        $post_count = Post::count();
        $post_today = Post::where('created_at', 'like', date("Y-m-d ")."%")->count();

        return ['visitor' => $visitor_count, 'visitor_today' => $visitor_today, 'post' => $post_count, 'post_today' => $post_today];
    }

    public function data_chart()
    {
        $visitor = VisitorActivity::where('created_at', '>=', date('Y-m-d', strtotime('-7 days',time())))->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        })->map(function($days) {
            return $days->count();
        })->toArray();
        $post = Post::where('created_at', '>=', date('Y-m-d', strtotime('-7 days',time())))->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        })->map(function($days) {
            return $days->count();
        })->toArray();

        $date_now = date("Y-m-d");
        for ($i=0; $i < 7; $i++) {
            $date = date('Y-m-d', strtotime('-'.$i.' days',strtotime($date_now)));
            $vis = $visitor[$date] ?? 0;
            $pos = $post[$date] ?? 0;

            $data[] = ['y' => $date, 'post'=> $pos, 'visitor' => $vis];
        }

        return $data;
    }
}
