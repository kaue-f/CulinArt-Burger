<nav class="p-4 md:py-8 xl:px-0 md:container md:mx-w-6xl md:mx-auto">
    <div class="hidden lg:flex lg:justify-between lg:items-center">
        <div class="flex items-start space-x-2">
            <div class="text-white px-2 rounded-md">
                <img src="/image/logo.png" style="width: 100%; height: 6rem;">
            </div>
        </div>
        <div>
            <ul class="flex space-x-2 xl:space-x-4 text-sm font-semibold">
                <p class="text-5xl block font-bold tracking-widest capitalize text-white">
                    CulinArt
                    <span class="text-4xl block font-semibold text-right -mr-12 tracking-widest capitalize text-white">
                        Burger
                    </span>
                </p>
            </ul>
        </div>
        <div class="flex items-start">
            <ul class="flex items-center gap-6">
                <li> {{-- Carrinho --}}
                    <livewire:components.carrinho />
                </li>

                <li>{{-- Perfil User --}}
                    <div class="dropdown">
                        <label tabindex="0" class="m-1 space-x-3 flex">
                            <p class="font-semibold text-white text-lg">
                                {{ $this->nome }}
                            </p>
                            <x-icon name="m-user" class="w-7 h-7 text-white" />
                        </label>
                        <ul tabindex="0"
                            class="menu dropdown-content z-[1] p-2 shadow bg-base-100 rounded-box w-52 mt-4">
                            <li>
                                <x-menu-item class="text-whtie" title="Configuração Usuário" icon="m-cog-8-tooth" />
                            </li>
                            <x-menu-separator />
                            <li>
                                <x-menu-item class="text-white" title="Sair" icon="m-arrow-right-on-rectangle"
                                    wire:click="logout" />
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    {{-- Modo sm --}}
    <div x-data="{ open: false }" class="lg:hidden relative flex justify-between w-full text-white">
        <a href="#" class="flex items-start gap-2 group">
            <div class="bg-blue-600 text-white p-3 rounded-md group-hover:bg-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <p class="text-2xl block font-bold tracking-widest capitalize text-white">
                CulinArt
                <span class="text-xl block font-bold tracking-widest capitalize">
                    Burger
                </span>
            </p>
        </a>
        <x-dropdown icon="o-bars-4" class="btn-outline">
            {{-- By default any click closes dropdown --}}
            <li>
                <a href="#" class="font-sans text-white font-semibold tracking-wider">
                    Derol Hakim
                </a>
            </li>

            <x-menu-separator />

            {{-- Use `@click.STOP` to stop event propagation --}}
            <x-menu-item title="Editar Usuário" @click.stop="alert('Keep open')" />

            <x-menu-separator />

            <x-menu-item @click.stop="">
                <x-checkbox label="Activate" />
            </x-menu-item>
        </x-dropdown>
    </div>
</nav>
