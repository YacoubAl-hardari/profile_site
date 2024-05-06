<?php

namespace App\Filament\Resources\EmailConfigurationResource\Pages;

use App\Filament\Resources\EmailConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmailConfigurations extends ListRecords
{
    protected static string $resource = EmailConfigurationResource::class;

    protected static ?string $title = "إعدادات الإيميل";

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
