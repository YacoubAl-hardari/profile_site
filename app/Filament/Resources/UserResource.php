<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;


    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.User_management');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.User_management');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.User_management');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.User_management');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 2;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('filament-panels::pages/dashboard.User_management'))
                    ->description('')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                        ->label(__('filament-panels::pages/trans_all_sections.Name'))
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                    ->label(__('filament-panels::pages/trans_all_sections.Email'))
                        ->email()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('password')
                    ->label(__('filament-panels::pages/trans_all_sections.Password'))
                        ->password()
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                        ->dehydrated(fn (?string $state): bool => filled($state))
                        ->required(fn (string $operation): bool => $operation === 'create') ,
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label(__('filament-panels::pages/trans_all_sections.Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                ->label(__('filament-panels::pages/trans_all_sections.Email'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                ->label(__('filament-panels::pages/trans_all_sections.Created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                ->label(__('filament-panels::pages/trans_all_sections.Updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            // 'view' => Pages\ViewUser::route('/{record}'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
