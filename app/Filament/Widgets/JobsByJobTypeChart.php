<?php

namespace App\Filament\Widgets;

use App\Models\JobType;
use Filament\Widgets\ChartWidget;

class JobsByJobTypeChart extends ChartWidget
{
    protected ?string $heading = 'Sebaran Lowongan per Tipe Pekerjaan';

    protected ?string $maxHeight = '300px';

    protected int|string|array $columnSpan = 1;

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getData(): array
    {
        $data = JobType::withCount('jobListings')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Lowongan',
                    'data' => $data->pluck('job_listings_count'),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                    ],
                ],
            ],
            'labels' => $data->pluck('name'),
        ];
    }
}