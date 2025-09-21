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
        return view('pages.home.index', $this->getSearchData());
    }
}
