<?php

namespace App\Filament\Resources\GoogleAnalyticResource\Pages;

use App\Filament\Resources\GoogleAnalyticResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGoogleAnalytic extends EditRecord
{
    protected static string $resource = GoogleAnalyticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
