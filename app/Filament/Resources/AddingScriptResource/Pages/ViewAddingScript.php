<?php

namespace App\Filament\Resources\AddingScriptResource\Pages;

use App\Filament\Resources\AddingScriptResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAddingScript extends ViewRecord
{
    protected static string $resource = AddingScriptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
