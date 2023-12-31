<nav class="px-4 md:py-4 xl:px-0 md:container md:mx-w-6xl md:mx-auto">
    <div class="hidden lg:flex lg:justify-between lg:items-center">
        <div class="flex items-start space-x-2">
            <div class="text-white px-2 rounded-md">
                <a href="{{ route('dashboard') }}">
                    <img src="/image/logo.png" style="width: 100%; height: 6rem;">
                </a>
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
                <li>
                    <a href="{{ route('lista') }}">
                        <svg class="w-7 h-7 fill-[#ffffff]" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z">
                            </path>
                        </svg>
                    </a>
                </li>
                <li>{{-- Perfil User --}}
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="m-1 space-x-3 flex">
                            <x-icon name="m-user" class="w-7 h-7 text-white" />
                        </label>
                        <ul tabindex="0"
                            class="menu dropdown-content z-[1] p-2 shadow bg-base-100 rounded-box w-52 mt-4">
                            <li>
                                <p class="font-semibold text-white pointer-events-none">
                                    {{ $this->nome }}
                                </p>
                                <x-menu-item class="text-white" title="Configuração Usuário" icon="m-cog-8-tooth"
                                    onclick="editUser.showModal()" />
                                <dialog id="editUser" class="modal backdrop-blur-[4px] bg-[#33333396]">
                                    <div class="modal-box backdrop-blur-2xl bg-[#333333cd]">
                                        <livewire:components.modal-edit-user />
                                    </div>
                                    <form method="dialog" class="modal-backdrop">
                                        <button></button>
                                    </form>
                                </dialog>
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
    <div x-data="{ open: false }" class="lg:hidden relative flex justify-between items-center w-full text-white py-2">
        <div class="flex flex-row">
            <div class="flex items-start space-x-2">
                <div class="text-white px-2 rounded-md">
                    <img src="/image/logo.png" style="width: 100%; height: 4rem;">
                </div>
            </div>
            <div>
                <ul class="flex space-x-2 xl:space-x-4 text-sm font-semibold">
                    <p class="text-lg block font-bold tracking-widest capitalize text-white">
                        CulinArt
                        <span class="block font-semibold text-right -mr-6 tracking-widest capitalize text-white">
                            Burger
                        </span>
                    </p>
                </ul>
            </div>
        </div>
        <div class="flex flex-row items-center space-x-2">
            {{-- Carrinho --}}
            <livewire:components.carrinho />
            <div class="dropdown dropdown-bottom dropdown-end">
                <label tabindex="0" class="m-1 space-x-3 flex">
                    <x-icon name="m-user" class="w-7 h-7 text-white" />
                </label>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <p class="font-semibold text-white">
                            {{ $this->nome }}
                        </p>
                        <x-menu-item class="text-whtie" title="Configuração Usuário" icon="m-cog-8-tooth"
                            onclick="my_modal_2.showModal()" />
                    </li>
                    <x-menu-separator />
                    <li>
                        <x-menu-item class="text-white" title="Sair" icon="m-arrow-right-on-rectangle"
                            wire:click="logout" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
