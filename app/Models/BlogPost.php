<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $guarded = ['id'];

    public function blogtags()
    {
        return $this->belongsToMany(BlogTag::class, 'blog_posts_blog_tags', 'blog_post_id', 'blog_tag_id');
    }

    public function blogcategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
