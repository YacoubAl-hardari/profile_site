<?php

namespace App\Filament\Resources\GoogleAnalyticResource\Pages;

use App\Filament\Resources\GoogleAnalyticResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGoogleAnalytic extends CreateRecord
{
    protected static bool $canCreateAnother = false;
    protected static string $resource = GoogleAnalyticResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
