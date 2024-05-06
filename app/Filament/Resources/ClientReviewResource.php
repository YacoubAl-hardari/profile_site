<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ClientReview;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ClientReviewResource\Pages;
use App\Filament\Resources\ClientReviewResource\RelationManagers;

class ClientReviewResource extends Resource
{
    use Translatable;

    protected static ?string $model = ClientReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.cms');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.ClientReview');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.ClientReview');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.ClientReview');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 7;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make(__('filament-panels::pages/trans_all_sections.Add_client_review'))
                ->description(__('filament-panels::pages/trans_all_sections.Write_a_review_for_the_client_showcasing_the_websites_features_to_establish_trust_with_potential_new_clients'))
                ->schema([
                    Forms\Components\TextInput::make('name')
                    ->label(__('filament-panels::pages/trans_all_sections.Name'))
                    ->required(),
                Forms\Components\TextInput::make('position')
                ->label(__('filament-panels::pages/trans_all_sections.Position'))
                    ->required(),
                Forms\Components\Select::make('start')
                ->label(__('filament-panels::pages/trans_all_sections.client_review_Stars'))
                ->options([
                    1=>__('filament-panels::pages/trans_all_sections.Bad'),
                    2=>__('filament-panels::pages/trans_all_sections.Good'),
                    3=>__('filament-panels::pages/trans_all_sections.Very_Good'),
                    4=>__('filament-panels::pages/trans_all_sections.Excellent'),
                    5=>__('filament-panels::pages/trans_all_sections.Expert'),
                ])
                ->searchable()
                ->preload()
                    ->required()
                    ,

                    Forms\Components\TextInput::make('link')
                    ->label(__('filament-panels::pages/trans_all_sections.Link'))
                        ->maxLength(255),

                Forms\Components\Textarea::make('description')
                ->label(__('filament-panels::pages/trans_all_sections.Description'))
                ->maxLength(500)
                ->columnSpanFull()
                    ->required(),

                Forms\Components\Toggle::make('is_active')
                ->label(__('filament-panels::pages/trans_all_sections.Is_active')),
                ])
                ->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label(__('filament-panels::pages/trans_all_sections.Name'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('position')
                ->label(__('filament-panels::pages/trans_all_sections.Position'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start')
                ->label(__('filament-panels::pages/trans_all_sections.client_review_Stars'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('link')
                ->label(__('filament-panels::pages/trans_all_sections.Link'))
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
            'index' => Pages\ListClientReviews::route('/'),
            'create' => Pages\CreateClientReview::route('/create'),
            'view' => Pages\ViewClientReview::route('/{record}'),
            'edit' => Pages\EditClientReview::route('/{record}/edit'),
        ];
    }
}
