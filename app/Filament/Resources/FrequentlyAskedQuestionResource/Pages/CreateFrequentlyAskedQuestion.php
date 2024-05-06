<?php

namespace App\Filament\Resources\FrequentlyAskedQuestionResource\Pages;

use App\Filament\Resources\FrequentlyAskedQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFrequentlyAskedQuestion extends CreateRecord
{
    protected static string $resource = FrequentlyAskedQuestionResource::class;
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
