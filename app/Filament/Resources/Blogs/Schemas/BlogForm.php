<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; // <-- IMPORT INI
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Artikel')
                    ->required(),
                TextInput::make('slug')
                    ->label('Slug (untuk URL)')
                    ->required(),

                FileUpload::make('thumbnail')
                    ->label('Gambar Thumbnail')
                    ->disk('cloudinary')
                    ->image()
                    ->maxSize(2048)
                    ->directory('kerjamin'),

                RichEditor::make('content')
                    ->label('Isi Artikel')
                    ->required()
                    ->columnSpanFull(),
                Select::make('author_id')
                    ->label('Penulis')
                    ->relationship('author', 'name')
                    ->required(),
            ]);
    }
}
