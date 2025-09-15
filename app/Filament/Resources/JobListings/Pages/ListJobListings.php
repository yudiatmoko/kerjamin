<?php

namespace App\Filament\Resources\JobListings\Pages;

use App\Filament\Resources\JobListings\JobListingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJobListings extends ListRecords
{
    protected static string $resource = JobListingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
