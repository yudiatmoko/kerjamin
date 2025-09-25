<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Education;
use App\Models\ExperienceLevel;
use App\Models\JobListing;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobListingController extends Controller
{
    public function index(Request $request): View
    {
        $jobs = $this->getFilteredJobs($request);

        $viewData = array_merge(
            $this->getFilterData(),
            ['jobs' => $jobs]
        );

        return view('pages.jobs.index', $viewData);
    }

    private function getFilteredJobs(Request $request)
    {
        $query = JobListing::query()->where('is_active', true);

        $query->when($request->keyword, function ($q, $keyword) {
            $q->where(function ($subQuery) use ($keyword) {
                $subQuery->where('title', 'like', "%{$keyword}%")
                    ->orWhereHas(
                        'company',
                        fn($companyQuery) =>
                        $companyQuery->where('name', 'like', "%{$keyword}%")
                    );
            });
        });

        $query->when(
            $request->location,
            fn($q, $loc) =>
            $q->where('location', 'like', "%{$loc}%")
        );

        $query->when($request->filled('category') || $request->filled('categories'), function ($q) use ($request) {
            $categories = (array) ($request->category ?? $request->categories);
            $q->whereHas('category', fn($query) => $query->whereIn('slug', $categories));
        });

        $query->when($request->filled('job_type') || $request->filled('job_types'), function ($q) use ($request) {
            $jobTypes = (array) ($request->job_type ?? $request->job_types);
            $q->whereHas('jobType', fn($query) => $query->whereIn('slug', $jobTypes));
        });

        $query->when($request->filled('experience') || $request->filled('experiences'), function ($q) use ($request) {
            $experiences = (array) ($request->experience ?? $request->experiences);
            $q->whereHas('experienceLevel', fn($query) => $query->whereIn('slug', $experiences));
        });

        $query->when($request->filled('education') || $request->filled('educations'), function ($q) use ($request) {
            $educations = (array) ($request->education ?? $request->educations);
            $q->whereHas('education', fn($query) => $query->whereIn('slug', $educations));
        });

        return $query->latest()->paginate(10);
    }

    private function getFilterData(): array
    {
        $categories = Category::withCount(['jobListings' => fn($q) => $q->where('is_active', true)])
            ->orderBy('job_listings_count', 'desc')
            ->get();

        $jobTypes = JobType::withCount(['jobListings' => fn($q) => $q->where('is_active', true)])
            ->orderBy('job_listings_count', 'desc')
            ->get();

        $experienceOrder = ['fresh-graduate', '0-1-tahun', '1-3-tahun', '3-5-tahun', 'lebih-dari-5-tahun'];
        $experiences = ExperienceLevel::withCount(['jobListings' => fn($q) => $q->where('is_active', true)])
            ->get()
            ->sortBy(fn($level) => array_search($level->slug, $experienceOrder));

        $educationOrder = ['sma-smk-sederajat', 'diploma-d3', 'sarjana-s1', 'magister-s2', 'doktor-s3'];
        $educations = Education::withCount(['jobListings' => fn($q) => $q->where('is_active', true)])
            ->get()
            ->sortBy(fn($edu) => array_search($edu->slug, $educationOrder));

        $locations = JobListing::select('location')
            ->distinct()
            ->orderBy('location')
            ->pluck('location');

        return compact('categories', 'jobTypes', 'experiences', 'educations', 'locations');
    }
}
