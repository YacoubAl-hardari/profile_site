<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\GoogleAnalytic;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GoogleAnalyticResource\Pages;
use App\Filament\Resources\GoogleAnalyticResource\RelationManagers;
use Filament\Tables\Actions\ActionGroup;

class GoogleAnalyticResource extends Resource
{
    protected static ?string $model = GoogleAnalytic::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
        


    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.third-party-api');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.Google-Analytic');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.Google-Analytic');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.Google-Analytic');
        
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
                Forms\Components\TextInput::make('google_analytics_id')
                ->maxLength(255),
            Forms\Components\TextInput::make('type')
                ->maxLength(255),
            Forms\Components\TextInput::make('project_id')
                ->maxLength(255),
            Forms\Components\TextInput::make('private_key_id')
                ->maxLength(255),
            Forms\Components\Textarea::make('private_key')
                ->maxLength(65535)
                ->columnSpanFull(),
            Forms\Components\TextInput::make('client_email')
                ->email()
                ->maxLength(255),
            Forms\Components\TextInput::make('client_id')
                ->maxLength(255),
            Forms\Components\TextInput::make('auth_uri')
                ->maxLength(255),
            Forms\Components\TextInput::make('token_uri')
                ->maxLength(255),
            Forms\Components\TextInput::make('auth_provider_x509_cert_url')
                ->maxLength(255),
            Forms\Components\TextInput::make('client_x509_cert_url')
                ->maxLength(255),
            Forms\Components\TextInput::make('universe_domain')
                ->maxLength(255),
               ])->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('google_analytics_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('project_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('private_key_id')
                ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('client_email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('client_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('auth_uri')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('token_uri')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('auth_provider_x509_cert_url')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('client_x509_cert_url')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('universe_domain')
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
            'index' => Pages\ListGoogleAnalytics::route('/'),
            'create' => Pages\CreateGoogleAnalytic::route('/create'),
            'view' => Pages\ViewGoogleAnalytic::route('/{record}'),
            'edit' => Pages\EditGoogleAnalytic::route('/{record}/edit'),
        ];
    }    
}
