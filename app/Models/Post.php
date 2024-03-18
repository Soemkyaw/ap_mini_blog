<?php

namespace App\Models;

use App\Models\User;
use App\Mail\PostStored;
use App\Models\Category;
use App\Mail\PostDeleted;
use App\Mail\PostUpdated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','category_id','user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted(): void
    {
        // static::created(function ($post) {
        //     Mail::to('koko@gmail.com')->send(new PostStored($post));
        // });

        // static::updated(function ($updatePost) {
        //     Mail::to('koko@gmail.com')->send(new PostUpdated($updatePost));
        // });

        // static::deleted(function () {
        //     Mail::to('koko@gmail.com')->send(new PostDeleted());
        // });
    }
}
