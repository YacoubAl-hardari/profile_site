<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Settings;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\SettingsResource\Pages;

class SettingsResource extends Resource
{
    use Translatable;
    protected static ?string $model = Settings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.Genarl-settings');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.setting-site');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.setting-site');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.setting-site');
    }
    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make(__('filament-panels::pages/trans_all_sections.Basic_info'))
                            ->schema([

                                Forms\Components\TextInput::make('title')
                                ->label(__('filament-panels::pages/trans_all_sections.Title'))
                                    ->required()
                                    ->columnSpanFull()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                ->label(__('filament-panels::pages/trans_all_sections.Description'))
                                    ->required()
                                    ->columnSpanFull()
                                    ->maxLength(255),

                                    Forms\Components\TextInput::make('phone')
                                    ->label(__('filament-panels::pages/trans_all_sections.Phone'))
                                    ->required(),
                                Forms\Components\TextInput::make('email')
                                ->label(__('filament-panels::pages/trans_all_sections.Email'))
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('location')
                                ->label(__('filament-panels::pages/trans_all_sections.Location'))
                                    ->required(),



                                Repeater::make('social_links')->label(__('filament-panels::pages/trans_all_sections.Social_media_links'))
                                    ->schema([
                                        Forms\Components\Select::make('social_type')
                                            ->label(__('filament-panels::pages/trans_all_sections.Select_social_type'))
                                            ->options([
                                                "Facebook" => "Facebook",
                                                "WhatsApp" => "WhatsApp",
                                                "Instagram" => "Instagram",
                                                "Twitter" => "Twitter",
                                                "LinkedIn" => "LinkedIn",
                                                "GitHub" => "GitHub",
                                                "GitLab" => "GitLab",
                                                "BeHance" => "BeHance",
                                                "Snapchat" => "Snapchat",
                                                "YouTube" => "YouTube",
                                                "TikTok" => "TikTok",
                                                "Telegram" => "Telegram",
                                            ])
                                            ->live()
                                            ->searchable()
                                            ->required()
                                            ->reactive()
                                            ->afterStateUpdated(function (Get $get, Set $set) {
                                                $set('name', $get('social_type'));
                                            }),
                                        Forms\Components\TextInput::make('name')
                                            ->label('رابط السوشل ميديا')
                                            ->label(__('filament-panels::pages/trans_all_sections.Social_media_links'))
                                            ->required(),
                                    ])
                                    ->columns(1)
                                    ->columnSpanFull()
                                    ->grid(3),


                                    Section::make()
                                    ->schema([
                                        Repeater::make('slider_text')
                                        ->label(__('filament-panels::pages/trans_all_sections.Slider_info'))

                                        ->schema([
                                            Forms\Components\TextInput::make('title')
                                                ->label(__('filament-panels::pages/trans_all_sections.Slider_info'))
    
                                        ])
                                        ->grid(4)
                                        ->columns(1)
                                        ->defaultItems(1)
                                        ->maxItems(4)
                                        ->disableItemDeletion(),
                                    ]),



                           

                            ])->columns(3),
                        Tabs\Tab::make(__('filament-panels::pages/trans_all_sections.Website_logos'))
                            ->schema([
                                Forms\Components\FileUpload::make('header_logo')
                                ->label(__('filament-panels::pages/trans_all_sections.Header_logo'))
                                    ->image()
                                    ->required()
                                    ->maxSize(1024),
                                Forms\Components\FileUpload::make('footer_logo')
                                ->label(__('filament-panels::pages/trans_all_sections.Footer_logo'))
                                    ->image()
                                    ->required()
                                    ->maxSize(1024),
                            ])->columns(2),

                        Tabs\Tab::make(__('filament-panels::pages/trans_all_sections.Website_Color'))
                            ->schema([
                                Repeater::make('colors')
                                ->label(__('filament-panels::pages/trans_all_sections.Website_Color'))
                                    ->schema([
                                        Forms\Components\TextInput::make('primaryname')
                                            ->label('اسم الون الأساسي')
                                            ->label(__('filament-panels::pages/trans_all_sections.Color_primary_name'))
                                            ->required(),
                                        Forms\Components\ColorPicker::make('primary')
                                            ->label(__('filament-panels::pages/trans_all_sections.Color_primary'))
                                            ->required(),
                                        Forms\Components\TextInput::make('secondaryname')
                                            ->label('اسم الون الفرعي')
                                            ->label(__('filament-panels::pages/trans_all_sections.Color_secondary_name'))
                                            ->required(),
                                        Forms\Components\ColorPicker::make('secondary')
                                            ->label('الون الفرعي')
                                            ->label(__('filament-panels::pages/trans_all_sections.Color_secondary'))
                                            ->required(),

                                    ])->columns(4)
                                    ->defaultItems(1)
                                    ->maxItems(1)
                                    ->disableItemDeletion(),
                            ]),
                        Tabs\Tab::make(__('filament-panels::pages/trans_all_sections.Page_title'))
                            ->schema([

                                Split::make([

                                    Section::make([
                                        Forms\Components\TextInput::make('service_title_page')
                                        ->label(__('filament-panels::pages/trans_all_sections.Service_title_page'))
                                        ->maxLength(30)
                                        ->required(),
                                    Forms\Components\Textarea::make('service_title_page_description')
                                    ->label(__('filament-panels::pages/trans_all_sections.Service_title_page_description'))
                                        ->maxLength(255)
                                        ->required(),
                                    ]),
                                    Section::make([
                                        Forms\Components\TextInput::make('portfolio_title_page')
                                        ->label(__('filament-panels::pages/trans_all_sections.Portfolio_title_page'))
                                        ->maxLength(30)
                                        ->default(null),
                                    Forms\Components\Textarea::make('portfolio_title_page_description')
                                    ->label(__('filament-panels::pages/trans_all_sections.Portfolio_title_page_description'))
                                        ->maxLength(255)
                                        ->required(),

                                    ]),
                                    
                                    Section::make([
                                        Forms\Components\TextInput::make('blog_title_page')
                                        ->label(__('filament-panels::pages/trans_all_sections.Title'))
                                    ->maxLength(30)
                                    ->default(null),
                                Forms\Components\Textarea::make('blog_title_page_description')
                                ->label(__('filament-panels::pages/trans_all_sections.Blog_title_page_description'))
                                    ->maxLength(255)
                                    ->required(),

                                    ]),

                                    Section::make([
                                        Forms\Components\TextInput::make('contact_title_page')
                                        ->label(__('filament-panels::pages/trans_all_sections.Contact_title_page'))
                                    ->maxLength(30)
                                    ->default(null),
                                Forms\Components\Textarea::make('contact_title_page_description')
                                ->label(__('filament-panels::pages/trans_all_sections.Contact_title_page_description'))
                                    ->maxLength(255)
                                    ->required(),

                                    ]),


                                ])->columns(2)
                                ->columnSpanFull()
                                ->from('lg'),

                                  

                            
                                    
                              

                              

                             
                            ])->columns(2),


                        Tabs\Tab::make(__('filament-panels::pages/trans_all_sections.SEO'))
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->maxLength(255)
                                    ->default(null),
                                Forms\Components\TextInput::make('meta_description')
                                    ->maxLength(255)
                                    ->default(null),
                                Forms\Components\TextInput::make('meta_keywords')
                                    ->maxLength(255)
                                    ->default(null),
                                Forms\Components\FileUpload::make('meta_image')
                                    ->image(),
                                Forms\Components\TextInput::make('meta_site')
                                    ->maxLength(255)
                                    ->default(null),
                            ]),



                    ])->columnSpanFull(),







            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label(__('filament-panels::pages/trans_all_sections.Title'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('header_logo')
                ->label(__('filament-panels::pages/trans_all_sections.Header_logo'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('footer_logo')
                ->label(__('filament-panels::pages/trans_all_sections.Footer_logo'))
                    ->searchable(),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ;
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSettings::route('/create'),
            'view' => Pages\ViewSettings::route('/{record}'),
            'edit' => Pages\EditSettings::route('/{record}/edit'),
        ];
    }
}
