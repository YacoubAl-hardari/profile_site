<?php

namespace App\Filament\Resources\AddingScriptResource\Pages;

use App\Filament\Resources\AddingScriptResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAddingScripts extends ListRecords
{
    protected static string $resource = AddingScriptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
