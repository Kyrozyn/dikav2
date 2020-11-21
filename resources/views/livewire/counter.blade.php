<div style="text-align: center">
    <div style="display: {{$display}}">
        <button wire:click="increment">+</button>
        <h1>{{ $count }}</h1>
        <div wire:loading>
            Processing Payment...
        </div>
    </div>
    <button wire:click="display">hide</button>
</div>

