<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'content',
        'author_id'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    protected static function booted(): void
    {
        static::deleting(function (Blog $blog) {
            if ($blog->thumbnail) {
                $publicId = substr($blog->thumbnail, 0, strrpos($blog->thumbnail, '.'));
                Cloudinary::uploadApi()->destroy($publicId);
            }
        });
    }
}
