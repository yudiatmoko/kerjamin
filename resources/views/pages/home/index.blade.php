@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

@include('pages.home.section.hero')

@include('pages.home.section.latest-jobs', ['latestJobs' => $latestJobs])

@include('pages.home.section.categories', ['categories' => $categories])

@include('pages.home.section.ads')

@include('pages.home.section.educations', ['jobsByEducation' => $jobsByEducation])

@include('pages.home.section.blogs', ['latestBlogs' => $latestBlogs])

@endsection
