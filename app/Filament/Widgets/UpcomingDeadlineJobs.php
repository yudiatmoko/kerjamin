<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\JobListings\JobListingResource;
use App\Models\JobListing;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UpcomingDeadlineJobs extends BaseWidget
{

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Lowongan Mendekati Tenggat Waktu')
            ->query(
                JobListing::query()
                    ->where('is_active', true)
                    ->whereBetween('deadline', [now(), now()->addDays(7)])
                    ->orderBy('deadline', 'asc')
            )
            ->columns([
                TextColumn::make('title')
                    ->label('Posisi'),

                TextColumn::make('company.name')
                    ->label('Perusahaan'),

                TextColumn::make('deadline')
                    ->label('Tenggat Waktu')
                    ->date('d-m-Y')
                    ->color('danger'),
            ])
            ->actions([
                EditAction::make('Edit')
                    ->url(fn(JobListing $record): string => JobListingResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}