<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg font-bold mb-4">Bahan Perlu Stok</h2>

        <!-- Notifikasi sukses -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <ul>
                @forelse ($bahans as $bahan)
                <li class="mb-4">
                    <strong>{{ $bahan->nama_bahan }}</strong> - {{ $bahan->jumlah_stok }} (min: {{ $bahan->minimum_stok }})

                    {{-- <form method="POST" action="{{ route('bahan.update', $bahan->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label for="jumlah_stok_{{ $bahan->id }}">Jumlah Stok:</label>
                            <input type="number" id="jumlah_stok_{{ $bahan->id }}" name="jumlah_stok" value="{{ $bahan->jumlah_stok }}" min="0" class="border p-2 w-full">
                        </div>

                        <div class="mb-2">
                            <label for="harga_terakhir_{{ $bahan->id }}">Harga Terakhir:</label>
                            <input type="number" id="harga_terakhir_{{ $bahan->id }}" name="harga_terakhir" value="{{ $bahan->harga_terakhir }}" min="0" class="border p-2 w-full">
                        </div>

                        <div class="mb-2">
                            <label for="tanggal_terakhir_stok_{{ $bahan->id }}">Tanggal Terakhir Stok:</label>
                            <input type="date" id="tanggal_terakhir_stok_{{ $bahan->id }}" name="tanggal_terakhir_stok" value="{{ $bahan->tanggal_terakhir_stok }}" class="border p-2 w-full">
                        </div>

                        <button type="submit" class="bg-green-500 text-white p-2 mt-2 w-full">Update Stok</button>
                    </form> --}}
                </li>
            @empty
                <li>Tidak ada bahan yang perlu diisi ulang.</li>
            @endforelse
        </ul>
    </x-filament::card>
</x-filament::widget>
