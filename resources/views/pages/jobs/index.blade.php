@extends('layouts.app')

@section('title', 'Cari Lowongan Kerja')

@section('content')

@include('components.title-bar', ['title' => 'Lowongan Kerja'])

@include('pages.home.sections.ads')

@include('pages.jobs.sections.search-result')

@endsection
