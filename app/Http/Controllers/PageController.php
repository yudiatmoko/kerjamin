<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home.index');
    }

    public function jobs(): View
    {
        return view('pages.jobs.index');
    }

    public function blogs(): View
    {
        return view('pages.blogs.index');
    }

    public function about(): View
    {
        return view('pages.about.index');
    }
}
