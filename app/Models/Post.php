<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'description', 'image', 'admin_id', 'category_id'];


    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            tags::class,
            'post_tags',
            'post_id',
            'tag_id',
            'id',
            'id'
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
{
 return $this->belongsTo(User::class);
}

}
