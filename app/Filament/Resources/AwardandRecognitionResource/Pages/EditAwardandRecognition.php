<?php

namespace App\Filament\Resources\AwardandRecognitionResource\Pages;

use App\Filament\Resources\AwardandRecognitionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAwardandRecognition extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = AwardandRecognitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
