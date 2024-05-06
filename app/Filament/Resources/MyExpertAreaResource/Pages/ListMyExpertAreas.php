<?php

namespace App\Filament\Resources\MyExpertAreaResource\Pages;

use App\Filament\Resources\MyExpertAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMyExpertAreas extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = MyExpertAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
