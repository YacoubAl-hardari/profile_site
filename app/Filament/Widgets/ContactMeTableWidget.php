<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
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
        ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name'),
            TextColumn::make('email'),
            TextColumn::make('phone'),
            TextColumn::make('subject'),
            ]);
    }
}
