<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ContactForm;
use App\Mail\ReplayMessaegMail;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\ContactFormResource\Pages;

class ContactFormResource extends Resource
{
    protected static ?string $model = ContactForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    public static function getNavigationGroup(): string
    {
        return __('filament-panels::pages/dashboard.ContactForm');
    }
    public static function getPluralLabel(): string
    {
        return __('filament-panels::pages/dashboard.ContactForm');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/dashboard.ContactForm');
    }
    public static function getNavigationLabel(): string
    {
        return   __('filament-panels::pages/dashboard.ContactForm');
        
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
                Section::make('Heading')
                    ->description('')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                        ->label(__('filament-panels::pages/trans_all_sections.Name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                ->label(__('filament-panels::pages/trans_all_sections.Phone'))
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                ->label(__('filament-panels::pages/trans_all_sections.Email'))
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subject')
                ->label(__('filament-panels::pages/trans_all_sections.Subject'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('message')
                ->label(__('filament-panels::pages/trans_all_sections.Message'))
                    ->required()
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('email')
                ->label(__('filament-panels::pages/trans_all_sections.Email'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                ->label(__('filament-panels::pages/trans_all_sections.Subject'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                ->label(__('filament-panels::pages/trans_all_sections.Phone'))
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_read')
                ->boolean()
                ->color("success")
                ->label(__('filament-panels::pages/trans_all_sections.Is_read')),

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
                ActionGroup::make(
                    [
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\EditAction::make(),
                        Tables\Actions\DeleteAction::make(),
                        Tables\Actions\Action::make('send email')
                        ->label('Replay Email')
                            ->action(function (array $data,ContactForm $record): void {
            
                                $IS_SEND = false;
                                    if($record['email'])
                                    {
                                        $IS_SEND = true;
                                    Mail::to($record['email'])->send(new ReplayMessaegMail($data['title'], $data['body'],$data['image']));
                                        
                                  
                                    }
                                    else{
                                       Notification::make()
                                    ->danger()
                                    ->seconds(5) 
                                     ->persistent()
                                    ->title("لم يتم الأرسال")
                                    ->body("لا يوجد بريد إلكتروني للمستخدم   "  . "    ---    ".  $record['name']  )
                                     ->send();  
                                    }
                                    
                                    
                                    if($IS_SEND == true)
                                    {
                                        Notification::make()
                                        ->title('تم ارسال الرسائل')
                                        ->success()
                                        ->body('تم ارسال الرسائل الى '. $record['name'])
                                        ->send();
                                        $record->update(['status' => $IS_SEND]);

                                }
                                $IS_SEND == false;
                               
                            })
                            ->form([
                                Forms\Components\TextInput::make('title')

                                   ->label(__('filament-panels::pages/trans_all_sections.Title'))
                                    ->required(),

                                Forms\Components\FileUpload::make('image')
                                    ->label(__('filament-panels::pages/trans_all_sections.Image'))
                                    ->image()
                                    ->imageEditor(),
            
                                    RichEditor::make('body')
                                ->required()->label(__('filament-panels::pages/trans_all_sections.content'))
                                ->toolbarButtons([
                                    
                                    'blockquote',
                                    'bold',
                                    'bulletList',
                                    'codeBlock',
                                    'h2',
                                    'h3',
                                    'italic',
                                    'link',
                                    'orderedList',
                                    'redo',
                                    'strike',
                                    'underline',
                                    'undo',
                                ])

                                    ->columnSpan('full'),
            
                            ])->keyBindings(['command+p', 'ctrl+p'])
                    ]
                )

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
            'index' => Pages\ListContactForms::route('/'),
            'create' => Pages\CreateContactForm::route('/create'),
            'view' => Pages\ViewContactForm::route('/{record}'),
            'edit' => Pages\EditContactForm::route('/{record}/edit'),
        ];
    }
}
