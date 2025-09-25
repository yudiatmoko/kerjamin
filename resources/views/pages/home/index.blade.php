@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

@include('pages.home.sections.hero')

@include('pages.home.sections.latest-jobs', ['latestJobs' => $latestJobs])

@include('pages.home.sections.categories', ['categories' => $categories])

@include('pages.home.sections.ads')

@include('pages.home.sections.educations', ['jobsByEducation' => $jobsByEducation])

@include('pages.home.sections.blogs', ['latestBlogs' => $latestBlogs])

@endsection
