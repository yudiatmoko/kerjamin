<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'qualification',
        'job_type',
        'location',
        'deadline',
        'application_link',
        'attachment',
        'is_active',
        'views_count',
        'company_id',
        'category_id',
        'education_id',
        'experience_level_id',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_active' => 'boolean'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function education(): BelongsTo
    {
        return $this->belongsTo(Education::class, 'education_id');
    }
    public function experienceLevel(): BelongsTo
    {
        return $this->belongsTo(ExperienceLevel::class, 'experience_level_id');
    }

    protected static function booted(): void
    {
        static::deleting(function (JobListing $jobListing) {
            if ($jobListing->attachment) {
                $path = $jobListing->attachment;
                $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $resourceType = in_array($extension, $imageExtensions) ? 'image' : 'raw';
                $publicId = $path;
                if ($resourceType === 'image') {
                    $publicId = substr($path, 0, strrpos($path, '.'));
                }
                Cloudinary::uploadApi()->destroy($publicId, ['resource_type' => $resourceType]);
            }
        });
    }

    public function getUrlAttribute(): ?string
    {
        return $this->attachment
            ? "https://res.cloudinary.com/" . env('CLOUDINARY_CLOUD_NAME') . "/raw/upload/{$this->attachment}" : null;
    }

    protected function isActive(): Attribute
    {
        return Attribute::make(
            get: fn() =>
            $this->attributes['is_active'] && now() <= $this->deadline?->endOfDay(),
        );
    }

}
