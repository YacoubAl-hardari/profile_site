<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CategoryBlog;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\CategoryBlogResource\Pages;


class CategoryBlogResource extends Resource
{
    use Translatable;
    protected static ?string $model = CategoryBlog::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    
    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.cms');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.CategoryBlog');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.CategoryBlog');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.CategoryBlog');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count() ;
}


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
             Section::make(__('filament-panels::pages/trans_all_sections.Add_Your_Category_Blog'))
                ->description(__('filament-panels::pages/trans_all_sections.Adding_a_new_Category_to_organize_the_blog_posts_systematically'))
                ->schema([
                    Forms\Components\TextInput::make('name')
                    ->label(__('filament-panels::pages/trans_all_sections.Category_name'))
                    ->required(),
                Forms\Components\TextInput::make('slug')
                ->label(__('filament-panels::pages/trans_all_sections.Slug'))
                    ->minLength(3)
                    ->maxLength(50),
                
                    Forms\Components\ColorPicker::make('text_color')
                    ->label(__('filament-panels::pages/trans_all_sections.Category_name'))
                    ->required(),

                Forms\Components\ColorPicker::make('bg_color')
                ->label(__('filament-panels::pages/trans_all_sections.Slug'))
                ->required(),

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

                Tables\Columns\ColorColumn::make('text_color')
                ->label(__('filament-panels::pages/trans_all_sections.Name'))
                    ->searchable(),
                Tables\Columns\ColorColumn::make('bg_color')
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
            'index' => Pages\ListCategoryBlogs::route('/'),
            'create' => Pages\CreateCategoryBlog::route('/create'),
            'view' => Pages\ViewCategoryBlog::route('/{record}'),
            'edit' => Pages\EditCategoryBlog::route('/{record}/edit'),
        ];
    }
}
