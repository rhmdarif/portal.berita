<?php

namespace App\Http\Middleware;

use App\Models\Post;
use App\Models\Visitor as ModelsVisitor;
use App\Models\VisitorActivity;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class Visitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userAgent = $request->server('HTTP_USER_AGENT');
        $ip = $request->ip();

        $visitor = ModelsVisitor::firstOrCreate([
            'user_agent' => $userAgent,
            'ip_address' => $ip,
        ]);

        if($request->route()->uri == "{url_post}") {
            $post = Post::where('url', $request->route('url_post'))->first();
            if($post != null) {
                $post->update([
                    'visitor_count' => $post['visitor_count']+1
                ]);

                VisitorActivity::create([
                    'post_id' => $post->id,
                    'visitor_id' => $visitor->id
                ]);
            }
        }

        return $next($request);
    }
}
