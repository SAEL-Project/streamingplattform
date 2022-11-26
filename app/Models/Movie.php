<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function relativeThumbnailURL()
    {
        $category = $this->category()->first();
        return "/assets/thumbnails/" . "$category->id" . "-" . $this->id . ".png";
    }

    public function relativeVideoURL()
    {
        $category = $this->category()->first();
        return "/assets/videos/" . "$category->id" . "-" . $this->id . ".mp4";
    }

    public function absoluteThumbnailURL()
    {
        return public_path($this->relativeThumbnailURL());
    }

    public function absoluteVideoURL()
    {
        return public_path($this->relativeVideoURL());
    }

    public function like(User $user)
    {
        return $this->hasOne(Like::class)->where("user_id", $user->id);
    }
}
