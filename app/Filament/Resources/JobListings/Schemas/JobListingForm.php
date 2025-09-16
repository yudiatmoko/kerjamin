<?php

namespace App\Filament\Resources\JobListings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
class JobListingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Posisi Lowongan')
                    ->required(),
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
                Select::make('job_type')
                    ->label('Jenis Pekerjaan')
                    ->options([
                        'Penuh Waktu' => 'Penuh Waktu',
                        'Paruh Waktu' => 'Paruh Waktu',
                        'Magang' => 'Magang',
                        'Kontrak' => 'Kontrak',
                    ])
                    ->required(),
                TextInput::make('location')
                    ->label('Lokasi')
                    ->required(),
                DatePicker::make('deadline')
                    ->label('Tenggat Waktu')
                    ->displayFormat('d-m-Y')
                    ->format('Y-m-d')
                    ->native(false)
                    ->placeholder('dd-mm-yyyy')
                    ->prefixIcon('heroicon-o-calendar-days')
                    ->closeOnDateSelection()
                    ->minDate(now()),
                TextInput::make('application_link')
                    ->label('Tautan Lamaran')
                    ->url()
                    ->required(),
                TextInput::make('attachment')
                    ->label('Tautan Lampiran')
                    ->helperText('Upload file ke GDrive, atur akses ke "Siapa saja yang memiliki link", lalu salin dan tempel linknya di sini.')
                    ->url(),
                Select::make('company_id')
                    ->label('Perusahaan')
                    ->relationship('company', 'name')
                    ->searchable()
                    ->required(),
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required(),
                Select::make('education_id')
                    ->label('Pendidikan Minimal')
                    ->relationship('education', 'name')
                    ->required(),
                Select::make('experience_level_id')
                    ->label('Tingkat Pengalaman')
                    ->relationship('experienceLevel', 'name')
                    ->required(),
                Toggle::make('is_active')
                    ->label('Status Aktif (Tampilkan Lowongan)')
                    ->default(true),
            ]);
    }
}