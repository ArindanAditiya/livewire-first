<div>
    <div class="">
        <h1 class="text-4xl font-bold mb-4">Counter: {{ $counter }}</h1>

        <button wire:click="decrement" class="px-4 py-2 bg-white rounded border border-black hover:border-[#00aa00]">−</button>    
        <button wire:click="increment" class="px-4 py-2 bg-white rounded border border-black hover:border-[#00aa00]">+</button>
    </div>
</div>