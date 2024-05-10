<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use App\Models\ContactForm;
use App\Mail\ReplayMessaegMail;
use Illuminate\Support\Facades\Mail;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\ContactFormResource;
use Filament\Widgets\TableWidget as BaseWidget;

class ContactMeTableWidget extends BaseWidget
{
    
    protected static ?int $sort =4;
        protected int | string | array $columnSpan = 'full';
    protected static string $color = 'info';
    protected static ?string $heading = 'مراجعة العملاء';
    public function table(Table $table): Table
    {
        return $table
        ->query(ContactFormResource::getEloquentQuery())
        ->defaultPaginationPageOption(5)
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
                            TextInput::make('title')

                               ->label(__('filament-panels::pages/trans_all_sections.Title'))
                                ->required(),

                            FileUpload::make('image')
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
        
        ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name'),
            TextColumn::make('email'),
            TextColumn::make('phone'),
            TextColumn::make('subject'),
            ]);
    }
}
