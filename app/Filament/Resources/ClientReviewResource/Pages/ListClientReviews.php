<?php

namespace App\Filament\Resources\ClientReviewResource\Pages;

use App\Filament\Resources\ClientReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientReviews extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = ClientReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
