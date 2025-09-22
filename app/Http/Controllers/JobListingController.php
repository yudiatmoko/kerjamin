<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Education;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobListingController extends Controller
{
    public function index(Request $request): View
    {
        $jobs = $this->getFilteredJobs($request);
        $viewData = array_merge(
            $this->getSearchData(),
            ['jobs' => $jobs]
        );

        return view('pages.jobs.index', $viewData);
    }

    private function getFilteredJobs(Request $request)
    {
        $query = JobListing::query()->where('is_active', true);

        $query->when($request->keyword, function ($q, $keyword) {
            return $q->where(function ($subQuery) use ($keyword) {
                $subQuery->where('title', 'like', "%{$keyword}%")
                    ->orWhereHas('company', function ($companyQuery) use ($keyword) {
                        $companyQuery->where('name', 'like', "%{$keyword}%");
                    });
            });
        });

        $query->when($request->location, function ($q, $location) {
            return $q->where('location', 'like', "%{$location}%");
        });

        $query->when($request->education, function ($q, $educationSlug) {
            return $q->whereHas('education', function ($educationQuery) use ($educationSlug) {
                $educationQuery->where('slug', $educationSlug);
            });
        });

        $query->when($request->category, function ($q, $categorySlug) {
            return $q->whereHas('category', function ($categoryQuery) use ($categorySlug) {
                $categoryQuery->where('slug', $categorySlug);
            });
        });

        return $query->latest()->paginate(10);
    }

    private function getSearchData(): array
    {
        $educations = Education::orderBy('name')->get();
        $locations = JobListing::select('location')
            ->distinct()
            ->orderBy('location')
            ->pluck('location');

        return [
            'searchEducations' => $educations,
            'searchLocations' => $locations,
        ];
    }

    // public function show(JobListing $jobListing) { ... }
}

