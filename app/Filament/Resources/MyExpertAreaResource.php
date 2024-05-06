<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\MyExpertArea;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\MyExpertAreaResource\Pages;

class MyExpertAreaResource extends Resource
{
    use Translatable;

    protected static ?string $model = MyExpertArea::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path-rounded-square';   
    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.aboutMe');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.MyExpertArea');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.MyExpertArea');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.MyExpertArea');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 3;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Section::make(__('filament-panels::pages/trans_all_sections.My_Expert_Area'))
                ->description(__('filament-panels::pages/trans_all_sections.Add_Your_languages_Or_skill'))
                ->schema([
                    Forms\Components\TextInput::make('name')
                    ->label(__('filament-panels::pages/trans_all_sections.Name'))
                    ->required(),
                Forms\Components\FileUpload::make('image')
                ->label(__('filament-panels::pages/trans_all_sections.Image'))
                    ->image()
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                ->label(__('filament-panels::pages/trans_all_sections.Is_active')),
                ])
                ->columns(1),
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
            'index' => Pages\ListMyExpertAreas::route('/'),
            'create' => Pages\CreateMyExpertArea::route('/create'),
            'view' => Pages\ViewMyExpertArea::route('/{record}'),
            'edit' => Pages\EditMyExpertArea::route('/{record}/edit'),
        ];
    }
}
