<?php

namespace App\Filament\Resources\JobListings\Schemas;

use App\Filament\Resources\Categories\CategoryResource;
use App\Filament\Resources\Companies\CompanyResource;
use App\Filament\Resources\Education\EducationResource;
use App\Filament\Resources\ExperienceLevels\ExperienceLevelResource;
use App\Filament\Resources\JobTypes\JobTypeResource;
use Filament\Actions\Action;
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
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->required()
                    ->suffixAction(
                        fn() => Action::make('create-company')
                            ->label('Tambah')
                            ->icon('heroicon-o-plus')
                            ->url(CompanyResource::getUrl('create'), shouldOpenInNewTab: true)
                    ),
                TextInput::make('location')
                    ->label('Lokasi')
                    ->required(),
                Select::make('job_type_id')
                    ->label('Jenis Pekerjaan')
                    ->relationship('jobType', 'name')
                    ->preload()
                    ->searchable()
                    ->required()
                    ->suffixAction(
                        fn() => Action::make('create-job-type')
                            ->label('Tambah')
                            ->icon('heroicon-o-plus')
                            ->url(JobTypeResource::getUrl('create'), shouldOpenInNewTab: true)
                    ),
                Select::make('education_id')
                    ->label('Pendidikan Minimal')
                    ->relationship('education', 'name')
                    ->preload()
                    ->searchable()
                    ->required()
                    ->suffixAction(
                        fn() => Action::make('create-education')
                            ->label('Tambah')
                            ->icon('heroicon-o-plus')
                            ->url(EducationResource::getUrl('create'), shouldOpenInNewTab: true)
                    ),
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
                    ->preload()
                    ->searchable()
                    ->required()
                    ->suffixAction(
                        fn() => Action::make('create-category')
                            ->label('Tambah')
                            ->icon('heroicon-o-plus')
                            ->url(CategoryResource::getUrl('create'), shouldOpenInNewTab: true)
                    ),
                Select::make('experience_level_id')
                    ->label('Tingkat Pengalaman')
                    ->relationship('experienceLevel', 'name')
                    ->preload()
                    ->searchable()
                    ->required()
                    ->suffixAction(
                        fn() => Action::make('create-experience-level')
                            ->label('Tambah')
                            ->icon('heroicon-o-plus')
                            ->url(ExperienceLevelResource::getUrl('create'), shouldOpenInNewTab: true)
                    ),
                TextInput::make('application_link')
                    ->label('Tautan Lamaran')
                    ->url()
                    ->required(),

                FileUpload::make('attachment')
                    ->label('Lampiran Gambar (Opsional)')
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->disk('cloudinary')
                    ->acceptedFileTypes(['image/*'])
                    ->directory('kerjamin')
                    ->maxSize(2048)
                    ->visibility('public')
                    ->columnSpanFull(),

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
