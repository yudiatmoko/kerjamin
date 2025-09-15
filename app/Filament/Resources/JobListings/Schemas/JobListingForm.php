<?php

namespace App\Filament\Resources\JobListings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class JobListingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('qualification')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('job_type')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                DatePicker::make('deadline'),
                TextInput::make('application_link')
                    ->required(),
                TextInput::make('attachment'),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('views_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Select::make('education_id')
                    ->relationship('education', 'name')
                    ->required(),
                Select::make('experience_level_id')
                    ->relationship('experienceLevel', 'name')
                    ->required(),
            ]);
    }
}
