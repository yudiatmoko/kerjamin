<?php

namespace App\Filament\Widgets;

use App\Models\JobListing;
use Filament\Widgets\ChartWidget;

class MostViewedJobsChart extends ChartWidget
{
    protected ?string $heading = 'Lowongan Paling Banyak Dilihat';


    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
        ];
    }

    protected function getData(): array
    {
        $data = JobListing::with('company')
            ->orderBy('views_count', 'desc')
            ->limit(5)
            ->get();

        $labels = $data->map(fn(JobListing $job) => "{$job->title} di {$job->company->name}");

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Dilihat',
                    'data' => $data->pluck('views_count'),
                ],
            ],
            'labels' => $labels,
        ];
    }
}