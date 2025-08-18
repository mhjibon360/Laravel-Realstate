<?php

namespace App\Models;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $guarded = ['id'];

    public function blogposts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_posts_blog_tags', 'blog_tag_id', 'blog_post_id');
    }
}
