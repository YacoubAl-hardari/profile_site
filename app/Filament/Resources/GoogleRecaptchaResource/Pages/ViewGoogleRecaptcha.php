<?php

namespace App\Filament\Resources\GoogleRecaptchaResource\Pages;

use App\Filament\Resources\GoogleRecaptchaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGoogleRecaptcha extends ViewRecord
{
    protected static string $resource = GoogleRecaptchaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
