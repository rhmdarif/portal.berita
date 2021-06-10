<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'thumbnail', 'image', 'author', 'content', 'sort_content', 'category_id', 'visitor_count', 'url', 'tags'];

    /**
     * Get the user associated with the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->withTrashed();
    }
    /**
     * Get the user associated with the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'author')->withTrashed();
    }
}
