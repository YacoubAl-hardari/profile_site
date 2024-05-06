<?php

namespace App\Filament\Resources\CategoryBlogResource\Pages;

use App\Filament\Resources\CategoryBlogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryBlog extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = CategoryBlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
