<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\GoogleRecaptcha;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use App\Filament\Resources\GoogleRecaptchaResource\Pages;
use Filament\Tables\Actions\ActionGroup;

class GoogleRecaptchaResource extends Resource
{
    protected static ?string $model = GoogleRecaptcha::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket-square';
    


    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.third-party-api');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.GoogleRecaptcha');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.GoogleRecaptcha');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.GoogleRecaptcha');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make()->schema([
                Forms\Components\TextInput::make('recaptcha_site_key')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('recaptcha_secret_key')
            ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('recaptcha_version')
            ->required()
                ->maxLength(255),
               ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('recaptcha_site_key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('recaptcha_secret_key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('recaptcha_version')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
             ActionGroup::make([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
             ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGoogleRecaptchas::route('/'),
            // 'create' => Pages\CreateGoogleRecaptcha::route('/create'),
            // 'view' => Pages\ViewGoogleRecaptcha::route('/{record}'),
            // 'edit' => Pages\EditGoogleRecaptcha::route('/{record}/edit'),
        ];
    }    
}
