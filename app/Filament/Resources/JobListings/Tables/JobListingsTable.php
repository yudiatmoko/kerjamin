<?php

namespace App\Filament\Resources\JobListings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class JobListingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Posisi Lowongan')
                    ->searchable(),
                TextColumn::make('company.name')
                    ->label('Nama Perusahaan')
                    ->searchable(),
                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable(),
                TextColumn::make('job_type')
                    ->label('Jenis Pekerjaan')
                    ->searchable(),
                TextColumn::make('education.name')
                    ->label('Pendidikan')
                    ->searchable(),
                TextColumn::make('deadline')
                    ->label(label: 'Tenggat Waktu')
                    ->date('d-m-Y')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('experienceLevel.name')
                    ->label('Tingkat Pengalaman')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('application_link')
                    ->label('Tautan Lamaran')
                    ->icon(fn(?string $state): ?string => $state ? 'heroicon-o-link' : null)
                    ->color('primary')
                    ->url(fn(?string $state): ?string => $state)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn(?string $state): string => $state ? 'Kunjungi Tautan' : '-')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('attachment')
                    ->label('Lampiran')
                    ->url(
                        fn(?string $state): ?string =>
                        $state ? "https://res.cloudinary.com/" . env('CLOUDINARY_CLOUD_NAME') . "/raw/upload/{$state}" : null
                    )
                    ->icon(fn(?string $state): ?string => $state ? 'heroicon-o-link' : null)
                    ->color('primary')
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn($state) => $state ? 'Lihat/Unduh File' : '-')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('views_count')
                    ->label('Jumlah Dilihat')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Tanggal Diperbaharui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
