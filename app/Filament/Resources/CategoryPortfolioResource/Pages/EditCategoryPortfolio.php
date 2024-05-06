<?php

namespace App\Filament\Resources\CategoryPortfolioResource\Pages;

use App\Filament\Resources\CategoryPortfolioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryPortfolio extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = CategoryPortfolioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
