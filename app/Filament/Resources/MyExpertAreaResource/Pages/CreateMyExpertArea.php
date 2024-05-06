<?php

namespace App\Filament\Resources\MyExpertAreaResource\Pages;

use App\Filament\Resources\MyExpertAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMyExpertArea extends CreateRecord
{
    protected static string $resource = MyExpertAreaResource::class;
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
