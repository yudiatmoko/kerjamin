<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DashboardStatsOverview;
use App\Filament\Widgets\JobsByCategoryChart;
use App\Filament\Widgets\JobsByEducationChart;
use App\Filament\Widgets\JobsByExperienceLevelChart;
use App\Filament\Widgets\JobsByJobTypeChart;
use App\Filament\Widgets\MostViewedJobsChart;
use App\Filament\Widgets\TopCompaniesChart;
use App\Filament\Widgets\UpcomingDeadlineJobs;
use Filament\Pages\Dashboard as BasePage;

class Dashboard extends BasePage
{
    public function getWidgets(): array
    {
        return [
            DashboardStatsOverview::class,
            UpcomingDeadlineJobs::class,
            MostViewedJobsChart::class,
            TopCompaniesChart::class,
            JobsByCategoryChart::class,
            JobsByEducationChart::class,
            JobsByExperienceLevelChart::class,
            JobsByJobTypeChart::class,
        ];
    }
}