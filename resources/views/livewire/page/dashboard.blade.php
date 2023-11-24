<div class="text-black">
    <div class="flex flex-row justify-end p-2">
        <x-input class="rounded-2xl bg-white border-0 focus:outline-none text-black w-full max-w-md h-10"
            placeholder="Search" wire:model.live="search" icon-right="s-magnifying-glass" />
    </div>
    <x-tabs class="flex justify-center text-white tabs-lg" wire:model="selectedTab" selected="all-tab">
        <x-tab name="all-tab" label="All">
            <div class="mb-12 mt-6 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($itens as $item)
                    <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                        <div
                            class="bg-clip-border mx-4 rounded-xl overflow-hidden  shadow-blue-500/40 shadow-lg absolute -mt-6 grid h-24 w-auto place-items-center">
                            <img class="bg-cover" src="{{ $item['imagem'] }}" style="width:100%; height:6rem;">
                        </div>
                        <div class="p-4 text-right ml-[50%]">
                            <p class="block antialiased text-xl font-medium leading-normal text-black">
                                {{ $item['item'] }}
                            </p>
                            <h4 class="block antialiased tracking-normal text-lg leading-snug text-black">
                                R$ <span class="text-2xl font-semibold">{{ $item['valor'] }}</span>
                            </h4>
                        </div>
                        <div class=" flex flex-col border-t border-blue-gray-100 p-4 space-y-3">
                            <p class="block antialiased leading-relaxed text-black">
                                {{ $item['descricao'] }}
                            </p>
                            <div class="flex justify-between items-center">
                                <p class="text-sm">{{ $item['categoria'] }}</p>
                                <x-button label="Adicionar" class="btn-info btn-sm"
                                    wire:click="selectItem({{ $item['id'] }})" />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-tab>

        <x-tab class="" name="burgers-tab" label="Burgers">
            <div class="mb-12 mt-6 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($itens as $item)
                    @if ($item['categoria'] == 'Burgers')
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div
                                class="bg-clip-border mx-4 rounded-xl overflow-hidden  shadow-blue-500/40 shadow-lg absolute -mt-6 grid h-24 w-auto place-items-center">
                                <img class="bg-cover" src="{{ $item['imagem'] }}" style="width:100%; height:6rem;">
                            </div>
                            <div class="p-4 text-right ml-[50%]">
                                <p class="block antialiased text-xl font-medium leading-normal text-black">
                                    {{ $item['item'] }}
                                </p>
                                <h4 class="block antialiased tracking-normal text-lg leading-snug text-black">
                                    R$ <span class="text-2xl font-semibold">{{ $item['valor'] }}</span>
                                </h4>
                            </div>
                            <div class=" flex flex-col border-t border-blue-gray-100 p-4">
                                <p class="block antialiased leading-relaxed text-black">
                                    {{ $item['descricao'] }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <p class="text-sm">{{ $item['categoria'] }}</p>
                                    <x-button label="Adicionar" class="btn-info btn-sm"
                                        wire:click="selectItem({{ $item['id'] }})" />
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </x-tab>

        <x-tab name="veganos-tab" label="Burgers Veganos e Vegetarianos">
            <div class="mb-12 mt-6 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($itens as $item)
                    @if ($item['categoria'] == 'Burgers Veganos e Vegetarianos')
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div
                                class="bg-clip-border mx-4 rounded-xl overflow-hidden  shadow-blue-500/40 shadow-lg absolute -mt-6 grid h-24 w-auto place-items-center">
                                <img class="bg-cover" src="{{ $item['imagem'] }}" style="width:100%; height:6rem;">
                            </div>
                            <div class="p-4 text-right ml-[50%]">
                                <p class="block antialiased text-xl font-medium leading-normal text-black">
                                    {{ $item['item'] }}
                                </p>
                                <h4 class="block antialiased tracking-normal text-lg leading-snug text-black">
                                    R$ <span class="text-2xl font-semibold">{{ $item['valor'] }}</span>
                                </h4>
                            </div>
                            <div class=" flex flex-col border-t border-blue-gray-100 p-4">
                                <p class="block antialiased leading-relaxed text-black">
                                    {{ $item['descricao'] }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <p class="text-sm">{{ $item['categoria'] }}</p>
                                    <x-button label="Adicionar" class="btn-info btn-sm"
                                        wire:click="selectItem({{ $item['id'] }})" />
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </x-tab>

        <x-tab name="acompanhamentos-tab" label="Acompanhamentos">
            <div class="mb-12 mt-6 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($itens as $item)
                    @if ($item['categoria'] == 'Acompanhamentos')
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div
                                class="bg-clip-border mx-4 rounded-xl overflow-hidden  shadow-blue-500/40 shadow-lg absolute -mt-6 grid h-24 w-auto place-items-center">
                                <img class="bg-cover" src="{{ $item['imagem'] }}" style="width:100%; height:6rem;">
                            </div>
                            <div class="p-4 text-right ml-[50%]">
                                <p class="block antialiased text-xl font-medium leading-normal text-black">
                                    {{ $item['item'] }}
                                </p>
                                <h4 class="block antialiased tracking-normal text-lg leading-snug text-black">
                                    R$ <span class="text-2xl font-semibold">{{ $item['valor'] }}</span>
                                </h4>
                            </div>
                            <div class=" flex flex-col border-t border-blue-gray-100 p-4">
                                <p class="block antialiased leading-relaxed text-black">
                                    {{ $item['descricao'] }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <p class="text-sm">{{ $item['categoria'] }}</p>
                                    <x-button label="Adicionar" class="btn-info btn-sm"
                                        wire:click="selectItem({{ $item['id'] }})" />
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </x-tab>

        <x-tab class="" name="sobremesas-tab" label="Sobremesas">
            <div class="mb-12 mt-6 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($itens as $item)
                    @if ($item['categoria'] == 'Sobremesas')
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div
                                class="bg-clip-border mx-4 rounded-xl overflow-hidden  shadow-blue-500/40 shadow-lg absolute -mt-6 grid h-24 w-auto place-items-center">
                                <img class="bg-cover" src="{{ $item['imagem'] }}" style="width:100%; height:6rem;">
                            </div>
                            <div class="p-4 text-right ml-[50%]">
                                <p class="block antialiased text-xl font-medium leading-normal text-black">
                                    {{ $item['item'] }}
                                </p>
                                <h4 class="block antialiased tracking-normal text-lg leading-snug text-black">
                                    R$ <span class="text-2xl font-semibold">{{ $item['valor'] }}</span>
                                </h4>
                            </div>
                            <div class=" flex flex-col border-t border-blue-gray-100 p-4">
                                <p class="block antialiased leading-relaxed text-black">
                                    {{ $item['descricao'] }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <p class="text-sm">{{ $item['categoria'] }}</p>
                                    <x-button label="Adicionar" class="btn-info btn-sm"
                                        wire:click="selectItem({{ $item['id'] }})" />
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </x-tab>

        <x-tab name="bebidas-tab" label="Bebidas">
            <div class="mb-12 mt-6 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($itens as $item)
                    @if ($item['categoria'] == 'Bebidas')
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div
                                class="bg-clip-border mx-4 rounded-xl overflow-hidden  shadow-blue-500/40 shadow-lg absolute -mt-6 grid h-24 w-auto place-items-center">
                                <img class="bg-cover" src="{{ $item['imagem'] }}" style="width:100%; height:6rem;">
                            </div>
                            <div class="p-4 text-right ml-[50%]">
                                <p class="block antialiased text-xl font-medium leading-normal text-black">
                                    {{ $item['item'] }}
                                </p>
                                <h4 class="block antialiased tracking-normal text-lg leading-snug text-black">
                                    R$ <span class="text-2xl font-semibold">{{ $item['valor'] }}</span>
                                </h4>
                            </div>
                            <div class=" flex flex-col border-t border-blue-gray-100 p-4">
                                <p class="block antialiased leading-relaxed text-black">
                                    {{ $item['descricao'] }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <p class="text-sm">{{ $item['categoria'] }}</p>
                                    <x-button label="Adicionar" class="btn-info btn-sm"
                                        wire:click="selectItem({{ $item['id'] }})" />
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </x-tab>

    </x-tabs>
</div>
