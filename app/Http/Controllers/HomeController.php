<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    private function getSearchData(): array
    {
        $categories = Category::orderBy('name')->get();
        $locations = JobListing::select('location')
            ->distinct()
            ->orderBy('location')
            ->pluck('location');

        return [
            'searchCategories' => $categories,
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
            ->orderBy('name')
            ->get();

        $viewData = array_merge(
            $this->getSearchData(),
            ['latestJobs' => $latestJobs],
            ['categories' => $categories],
        );

        return view('pages.home.index', $viewData);

        // return view('pages.home.index', $this->getSearchData());
    }
}
