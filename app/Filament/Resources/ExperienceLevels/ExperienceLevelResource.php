<?php

namespace App\Filament\Resources\ExperienceLevels;

use App\Filament\Resources\ExperienceLevels\Pages\CreateExperienceLevel;
use App\Filament\Resources\ExperienceLevels\Pages\EditExperienceLevel;
use App\Filament\Resources\ExperienceLevels\Pages\ListExperienceLevels;
use App\Filament\Resources\ExperienceLevels\Schemas\ExperienceLevelForm;
use App\Filament\Resources\ExperienceLevels\Tables\ExperienceLevelsTable;
use App\Models\ExperienceLevel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExperienceLevelResource extends Resource
{
    protected static ?string $model = ExperienceLevel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPresentationChartLine;

    protected static ?string $recordTitleAttribute = 'Tingkat Pengalaman';

    protected static ?string $modelLabel = 'Tingkat Pengalaman';

    protected static ?string $pluralModelLabel = 'Tingkat Pengalaman';

    public static function form(Schema $schema): Schema
    {
        return ExperienceLevelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExperienceLevelsTable::configure($table);
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
            'index' => ListExperienceLevels::route('/'),
            'create' => CreateExperienceLevel::route('/create'),
            'edit' => EditExperienceLevel::route('/{record}/edit'),
        ];
    }
}
