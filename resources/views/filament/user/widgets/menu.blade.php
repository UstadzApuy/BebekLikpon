<x-filament-widgets::widget>
    <x-filament::section>
        <div>
            <h3>Menu</h3>
            <form wire:submit.prevent="submit">
                @foreach ($this->getMenuItems() as $item)
                    <div>
                        <img src="{{ $item->thumbnail }}" alt="{{ $item->title }}" />
                        <label>{{ $item->title }} ({{ $item->price }})</label>
                        <div>
                            <button type="button" wire:click="decrement({{ $item->id }})">-</button>
                            <input type="number" name="quantity[{{ $item->id }}]" min="0" value="0" readonly />
                            <button type="button" wire:click="increment({{ $item->id }})">+</button>
                        </div>
                    </div>
                @endforeach
                <button type="submit">Confirm Transaction</button>
            </form>
        </div>
        
    </x-filament::section>
</x-filament-widgets::widget>
