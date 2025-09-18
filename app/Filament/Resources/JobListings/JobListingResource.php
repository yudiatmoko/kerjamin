<?php

namespace App\Filament\Resources\JobListings;

use App\Filament\Resources\JobListings\Pages\CreateJobListing;
use App\Filament\Resources\JobListings\Pages\EditJobListing;
use App\Filament\Resources\JobListings\Pages\ListJobListings;
use App\Filament\Resources\JobListings\Schemas\JobListingForm;
use App\Filament\Resources\JobListings\Tables\JobListingsTable;
use App\Models\JobListing;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class JobListingResource extends Resource
{
    protected static ?string $model = JobListing::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static ?string $recordTitleAttribute = 'Lowongan Kerja';

    protected static ?string $modelLabel = 'Lowongan Kerja';

    protected static ?string $pluralModelLabel = 'Lowongan Kerja';

    protected static ?int $navigationSort = 6;

    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->title;
    }

    public static function form(Schema $schema): Schema
    {
        return JobListingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JobListingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJobListings::route('/'),
            'create' => CreateJobListing::route('/create'),
            'edit' => EditJobListing::route('/{record}/edit'),
        ];
    }
}
