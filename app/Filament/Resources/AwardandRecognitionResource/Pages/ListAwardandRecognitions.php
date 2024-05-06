<?php

namespace App\Filament\Resources\AwardandRecognitionResource\Pages;

use App\Filament\Resources\AwardandRecognitionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAwardandRecognitions extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = AwardandRecognitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
