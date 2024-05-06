<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use App\Models\FrequentlyAskedQuestion;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FrequentlyAskedQuestionResource\Pages;
use App\Filament\Resources\FrequentlyAskedQuestionResource\RelationManagers;

class FrequentlyAskedQuestionResource extends Resource
{
    use Translatable;

    protected static ?string $model = FrequentlyAskedQuestion::class;

    protected static ?string $navigationIcon = 'heroicon-o-ellipsis-horizontal-circle';

    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.cms');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.FrequentlyAskedQuestion');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.FrequentlyAskedQuestion');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.FrequentlyAskedQuestion');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 9;
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('question')
                        ->label(__('filament-panels::pages/trans_all_sections.Question'))
                    ->required(),
                Forms\Components\Textarea::make('answer')
                ->label(__('filament-panels::pages/trans_all_sections.Answer'))
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
                Tables\Columns\TextColumn::make('question')
                ->label(__('filament-panels::pages/trans_all_sections.Question')),
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
            'index' => Pages\ListFrequentlyAskedQuestions::route('/'),
            'create' => Pages\CreateFrequentlyAskedQuestion::route('/create'),
            'view' => Pages\ViewFrequentlyAskedQuestion::route('/{record}'),
            'edit' => Pages\EditFrequentlyAskedQuestion::route('/{record}/edit'),
        ];
    }
}
