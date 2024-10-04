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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Forms\Components\CheckboxList::make('tipemasak')
                    ->required()
                    ->options([
                        'goreng' => 'Goreng',
                        'bakar' => 'Bakar',
                        'rebus' => 'Rebus',
                        'panggang' => 'Panggang',
                    ])
                    ->columns(2)
                    ->label('Tipe Masak')
                    ->afterStateHydrated(function ($component, $state) {
                        // Check if the state is already an array, if not, convert it
                        if (is_string($state)) {
                            $component->state(explode(',', $state));
                        }
                    })
                    ->dehydrateStateUsing(function ($state) {
                        // Ensure the state is saved as a string
                        return is_array($state) ? implode(',', $state) : $state;
                    }),                
                Forms\Components\TextInput::make('lalapan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sambal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('paket')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('tipemasak')
                    ->searchable(),
                Tables\Columns\TextColumn::make('paket')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
