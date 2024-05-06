<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailConfigurationResource\Pages;
use App\Models\EmailConfiguration;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ActionGroup;

class EmailConfigurationResource extends Resource
{
    protected static ?string $model = EmailConfiguration::class;


    protected static ?string $navigationIcon = 'heroicon-o-envelope';


    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.Genarl-settings');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.Email-settings');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.Email-settings');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.Email-settings');
        
    }
    public static function getNavigationSort(): ?int
    {
        return 1;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('خصائص الإيميل'))
                ->description(__('إعدادات الإيميل '))
                ->collapsible()
                ->schema([
                TextInput::make('MAIL_MAILER')->required()->label(__('مرسل البريد (MAIL_MAILER)'))->maxLength(255),
                TextInput::make('MAIL_HOST')->required()->label(__('مضيف البريد(MAIL_HOST)'))->maxLength(255),
                TextInput::make('MAIL_PORT')->required()->label(__('المنفذ(MAIL_PORT)'))->maxLength(255)->numeric(),
                TextInput::make('MAIL_USERNAME')->required()->label(__('اسم المستخدم(MAIL_USERNAME)'))->maxLength(255)->minLength(3),
                TextInput::make('MAIL_PASSWORD')->label(__('كلمة السر(MAIL_PASSWORD) '))->maxLength(255)->password(),
                TextInput::make('MAIL_ENCRYPTION')->required()->label(__('التشفير(MAIL_ENCRYPTION)'))->maxLength(255),
                TextInput::make('MAIL_FROM_ADDRESS')->required()->label(__('عنوان المٌرسِل(MAIL_FROM_ADDRESS)'))->maxLength(255)->minLength(3),
                TextInput::make('MAIL_FROM_NAME')->required()->label(__('اسم المٌرسِل(MAIL_FROM_NAME)')) ->maxLength(255)->minLength(3),
                TextInput::make('MAIL_DRIVER')->required()->label(__('اسم المحرك (MAIL_DRIVER)')) ->maxLength(255),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('MAIL_MAILER')->label(__('مرسل البريد')),
                TextColumn::make('MAIL_HOST')->label(__('مضيف البريد')),
                TextColumn::make('MAIL_USERNAME')->label(__('اسم المستخدم')),
                TextColumn::make('MAIL_FROM_ADDRESS')->label(__('عنوان المٌرسِل')),
                TextColumn::make('MAIL_FROM_NAME')->label(__('اسم المٌرسِل')),
                TextColumn::make('MAIL_DRIVER')->label(__('اسم المحرك')),
                TextColumn::make('created_at')->label(__('تاريخ الأنشاء'))->dateTime()
                ->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->label(__('تاريخ التعديل'))->dateTime()
                ->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make(
                    [
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\EditAction::make(),
                        Tables\Actions\DeleteAction::make(),
                    ]
                )
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListEmailConfigurations::route('/'),
            'create' => Pages\CreateEmailConfiguration::route('/create'),
            'view' => Pages\ViewEmailConfiguration::route('/{record}'),
            'edit' => Pages\EditEmailConfiguration::route('/{record}/edit'),
        ];
    }    
}


