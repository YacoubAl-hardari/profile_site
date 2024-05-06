<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\AboutUs;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\AboutUsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AboutUsResource\RelationManagers;

class AboutUsResource extends Resource
{
    use Translatable;
    protected static ?string $model = AboutUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.aboutMe');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.aboutMe');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.aboutMe');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.aboutMe');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 1;
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make()
               ->schema([
                Forms\Components\TextInput::make('name')
                ->label(__('filament-panels::pages/trans_all_sections.Name'))
                ->required(),
            Forms\Components\TextInput::make('description')
            ->label(__('filament-panels::pages/trans_all_sections.Description'))
                ->required(),
            Forms\Components\FileUpload::make('image')
            ->label(__('filament-panels::pages/trans_all_sections.Image'))
                ->image()
                ->required(),

                Repeater::make('counter')
                ->label(__('filament-panels::pages/trans_all_sections.Counter'))
                ->schema([
                    Forms\Components\TextInput::make('title')
                    ->label(__('filament-panels::pages/trans_all_sections.Title'))
                        ->required(),
                    Forms\Components\TextInput::make('counter')
                    ->label(__('filament-panels::pages/trans_all_sections.Counter'))
                        ->required(),
                ])->grid(3)
                ->columns(1)
                ->columnSpanFull()
                ->maxItems(3)
                ,


               ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label(__('filament-panels::pages/trans_all_sections.Name')),
                Tables\Columns\ImageColumn::make('image')
                ->label(__('filament-panels::pages/trans_all_sections.Image')),
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
              
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ;
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
            'index' => Pages\ListAboutUs::route('/'),
            'create' => Pages\CreateAboutUs::route('/create'),
            'view' => Pages\ViewAboutUs::route('/{record}'),
            'edit' => Pages\EditAboutUs::route('/{record}/edit'),
        ];
    }
}
