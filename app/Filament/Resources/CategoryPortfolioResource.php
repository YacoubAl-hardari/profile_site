<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\CategoryPortfolio;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryPortfolioResource\Pages;
use App\Filament\Resources\CategoryPortfolioResource\RelationManagers;

class CategoryPortfolioResource extends Resource
{
    use Translatable;
    protected static ?string $model = CategoryPortfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.cms');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.CategoryPortfolio');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.CategoryPortfolio');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.CategoryPortfolio');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 5;
    }

    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count() ;
}


public static function form(Form $form): Form
{
    return $form
        ->schema([
         Section::make(__('filament-panels::pages/trans_all_sections.Add_Your_Category_Portfolio'))
            ->description(__('filament-panels::pages/trans_all_sections.Adding_a_new_Category_to_organize_the_Portfolio_systematically'))
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label(__('filament-panels::pages/trans_all_sections.Category_name'))
                ->required(),
            Forms\Components\TextInput::make('slug')
            ->label(__('filament-panels::pages/trans_all_sections.Slug'))
                ->maxLength(50),
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
            ->label(__('filament-panels::pages/trans_all_sections.Category_name'))
                ->searchable(),
            Tables\Columns\TextColumn::make('slug')
            ->label(__('filament-panels::pages/trans_all_sections.Slug'))
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
            'index' => Pages\ListCategoryPortfolios::route('/'),
            'create' => Pages\CreateCategoryPortfolio::route('/create'),
            'view' => Pages\ViewCategoryPortfolio::route('/{record}'),
            'edit' => Pages\EditCategoryPortfolio::route('/{record}/edit'),
        ];
    }
}
