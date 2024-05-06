<?php

namespace App\Filament\Resources\GoogleAnalyticResource\Pages;

use App\Filament\Resources\GoogleAnalyticResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGoogleAnalytics extends ListRecords
{
    protected static string $resource = GoogleAnalyticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
