<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\AwardandRecognition;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AwardandRecognitionResource\Pages;
use App\Filament\Resources\AwardandRecognitionResource\RelationManagers;

class AwardandRecognitionResource extends Resource
{
    
use Translatable;
    protected static ?string $model = AwardandRecognition::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    
    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.aboutMe');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.award_or_recognition');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.award_or_recognition');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.award_or_recognition');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 4;
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make('')
                ->description('')
                ->schema([
                    Forms\Components\TextInput::make('title')
                    ->label(__('filament-panels::pages/trans_all_sections.award_or_recognition_name'))
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('award_or_recognition_type')
                        ->required()
                        ->label(__('filament-panels::pages/trans_all_sections.Award_or_recognition_type'))
                        ->maxLength(255),
                    Forms\Components\Select::make('link_type')
                    ->label(__('filament-panels::pages/trans_all_sections.Link_type'))
                    ->options([
                        'external_social_media_url' => 'external social media url',
                        'internal_url' => 'internal  url',
                    ])->required()
                    ->live()
                    ->afterStateUpdated(function(Get $get , Set $set){
                        $set('link', $get('link_type'));
                    })
                    
                    ,
                    Forms\Components\TextInput::make('link')
                    ->label(__('filament-panels::pages/trans_all_sections.Link'))
                    ->required()
                    ->maxLength(255),
    
                    Forms\Components\DatePicker::make('start_date')
                    ->label(__('filament-panels::pages/trans_all_sections.Start_date'))
                    ->format('d/m/Y')
                ->native(false)
                ->firstDayOfWeek(7)
                ->closeOnDateSelection()
                ->maxDate(now())
                        ->required(),
                    Forms\Components\DatePicker::make('end_date')
                    ->label(__('filament-panels::pages/trans_all_sections.End_date'))
                    ->format('d/m/Y')
                ->native(false)
                ->firstDayOfWeek(7)
                ->closeOnDateSelection()
                ->maxDate(now())
                        ->required(),

                Forms\Components\FileUpload::make('image')
                ->label(__('filament-panels::pages/trans_all_sections.Image'))
                    ->required()
                    ->image()
                    ->columnSpanFull()
                    ->imageEditor()
                    ,
                Forms\Components\Textarea::make('description')
                ->label(__('filament-panels::pages/trans_all_sections.Description'))
                    ->columnSpanFull()
                    ,
                Forms\Components\Toggle::make('is_active')
                ->label(__('filament-panels::pages/trans_all_sections.Is_active')),
                ])
                ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label(__('filament-panels::pages/trans_all_sections.award_or_recognition_name'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                ->label(__('filament-panels::pages/trans_all_sections.Image'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('award_or_recognition_type')
                ->label(__('filament-panels::pages/trans_all_sections.Award_or_recognition_type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_type')
                ->label(__('filament-panels::pages/trans_all_sections.Link_type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
                ->label(__('filament-panels::pages/trans_all_sections.Link'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                ->label(__('filament-panels::pages/trans_all_sections.Start_date'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('end_date')
                ->label(__('filament-panels::pages/trans_all_sections.End_date'))
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
            'index' => Pages\ListAwardandRecognitions::route('/'),
            'create' => Pages\CreateAwardandRecognition::route('/create'),
            'view' => Pages\ViewAwardandRecognition::route('/{record}'),
            'edit' => Pages\EditAwardandRecognition::route('/{record}/edit'),
        ];
    }
}
