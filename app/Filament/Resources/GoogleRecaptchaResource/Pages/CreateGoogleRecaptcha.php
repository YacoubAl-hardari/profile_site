<?php

namespace App\Filament\Resources\GoogleRecaptchaResource\Pages;

use App\Filament\Resources\GoogleRecaptchaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGoogleRecaptcha extends CreateRecord
{
    protected static string $resource = GoogleRecaptchaResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
