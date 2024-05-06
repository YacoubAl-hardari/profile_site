<?php

namespace App\Filament\Resources\CategoryBlogResource\Pages;

use App\Filament\Resources\CategoryBlogResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategoryBlog extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = CategoryBlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
