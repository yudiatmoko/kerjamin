@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

@include('pages.home.section.hero')

@include('pages.home.section.latest-job', ['latestJobs' => $latestJobs])

@include('pages.home.section.category', ['categories' => $categories])

@include('pages.home.section.ads')

@include('pages.home.section.education', ['jobsByEducation' => $jobsByEducation])

@endsection
