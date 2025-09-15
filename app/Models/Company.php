<?php

namespace App\Models;

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
}
