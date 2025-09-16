<?php

namespace App\Filament\Resources\JobListings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;
use Hugomyb\FilamentMediaAction\Actions\MediaAction;
class JobListingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Posisi Lowongan')
                    ->required(),
                Select::make('company_id')
                    ->label('Perusahaan')
                    ->relationship('company', 'name')
                    ->searchable()
                    ->required(),
                TextInput::make('location')
                    ->label('Lokasi')
                    ->required(),
                Select::make('job_type')
                    ->label('Jenis Pekerjaan')
                    ->options([
                        'Penuh Waktu' => 'Penuh Waktu',
                        'Paruh Waktu' => 'Paruh Waktu',
                        'Magang' => 'Magang',
                        'Kontrak' => 'Kontrak',
                    ])
                    ->required(),
                Select::make('education_id')
                    ->label('Pendidikan Minimal')
                    ->relationship('education', 'name')
                    ->required(),
                DatePicker::make('deadline')
                    ->label('Tenggat Waktu')
                    ->displayFormat('d-m-Y')
                    ->format('Y-m-d')
                    ->native(false)
                    ->placeholder('dd-mm-yyyy')
                    ->prefixIcon('heroicon-o-calendar-days')
                    ->closeOnDateSelection()
                    ->minDate(today()),
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required(),
                Select::make('experience_level_id')
                    ->label('Tingkat Pengalaman')
                    ->relationship('experienceLevel', 'name')
                    ->required(),
                TextInput::make('application_link')
                    ->label('Tautan Lamaran')
                    ->url()
                    ->required(),
                Group::make()
                    ->schema([
                        FileUpload::make('attachment')
                            ->label('Lampiran (Opsional)')
                            ->disk('cloudinary')
                            ->acceptedFileTypes(['image/*', 'application/pdf'])
                            ->maxSize(2048)
                            ->directory('kerjamin')
                            ->visibility('public'),

                        MediaAction::make('attachment_viewer')
                            ->label('Lihat Lampiran Saat Ini')
                            ->icon('heroicon-o-document-magnifying-glass')
                            ->color('primary')
                            ->media(fn($record) => $record->url)
                            ->visible(fn($record) => $record
                                && $record->attachment
                                && str_ends_with(strtolower($record->attachment), '.pdf'))
                    ]),
                Toggle::make('is_active')
                    ->label('Status Aktif (Tampilkan Lowongan)')
                    ->default(true),
                RichEditor::make('description')
                    ->label('Deskripsi Pekerjaan')
                    ->required()
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('cloudinary')
                    ->fileAttachmentsDirectory('kerjamin')
                    ->fileAttachmentsVisibility('public'),

                RichEditor::make('qualification')
                    ->label('Kualifikasi')
                    ->required()
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('cloudinary')
                    ->fileAttachmentsDirectory('kerjamin')
                    ->fileAttachmentsVisibility('public'),
            ]);
    }
}
