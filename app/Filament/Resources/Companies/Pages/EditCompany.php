<?php

namespace App\Filament\Resources\Companies\Pages;

use App\Filament\Resources\Companies\CompanyResource;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCompany extends EditRecord
{
    protected static string $resource = CompanyResource::class;

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
        $company = $this->getRecord();

        if ($data['logo'] !== $company->logo && $company->logo !== null) {

            $oldPath = $company->logo;
            $publicId = substr($oldPath, 0, strrpos($oldPath, '.'));
            Cloudinary::uploadApi()->destroy($publicId);
        }

        return $data;
    }
}
