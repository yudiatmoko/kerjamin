<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobListingController extends Controller
{
    /**
     * Menampilkan halaman daftar lowongan kerja (dengan filter).
     */
    public function index(Request $request): View
    {
        // Panggil method private untuk mendapatkan data lowongan yang sudah difilter
        $jobs = $this->getFilteredJobs($request);

        // Gabungkan data hasil pencarian dengan data untuk search bar
        $viewData = array_merge(
            $this->getSearchData(),
            ['jobs' => $jobs]
        );

        return view('pages.jobs.index', $viewData);
    }

    /**
     * Method private untuk menampung semua logika query pencarian.
     */
    private function getFilteredJobs(Request $request)
    {
        $query = JobListing::query()->where('is_active', true);

        // Terapkan filter jika ada input 'keyword'
        $query->when($request->keyword, function ($q, $keyword) {
            return $q->where(function ($subQuery) use ($keyword) {
                $subQuery->where('title', 'like', "%{$keyword}%")
                    ->orWhereHas('company', function ($companyQuery) use ($keyword) {
                        $companyQuery->where('name', 'like', "%{$keyword}%");
                    });
            });
        });

        // Terapkan filter jika ada input 'location'
        $query->when($request->location, function ($q, $location) {
            return $q->where('location', 'like', "%{$location}%");
        });

        // Terapkan filter jika ada input 'category'
        $query->when($request->category, function ($q, $categorySlug) {
            return $q->whereHas('category', function ($categoryQuery) use ($categorySlug) {
                $categoryQuery->where('slug', $categorySlug);
            });
        });

        // Ambil hasil, urutkan dari yang terbaru, dan tambahkan paginasi
        return $query->latest()->paginate(10);
    }

    /**
     * Mengambil data untuk search bar.
     */
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

    // Nanti Anda bisa menambahkan method show() di sini untuk detail loker
    // public function show(JobListing $jobListing) { ... }
}

