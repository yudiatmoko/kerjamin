<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Perusahaan')
                    ->required(),
                FileUpload::make('logo')
                    ->label('Logo')
                    ->disk('cloudinary')
                    ->image()
                    ->maxSize(2048)
                    ->directory('kerjamin'),
                RichEditor::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('cloudinary')
                    ->fileAttachmentsDirectory('kerjamin')
                    ->fileAttachmentsVisibility('public'),
                TextInput::make('location')
                    ->label('Lokasi'),
                TextInput::make('website')
                    ->label('Website')
                    ->url(),
            ]);
    }
}
