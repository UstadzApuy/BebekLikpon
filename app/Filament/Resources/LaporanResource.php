<?php

namespace App\Filament\Resources;

use App\Exports\OrdersExport;
use App\Filament\Resources\LaporanResource\Pages;
use App\Filament\Resources\LaporanResource\RelationManagers;
use App\Models\Laporan;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use App\Models\Pemesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action as ActionsAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;

class LaporanResource extends Resource
{
    protected static ?string $model = Pemesanan::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';
    protected static ?string $navigationLabel = 'Laporan Penjualan';

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('id')->label('Order ID'),
            TextColumn::make('user.name')->label('Customer'),
            TextColumn::make('items_summary')->label('Order Summary')
                ->wrap()
                ->extraAttributes(['style' => 'white-space: pre-line;']),
            TextColumn::make('total_order_price')->label('Total Order Price')->money()->sortable(),
            TextColumn::make('status')->label('Status'),
            TextColumn::make('created_at')->label('Date')->dateTime(),
        ])

        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->label('Status')
                ->options([
                    'completed' => 'Completed',
                ])
                ->default('completed'),
        ])
        ->actions([
            
                Action::make('export_pdf')
                    ->label('Export PDF')
                    ->icon('heroicon-o-document-text')
                    ->action(function ($record) { // $record merepresentasikan baris data
                        $order = Pemesanan::with(['user', 'items.menu'])
                            ->find($record->id); // Cari pesanan berdasarkan ID
                        
                        if (!$order) {
                            throw new \Exception('Order not found!');
                        }

                        $pdf = Pdf::loadView('exports.order', ['order' => $order]);
                        return response()->streamDownload(
                            fn () => print($pdf->stream()),
                            'order_' . $order->id . '_report.pdf'
                        );
                    }),
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
            'index' => Pages\ListLaporans::route('/'),
        ];
    }
    
}
