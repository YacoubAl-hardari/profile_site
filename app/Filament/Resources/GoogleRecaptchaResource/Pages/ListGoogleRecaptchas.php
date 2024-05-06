<?php

namespace App\Filament\Resources\GoogleRecaptchaResource\Pages;

use App\Filament\Resources\GoogleRecaptchaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGoogleRecaptchas extends ListRecords
{
    protected static string $resource = GoogleRecaptchaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
