<?php

namespace App\Filament\Resources\ClientReviewResource\Pages;

use App\Filament\Resources\ClientReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientReview extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ClientReviewResource::class;

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
