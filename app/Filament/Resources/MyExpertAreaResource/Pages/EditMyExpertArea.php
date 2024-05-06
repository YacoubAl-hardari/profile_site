<?php

namespace App\Filament\Resources\MyExpertAreaResource\Pages;

use App\Filament\Resources\MyExpertAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyExpertArea extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = MyExpertAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
