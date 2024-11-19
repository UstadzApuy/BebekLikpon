<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use illuminate\Support\Str;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Menu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(debounce: '1000')
                    ->afterStateUpdated(function($set,$state){
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\FileUpload::make('thumbnail')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Select::make('tipe')
                    ->options([
                        'Ala Carte' => 'Ala Carte',
                        'Paket' => 'Paket',
                    ])
                    ->required(),
                    Forms\Components\Select::make('kategori')
                    ->options([
                        'Makanan' => 'Makanan',
                        'Minuman' => 'Minuman',
                    ])
                    ->required()
                    ->reactive() // Agar perubahan kategori langsung mempengaruhi extra
                    ->afterStateUpdated(function ($set, $state) {
                        // Reset extra saat kategori berubah
                        if ($state === 'Makanan') {
                            $set('extra', 'Terong, Timun, Kol Putih');
                        } elseif ($state === 'Minuman') {
                            $set('extra', 'Es, Lemon Slice');
                        } else {
                            $set('extra', '');
                        }
                    }),
                
                Forms\Components\TextInput::make('extra')
                    ->label('Komponen Tambahan')
                    ->hint('Pisahkan dengan koma, contoh: "Terong, Timun, Kol Putih"')
                    ->default('') // Inisiasi default untuk mempermudah perubahan
                    ->visible(fn (callable $get) => in_array($get('kategori'), ['Makanan', 'Minuman']))
                    ->afterStateUpdated(function ($state) {
                        // Tidak perlu mengubah apapun, cukup simpan sebagai string
                    }),
                
                Forms\Components\Textarea::make('description')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori')->label('Kategori'),
                Tables\Columns\TextColumn::make('tipe')->label('Tipe Menu'),
                Tables\Columns\TextColumn::make('extra')
                ->label('Komponen Tambahan'),
                Tables\Columns\TextColumn::make('description')->label('Deskripsi'),
            
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
