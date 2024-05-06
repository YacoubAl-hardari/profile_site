<?php

namespace App\Filament\Resources\AwardandRecognitionResource\Pages;

use App\Filament\Resources\AwardandRecognitionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAwardandRecognition extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = AwardandRecognitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
