<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Brand;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\BrandResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BrandResource\RelationManagers;

class BrandResource extends Resource
{
    use Translatable;
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.cms');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.Brand');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.Brand');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.Brand');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 4;
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
           Section::make(__('filament-panels::pages/trans_all_sections.Add_brand'))
            ->description(__('filament-panels::pages/trans_all_sections.Add_logos_brand_for_your_clients'))
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label(__('filament-panels::pages/trans_all_sections.Name'))
                ->required(),
            Forms\Components\TextInput::make('slug')
            ->label(__('filament-panels::pages/trans_all_sections.Slug'))
            ->unique()
                ->maxLength(255),
            Forms\Components\FileUpload::make('logo')
            ->label(__('filament-panels::pages/trans_all_sections.Logo'))
            ->columnSpanFull()
                ->image()
                ->imageEditor(),
            Forms\Components\Toggle::make('is_active')
            ->label(__('filament-panels::pages/trans_all_sections.Is_active')),
            ])
            ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label(__('filament-panels::pages/trans_all_sections.Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                ->label(__('filament-panels::pages/trans_all_sections.Slug'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('logo')
                ->label(__('filament-panels::pages/trans_all_sections.Logo'))
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                ->label(__('filament-panels::pages/trans_all_sections.Is_active')),
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'view' => Pages\ViewBrand::route('/{record}'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
