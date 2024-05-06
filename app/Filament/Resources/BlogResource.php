<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Blog;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\BlogResource\Pages;
use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BlogResource\RelationManagers;

class BlogResource extends Resource
{
    use Translatable;
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.cms');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.blog');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.blog');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.blog');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count() ;
}


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Tabs::make('tabs')
    ->tabs([
        Tabs\Tab::make('بيانات المدونة')
            ->schema([

                Forms\Components\Select::make('categories')
                ->relationship(name: 'categoryBlog', titleAttribute: 'name')
                ->label(__('filament-panels::pages/trans_all_sections.Select_Category'))
                ->searchable()
                ->preload()
                ->multiple()
                ->required()
                ->getOptionLabelFromRecordUsing(fn($record, $livewire) => $record->hasTranslation('name', $livewire->activeLocale)
                ? $record->getTranslation('name', $livewire->activeLocale)
                : $record->name)
                ,
             

            Forms\Components\TextInput::make('name')
            ->label(__('filament-panels::pages/trans_all_sections.Post_name'))
            ->maxLength(50)
            ->required(),
            
            Forms\Components\TextInput::make('slug')
            ->label(__('filament-panels::pages/trans_all_sections.Slug'))
                ->maxLength(50),
                Forms\Components\TimePicker::make('time_of_read')
                ->label(__('filament-panels::pages/trans_all_sections.Time_of_read'))
                ->native(false)
                    ->required(),
                Forms\Components\DatePicker::make('date')
                ->label(__('filament-panels::pages/trans_all_sections.Date'))
                ->format('d/m/Y')
                ->native(false)
                ->firstDayOfWeek(7)
                ->closeOnDateSelection()
                ->minDate(now()->subYears(1))
                ->maxDate(now())
                    ->required(),
            Forms\Components\FileUpload::make('image')
            ->label(__('filament-panels::pages/trans_all_sections.Image'))
                ->image()
                ->imageEditor()
                ->columnSpanFull()
                ->required(),
                Forms\Components\Toggle::make('is_active')
                  ->label(__('filament-panels::pages/trans_all_sections.Is_active')),
            ])->columns(3),

        Tabs\Tab::make(__('filament-panels::pages/trans_all_sections.content'))
            ->schema([
              
                TinyEditor::make('content')
                ->label(__('filament-panels::pages/trans_all_sections.content'))
                ->showMenuBar()
                ->toolbarSticky(true)
                ->direction('auto|rtl|ltr') 
                ->columnSpan('full')
                    ->required(),
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
        ])->columnSpanFull(),

             
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->label(__('filament-panels::pages/trans_all_sections.Category_name'))
                    ->numeric()
                    ->sortable(),
               
                Tables\Columns\TextColumn::make('slug')
                ->label(__('filament-panels::pages/trans_all_sections.Slug'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                ->label(__('filament-panels::pages/trans_all_sections.Image'))
                ,
                Tables\Columns\TextColumn::make('date')
                ->label(__('filament-panels::pages/trans_all_sections.Date'))
                    ->sortable(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'view' => Pages\ViewBlog::route('/{record}'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
