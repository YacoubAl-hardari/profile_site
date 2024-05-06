<?php

namespace App\Filament\Resources\AddingScriptResource\Pages;

use App\Filament\Resources\AddingScriptResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAddingScript extends EditRecord
{
    protected static string $resource = AddingScriptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
