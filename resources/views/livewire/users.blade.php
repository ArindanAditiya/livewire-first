<div class="w-11/12 max-w-7xl mx-auto my-10 md:my-16">
    <div class="flex flex-col lg:flex-row gap-8 lg:gap-10">
    {{-- form --}}
    @livewire("user-reqister-form", ["lazy" => true])
                
    {{-- list --}}
    @livewire("user-list", ["lazy" => true])  
    </div>
</div>