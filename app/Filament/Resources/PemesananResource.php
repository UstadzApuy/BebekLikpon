<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemesananResource\Pages;
use App\Models\Menu;
use App\Models\Pemesanan;
use Filament\Forms;
use Filament\Resources\Resource;    
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Repeater;

class PemesananResource extends Resource
{
    protected static ?string $model = Pemesanan::class;

    protected static ?string $navigationLabel = 'Pemesanan';            
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('user_id')
                ->relationship('user', 'name')
                ->label('User')
                ->required(),
    
                Repeater::make('items')
                ->relationship()
                ->label('Order Items')
                ->schema([
                    Select::make('menu_id')
                        ->label('Menu Item')
                        ->options(Menu::pluck('title', 'id'))
                        ->searchable()
                        ->required(),
            
                    TextInput::make('quantity')
                        ->numeric()
                        ->required()
                        ->default(1)
                        ->label('Quantity')
                        ->afterStateUpdated(function ($state, $get, $set) {
                            $menuPrice = Menu::find($get('menu_id'))->price ?? 0;
                            $set('total_price', $state * $menuPrice);
                        }),
            
                    TextInput::make('total_price')
                        ->label('Total Price')
                        ->numeric()
                        ->disabled(),
                ])
                ->minItems(1)
                ->createItemButtonLabel('Add Menu Item'),
            
    
            Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'completed' => 'Completed',
                    'canceled' => 'Canceled',
                ])
                ->default('pending')
                ->label('Status'),

            TextInput::make('unique_code')
                ->hidden()
                ->label('Unique Code')
                ->default(auth()->user()->unique_code)
                ->disabled(), 
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('User'),
                // TextColumn::make('items_summary')
                //     ->label('Menu Item and Quantity')
                //     ->wrap()
                //     ->extraAttributes(['style' => 'white-space: pre-line;']),

                TextColumn::make('status')->label('Status'),
                TextColumn::make('created_at')->label('Ordered At')->dateTime(),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ]);
    }
    public static function getPages(): array
{
    return [
        'index' => Pages\ListPemesanans::route('/'),
        'create' => Pages\CreatePemesanan::route('/create'),
        'edit' => Pages\EditPemesanan::route('/{record}/edit'),
    ];
}
}

