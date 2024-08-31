<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Job extends Model
{
    use SoftDeletes;
    use HasFactory;


    protected $table = 'job_listings';
    protected $fillable = ['job', 'salary', 'slug', 'employer_id', 'image'];




    public function employer()
    {

        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    protected static function boot()
    {

        parent::boot();

        static::saving(function ($job) {
            $job->slug = Str::slug($job->job);
        });

        static::deleting(function ($job) {
            if ($job->image && Storage::exists('public/images/' . $job->image)) {
                Storage::delete('public/images/' . $job->image);
            }
        });

        static::updating(function ($job) {
            if ($job->isDirty('image')) {
                $oldImage = $job->getOriginal('image');
                if ($oldImage && Storage::exists('public/images/' . $oldImage)) {
                    Storage::delete('public/images/' . $oldImage);
                }
            }
        });
    }
}
