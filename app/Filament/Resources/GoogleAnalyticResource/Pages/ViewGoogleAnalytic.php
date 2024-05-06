<?php

namespace App\Filament\Resources\GoogleAnalyticResource\Pages;

use App\Filament\Resources\GoogleAnalyticResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGoogleAnalytic extends ViewRecord
{
    protected static string $resource = GoogleAnalyticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
