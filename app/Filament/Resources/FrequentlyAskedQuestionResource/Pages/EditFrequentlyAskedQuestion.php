<?php

namespace App\Filament\Resources\FrequentlyAskedQuestionResource\Pages;

use App\Filament\Resources\FrequentlyAskedQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFrequentlyAskedQuestion extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = FrequentlyAskedQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
