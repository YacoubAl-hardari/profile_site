<?php

namespace App\Filament\Resources\CategoryPortfolioResource\Pages;

use App\Filament\Resources\CategoryPortfolioResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategoryPortfolio extends CreateRecord
{
    protected static string $resource = CategoryPortfolioResource::class;
    
 use CreateRecord\Concerns\Translatable;
 
 protected function getHeaderActions(): array
 {
     return [
         Actions\LocaleSwitcher::make(),
         // ...
     ];
 }
 protected function getRedirectUrl(): string
 {
     return $this->getResource()::getUrl('index');
 }

}
