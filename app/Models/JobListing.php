<?php

namespace App\Models;

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


}
