<?php

namespace App\Filament\Resources\Blogs\Pages;

use App\Filament\Resources\Blogs\BlogResource;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $blog = $this->getRecord();

        if ($data['thumbnail'] !== $blog->thumbnail && $blog->thumbnail !== null) {

            $oldPath = $blog->thumbnail;
            $publicId = substr($oldPath, 0, strrpos($oldPath, '.'));
            Cloudinary::uploadApi()->destroy($publicId);
        }

        return $data;
    }
}
