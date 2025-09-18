<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Company;
use App\Models\JobListing;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $activeJobsCount = JobListing::all()->where('is_active', true)->count();

        return [
            Stat::make('Total Lowongan', $activeJobsCount)
                ->description('Jumlah lowongan aktif')
                ->descriptionIcon('heroicon-o-check-badge')
                ->descriptionColor('success'),

            Stat::make('Total Perusahaan', Company::query()->count())
                ->description('Jumlah perusahaan terdaftar')
                ->descriptionIcon('heroicon-o-check-badge')
                ->descriptionColor('success'),

            Stat::make('Total Artikel', Blog::query()->count())
                ->description('Jumlah artikel terbit')
                ->descriptionIcon('heroicon-o-check-badge')
                ->descriptionColor('success'),
        ];
    }
}