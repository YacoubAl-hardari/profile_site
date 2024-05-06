<?php

namespace App\Filament\Resources\ClientReviewResource\Pages;

use App\Filament\Resources\ClientReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClientReview extends CreateRecord
{
    protected static string $resource = ClientReviewResource::class;
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
