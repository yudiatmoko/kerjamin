<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Education;
use App\Models\JobListing;
use Illuminate\View\View;

class HomeController extends Controller
{
    private function getSearchData(): array
    {
        $educations = Education::orderByRaw("
            CASE name
                WHEN 'SMA/SMK Sederajat' THEN 1
                WHEN 'Diploma (D3)' THEN 2
                WHEN 'Sarjana (S1)' THEN 3
                WHEN 'Magister (S2)' THEN 4
                WHEN 'Doktor (S3)' THEN 5
                ELSE 6
            END
        ")->get();

        $locations = JobListing::select('location')
            ->distinct()
            ->orderBy('location')
            ->pluck('location');

        return [
            'searchEducations' => $educations,
            'searchLocations' => $locations,
        ];
    }

    public function index(): View
    {

        $latestJobs = JobListing::with(['company', 'category', 'jobType', 'education'])
            ->where('is_active', true)
            ->latest()
            ->take(10)
            ->get();

        $categories = Category::withCount('jobListings')
            ->whereHas('jobListings', function ($query) {
                $query->where('is_active', true);
            })
            ->orderBy('job_listings_count', 'desc')
            ->get();

        $educationLevels = Education::orderByRaw("
            CASE name
                WHEN 'SMA/SMK Sederajat' THEN 1
                WHEN 'Diploma (D3)' THEN 2
                WHEN 'Sarjana (S1)' THEN 3
                WHEN 'Magister (S2)' THEN 4
                WHEN 'Doktor (S3)' THEN 5
                ELSE 6
            END
        ")->get();

        $jobsByEducation = collect();

        foreach ($educationLevels as $level) {
            $jobs = $level->jobListings()
                ->with(['company', 'category', 'jobType', 'education'])
                ->where('is_active', true)
                ->latest()
                ->take(5)
                ->get();


            if ($jobs->isNotEmpty()) {
                $jobsByEducation->push([
                    'name' => $level->name,
                    'slug' => $level->slug,
                    'jobs' => $jobs,
                ]);
            }
        }

        $latestBlogs = Blog::latest()->take(2)->get();

        $viewData = array_merge(
            $this->getSearchData(),
            ['latestJobs' => $latestJobs],
            ['categories' => $categories],
            ['jobsByEducation' => $jobsByEducation],
            ['latestBlogs' => $latestBlogs],

        );

        return view('pages.home.index', $viewData);

        // return view('pages.home.index', $this->getSearchData());
    }
}
