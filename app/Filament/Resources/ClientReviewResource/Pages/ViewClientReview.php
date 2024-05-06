<?php

namespace App\Filament\Resources\ClientReviewResource\Pages;

use App\Filament\Resources\ClientReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClientReview extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = ClientReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
