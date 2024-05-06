<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Portfolio;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\PortfolioResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PortfolioResource\RelationManagers;

class PortfolioResource extends Resource
{
    use Translatable;
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.cms');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.Portfolio');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.Portfolio');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.Portfolio');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 6;
    }

    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count() ;
}


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Tabs::make('Tabs')
    ->tabs([
        Tabs\Tab::make(__('filament-panels::pages/trans_all_sections.Add_new_work'))
            ->schema([
              
                Forms\Components\Select::make('category_portfolio_id')
                ->relationship(name: 'categoryPortfolio', titleAttribute: 'name')
                ->label(__('filament-panels::pages/trans_all_sections.select_Category_portfolio'))
                ->searchable()
                ->preload()
                ->required()
                ->getOptionLabelFromRecordUsing(fn($record, $livewire) => $record->hasTranslation('name', $livewire->activeLocale)
                ? $record->getTranslation('name', $livewire->activeLocale)
                : $record->name)
                ,
            Forms\Components\TextInput::make('name')
            ->label(__('filament-panels::pages/trans_all_sections.Name'))
                ->required(),
            Forms\Components\TextInput::make('slug')
            ->label(__('filament-panels::pages/trans_all_sections.Slug'))
                ->maxLength(255),
                Forms\Components\DatePicker::make('date')
                ->label(__('filament-panels::pages/trans_all_sections.Date'))
                ->native(false)
                ->firstDayOfWeek(7)
                ->closeOnDateSelection()
                ->minDate(now()->subYears(9))
                ->maxDate(now())
                ->required(),
            Forms\Components\FileUpload::make('image')
            ->label(__('filament-panels::pages/trans_all_sections.Image'))
                ->image()
                ->imageEditor()
                ->columnSpanFull()
                ->required(),
            Forms\Components\Textarea::make('description')
            ->label(__('filament-panels::pages/trans_all_sections.Description'))
            ->columnSpanFull()
                ->required(),
                Forms\Components\Toggle::make('is_active')
                ->label(__('filament-panels::pages/trans_all_sections.Is_active')),
            ])->columns(4),
            Tabs\Tab::make(__('filament-panels::pages/trans_all_sections.content'))
            ->schema([
              
                TinyEditor::make('content')
                ->label(__('filament-panels::pages/trans_all_sections.content'))
                ->showMenuBar()
                ->toolbarSticky(true)
                ->direction('auto|rtl|ltr') 
                ->columnSpan('full')
                    ->required(),

                    Forms\Components\FileUpload::make('images')
                    ->label(__('filament-panels::pages/trans_all_sections.Images'))
                    ->image()
                    ->imageEditor()
                    ->multiple()
                    ->columnSpanFull()
                    ->required(),
            ]),
        Tabs\Tab::make(__('filament-panels::pages/trans_all_sections.client_infoamtion'))
            ->schema([
               Repeater::make('client')
               ->label(__('filament-panels::pages/trans_all_sections.Client'))
               ->schema([
                Forms\Components\TextInput::make('client_name')
                ->label(__('filament-panels::pages/trans_all_sections.Client_name')),
                Forms\Components\TextInput::make('client_url')
                ->label(__('filament-panels::pages/trans_all_sections.Client_url')),
                Forms\Components\DatePicker::make('date')
                ->label(__('filament-panels::pages/trans_all_sections.Date'))
                ->native(false)
                ->firstDayOfWeek(7)
                ->closeOnDateSelection()
                ->minDate(now()->subYears(9))
                ->maxDate(now()),
                Forms\Components\Toggle::make('is_view')
                ->label(__('filament-panels::pages/trans_all_sections.Is_view')),
                
               ])->columns(3)->columnSpanFull()
               ->maxItems(1)
               ->defaultItems(1)
            ]),
        Tabs\Tab::make(__('filament-panels::pages/trans_all_sections.SEO'))
            ->schema([
                Forms\Components\TextInput::make('meta_title'),
                Forms\Components\FileUpload::make('meta_image')
                ->image()
                ->imageEditor(),
                Forms\Components\TextInput::make('meta_keywords'),
                Forms\Components\TextInput::make('meta_description'),
            ]),
    ])->columnSpanFull()

       
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('categoryPortfolio.name')
                ->label(__('filament-panels::pages/trans_all_sections.select_Category_portfolio'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                ->label(__('filament-panels::pages/trans_all_sections.Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                ->label(__('filament-panels::pages/trans_all_sections.Slug'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                ->label(__('filament-panels::pages/trans_all_sections.Image')),
                Tables\Columns\TextColumn::make('date')
                ->label(__('filament-panels::pages/trans_all_sections.Date'))
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                ->label(__('filament-panels::pages/trans_all_sections.Is_view')),
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
                // Tables\Actions\ReplicateAction::make(),
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
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'view' => Pages\ViewPortfolio::route('/{record}'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}
