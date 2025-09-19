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
        $oldAttachments = $record->attachment ?? [];
        $newAttachments = $data['attachment'] ?? [];
        $filesToDelete = array_diff($oldAttachments, $newAttachments);
        foreach ($filesToDelete as $path) {
            $publicId = substr($path, 0, strrpos($path, '.'));
            Cloudinary::uploadApi()->destroy($publicId, ['resource_type' => 'image']);
        }

        return $data;
    }
}
