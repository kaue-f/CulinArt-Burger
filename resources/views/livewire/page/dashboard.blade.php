<div class="mt-4">
    <x-tabs class="flex justify-center text-white text-lg tabs-lg" wire:model="selectedTab" selected="all-tab">
        <x-tab name="all-tab" label="All">
            <div class="mb-12 mt-6 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($this->item as $item)
                    <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                        <div
                            class="bg-clip-border mx-4 rounded-xl overflow-hidden  shadow-blue-500/40 shadow-lg absolute -mt-6 grid h-24 w-auto place-items-center">
                            <img class="bg-cover" src="/image/cardapio/Agua.jpg" style="width:100; height:6rem;">
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased text-xl font-medium leading-normal text-black">
                                {{ $item['item'] }}
                            </p>
                            <h4 class="block antialiased tracking-normal text-lg leading-snug text-black">
                                R$ <span class="text-2xl font-semibold">20,00</span>
                            </h4>
                        </div>
                        <div class=" flex flex-col border-t border-blue-gray-100 p-4">
                            <p class="block antialiased leading-relaxed text-black">
                                Para os amantes de pimenta! Hambúrguer apimentado com queijo pepper jack, jalapeños,
                                alface
                                e maionese de chipotle.
                            </p>
                            <div class="flex justify-between items-center">
                                <p class="text-sm">Bebidas</p>
                                <x-button label="Adicionar" class="btn-info btn-sm" />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-tab>

        <x-tab class="" name="burgers-tab" label="Burgers">

        </x-tab>

        <x-tab name="veganos-tab" label="Burgers Veganos e Vegetarianos">

        </x-tab>
        <x-tab name="acompanhamentos-tab" label="Acompanhamentos">

        </x-tab>

        <x-tab class="" name="sobremesas-tab" label="Sobremesas">

        </x-tab>

        <x-tab name="bebidas-tab" label="Bebidas">

        </x-tab>

    </x-tabs>
</div>
