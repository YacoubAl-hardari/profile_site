<?php

namespace App\Filament\Resources\EmailConfigurationResource\Pages;

use App\Filament\Resources\EmailConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmailConfiguration extends CreateRecord
{
    protected static bool $canCreateAnother = false;
    protected static string $resource = EmailConfigurationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
