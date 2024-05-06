<?php

namespace App\Filament\Resources\CategoryPortfolioResource\Pages;

use App\Filament\Resources\CategoryPortfolioResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategoryPortfolio extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = CategoryPortfolioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
