<?php

namespace App\Filament\SuperAdmin\Resources;

use App\Filament\SuperAdmin\Resources\StokResource\Pages;
use App\Filament\SuperAdmin\Resources\StokResource\RelationManagers;
use App\Models\Bahan;
use App\Models\Stok;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StokResource extends Resource
{
    protected static ?string $model = Bahan::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationLabel = 'Stok Bahan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

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

            ])
            ->bulkActions([
            ]);

    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStoks::route('/'),
        ];
    }
}
