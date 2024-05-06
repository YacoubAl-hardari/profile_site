<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\WorkExperience;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WorkExperienceResource\Pages;
use App\Filament\Resources\WorkExperienceResource\RelationManagers;

class WorkExperienceResource extends Resource
{
    use Translatable;
    protected static ?string $model = WorkExperience::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    
    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.aboutMe');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.WorkExperience');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.WorkExperience');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.WorkExperience');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 2;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Section::make(__('filament-panels::pages/trans_all_sections.work_experiences'))
                ->description(__('filament-panels::pages/trans_all_sections.Add_infomation_about_your_work_experience'))
                ->schema([
                    Forms\Components\TextInput::make('company_name')
                    ->label(__('filament-panels::pages/trans_all_sections.Company_name'))
                    ->required(),
                Forms\Components\DatePicker::make('start_date')
                ->label(__('filament-panels::pages/trans_all_sections.Start_date'))
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                ->label(__('filament-panels::pages/trans_all_sections.End_date'))
                    ->required(),
                Forms\Components\TextInput::make('position')
                ->label(__('filament-panels::pages/trans_all_sections.Position'))
                    ->required(),
                Forms\Components\FileUpload::make('company_logo')
                ->label(__('filament-panels::pages/trans_all_sections.Company_logo'))
                ->image()
                ->imageEditor()
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
                Tables\Columns\TextColumn::make('company_name')
                     ->label(__('filament-panels::pages/trans_all_sections.Company_name'))
                    ->sortable(),
                Tables\Columns\ImageColumn::make('company_logo')
                ->label(__('filament-panels::pages/trans_all_sections.Company_logo'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                ->label(__('filament-panels::pages/trans_all_sections.Start_date'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                ->label(__('filament-panels::pages/trans_all_sections.End_date'))
                    ->date()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                ->label(__('filament-panels::pages/trans_all_sections.Is_active')),
                Tables\Columns\TextColumn::make('created_at')
                  ->label(__('filament-panels::pages/trans_all_sections.Is_active'))
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
            'index' => Pages\ListWorkExperiences::route('/'),
            'create' => Pages\CreateWorkExperience::route('/create'),
            'view' => Pages\ViewWorkExperience::route('/{record}'),
            'edit' => Pages\EditWorkExperience::route('/{record}/edit'),
        ];
    }
}
