<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'logo',
        'website'
    ];

    public function jobListings(): HasMany
    {
        return $this->hasMany(JobListing::class);
    }

    protected static function booted(): void
    {
        static::deleting(function (Company $company) {
            if ($company->logo) {
                $publicId = substr($company->logo, 0, strrpos($company->logo, '.'));
                Cloudinary::uploadApi()->destroy($publicId);
            }
        });
    }
}
