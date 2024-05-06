<?php

namespace App\Filament\Resources\GoogleRecaptchaResource\Pages;

use App\Filament\Resources\GoogleRecaptchaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGoogleRecaptcha extends EditRecord
{
    protected static string $resource = GoogleRecaptchaResource::class;

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
