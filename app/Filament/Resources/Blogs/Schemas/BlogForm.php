<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

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
                    ->directory('kerjamin')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '4:3',
                        '16:9',
                    ]),
                RichEditor::make('content')
                    ->label('Isi Artikel')
                    ->required()
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('cloudinary')
                    ->fileAttachmentsDirectory('kerjamin')
                    ->fileAttachmentsVisibility('public'),

                Select::make('author_id')
                    ->label('Penulis')
                    ->relationship('author', 'name')
                    ->required(),
            ]);
    }
}
