<?php

namespace App\Filament\Resources\AboutUsResource\Pages;

use App\Filament\Resources\AboutUsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
class EditAboutUs extends EditRecord
{  use EditRecord\Concerns\Translatable;
    protected static string $resource = AboutUsResource::class;


   
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('User updated')
            ->body('The user has been saved successfully.');
    }


    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        
        ];
    }
    protected function getRedirectUrl(): string
    {
      

        return $this->getResource()::getUrl('index');
    }
}
