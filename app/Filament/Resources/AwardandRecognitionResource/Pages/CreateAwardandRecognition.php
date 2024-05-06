<?php

namespace App\Filament\Resources\AwardandRecognitionResource\Pages;

use App\Filament\Resources\AwardandRecognitionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAwardandRecognition extends CreateRecord
{
    protected static string $resource = AwardandRecognitionResource::class;

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
