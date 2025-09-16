<?php

namespace App\Filament\Resources\ExperienceLevels\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExperienceLevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('slug')
                    ->label('Slug (untuk URL)')
                    ->required(),
            ]);
    }
}
