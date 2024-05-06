<?php

namespace App\Filament\Resources\MyExpertAreaResource\Pages;

use App\Filament\Resources\MyExpertAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMyExpertArea extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = MyExpertAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
