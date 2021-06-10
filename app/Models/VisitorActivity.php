<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorActivity extends Model
{
    use HasFactory;
    protected $fillable = ['visitor_id', 'post_id'];
}
