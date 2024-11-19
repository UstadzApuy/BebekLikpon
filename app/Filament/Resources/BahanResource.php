<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BahanResource\Pages;
use App\Filament\Resources\BahanResource\RelationManagers;
use App\Models\Bahan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BahanResource extends Resource
{
    protected static ?string $model = Bahan::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationLabel = 'Stok Bahan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_bahan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_stok')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('satuan')
                    ->options([
                        'kg' => 'Kilogram',
                        'pcs' => 'Pieces',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('minimum_stok')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('harga_terakhir')
                    ->numeric()
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_terakhir_stok')
                    ->required(),
            ]);
    }

    // Konfigurasi Tabel
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_bahan'),
                Tables\Columns\TextColumn::make('jumlah_stok'),
                Tables\Columns\TextColumn::make('satuan'),
                Tables\Columns\TextColumn::make('minimum_stok'),
                Tables\Columns\TextColumn::make('harga_terakhir'),
                Tables\Columns\TextColumn::make('tanggal_terakhir_stok')
                    ->date(),
            ])
            ->filters([
                //
            ])

            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);

    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBahans::route('/'),
            'create' => Pages\CreateBahan::route('/create'),
            'edit' => Pages\EditBahan::route('/{record}/edit'),
        ];
    }
}