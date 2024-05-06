<?php

namespace App\Filament\Resources\FrequentlyAskedQuestionResource\Pages;

use App\Filament\Resources\FrequentlyAskedQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFrequentlyAskedQuestion extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;   
    protected static string $resource = FrequentlyAskedQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
