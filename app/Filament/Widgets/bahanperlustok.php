<?php

namespace App\Filament\Widgets;

use App\Models\Bahan;
use Filament\Widgets\Widget;
use Illuminate\Http\Request;

class bahanperlustok extends Widget
{
    public $bahan_perlu_stok;

    protected static ?string $heading = 'Bahan Perlu Stok';
    
    protected static string $view = 'filament.widgets.bahanperlustok';

    protected function getViewData(): array
    {
        return [
            'bahans' => Bahan::whereColumn('jumlah_stok', '<', 'minimum_stok')->get(),
        ];
    }

    public function updateStok(Request $request, $id)
    {
        $validated = $request->validate([
            'jumlah_stok' => 'required|numeric|min:0',
            'harga_terakhir' => 'required|numeric|min:0',
            'tanggal_terakhir_stok' => 'required|date',
        ]);

        $bahan = Bahan::findOrFail($id);
        $bahan->update($validated);

        return redirect()->back()->with('success', 'Stok bahan berhasil diperbarui.');
    }
}
