<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;

    protected $casts = [
        'is_open' => 'boolean',
        'body' => 'collection',
    ];

    protected $guarded = [];

    protected static function booted()
    {
        static::deleting(function ($blog) {
            // $blog->comments()->delete();
            // $blog->comments->each(function ($comment) {
            //     $comment->delete();
            // });
            $blog->deletePictFile();
            $blog->comments->each->delete();
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('pict') && $blog->getOriginal('pict')) {
                $blog->deletePictFile();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name' => '退会者']);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->oldest();
    }

    public function scopeOnlyOpen($query)
    {
        return $query->where('is_open', true);
    }

    public function deletePictFile()
    {
        if ($path = $this->getOriginal('pict')) {
            Storage::disk('public')->delete($path);
        }
    }
}
