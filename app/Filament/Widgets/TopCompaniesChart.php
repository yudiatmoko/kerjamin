<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use Filament\Widgets\ChartWidget;

class TopCompaniesChart extends ChartWidget
{
    protected ?string $heading = 'Perusahaan dengan Lowongan Terbanyak';


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
        $data = Company::withCount('jobListings')
            ->orderBy('job_listings_count', 'desc')
            ->limit(5)
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Lowongan',
                    'data' => $data->pluck('job_listings_count'),
                ],
            ],
            'labels' => $data->pluck('name'),
        ];
    }
}