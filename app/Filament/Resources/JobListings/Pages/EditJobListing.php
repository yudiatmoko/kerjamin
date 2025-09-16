<?php

namespace App\Filament\Resources\JobListings\Pages;

use App\Filament\Resources\JobListings\JobListingResource;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditJobListing extends EditRecord
{
    protected static string $resource = JobListingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $record = $this->getRecord();

        // Cek jika ada lampiran baru DAN lampiran lama ada
        if ($data['attachment'] !== $record->attachment && $record->attachment !== null) {
            $oldPath = $record->attachment;

            // ▼▼▼ LOGIKA PINTAR DIMULAI DI SINI ▼▼▼

            // 1. Cek ekstensi untuk menentukan tipe resource
            $extension = strtolower(pathinfo($oldPath, PATHINFO_EXTENSION));
            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $resourceType = in_array($extension, $imageExtensions) ? 'image' : 'raw';
            $publicId = $oldPath;
            if ($resourceType === 'image') {
                $publicId = substr($oldPath, 0, strrpos($oldPath, '.'));
            }
            Cloudinary::uploadApi()->destroy($publicId, ['resource_type' => $resourceType]);
        }

        return $data;
    }
}
