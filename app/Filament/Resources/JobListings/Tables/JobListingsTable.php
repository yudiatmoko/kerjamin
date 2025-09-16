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
                TextColumn::make('job_type')
                    ->label('Jenis Pekerjaan')
                    ->searchable(),
                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable(),
                TextColumn::make('deadline')
                    ->label(label: 'Tenggat Waktu')
                    ->date('d-m-Y')
                    ->sortable(),
                TextColumn::make('application_link')
                    ->label('Tautan Lamaran')
                    ->icon(fn(?string $state): ?string => $state ? 'heroicon-o-link' : null)
                    ->color('primary')
                    ->url(fn(?string $state): ?string => $state)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn(?string $state): string => $state ? 'Kunjungi Tautan' : '-')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('attachment')
                    ->label('Tautan Lampiran')
                    ->icon(fn(?string $state): ?string => $state ? 'heroicon-o-link' : null)
                    ->color('primary')
                    ->url(fn(?string $state): ?string => $state)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn(?string $state): string => $state ? 'Buka Lampiran' : '-')
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
                TextColumn::make('views_count')
                    ->label('Jumlah Dilihat')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('company.name')
                    ->label('Nama Perusahaan')
                    ->searchable(),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('education.name')
                    ->label('Pendidikan')
                    ->searchable(),
                TextColumn::make('experienceLevel.name')
                    ->label('Tingkat Pengalaman')
                    ->searchable()
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
