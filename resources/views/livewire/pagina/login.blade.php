<section class="py-10 px-4 backdrop-blur-[10px] bg-[#fff0] rounded-xl h-auto min-h-full w-auto">
    <div class="flex flex-col text-center text-black gap-2" x-data="{ open: false }">
        <div class="space-y-4">
            <h3 class="text-5xl font-semibold text-white">CulinArt Burger</h3>
            <h3 class="text-3xl font-medium text-white" :class="open ? 'hidden' : ''" x-transition>Login</h3>
            <h3 class="text-3xl font-medium text-white" :class="open ? '' : 'hidden'" x-transition>Registrar</h3>
        </div>
        {{-- Login --}}
        <div class="justify-center px-8 w-[35rem] max-w-md text-white" :class="open ? 'hidden' : ''" x-transition>
            <form wire:submit="logged" class="space-y-4">
                <div class="form-control w-full max-w-md">
                    <label class="label">
                        <span class="text-lg font-medium">Login</span>
                    </label>
                    <x-input class="border-0 focus:outline-none" label="Digite Email" icon="o-user" inline />
                </div>
                <div class="form-control w-full max-w-md">
                    <label class="label">
                        <span class="text-lg font-medium">Senha</span>
                    </label>
                    <x-input class="focus:outline-none border-0 input" label="Digite Senha" icon="m-key" inline>
                        <x-slot:append>
                            <button
                                class="w-auto h-auto rounded-r-none border-r-o hover:bg-transparent border-0 hover:border-0">
                                <x-icon name="m-eye-slash" class="w-7 h-6 mx-2" />
                            </button>
                        </x-slot:append>
                    </x-input>
                </div>
                <div class="flex justify-between">
                    <x-button label="Registar" class="btn-secondary mt-6 text-white" spinner="register"
                        x-on:click="open =! open" />
                    <x-button label="Entrar" class="btn-primary mt-6 mb-3 text-white" type="submit" spinner="logged" />
                </div>
            </form>
        </div>
        {{-- Registra --}}
        <div class="justify-center px-8 w-[40rem] max-w-2xl text-white" :class="open ? '' : 'hidden'" x-transition>
            <x-form wire:submit="register">
                <div class="flex flex-row space-x-4">
                    <div class="form-control w-[24rem] max-w-sm">
                        <label class="label">
                            <span class="text-lg font-medium">Nome</span>
                        </label>
                        <x-input class="border-0 focus:outline-none" label="Digite Nome" icon="o-user" inline
                            wire:modal="cadastrarUserDTO.nome" />
                    </div>
                    <div class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="text-lg font-medium">Sobrenome</span>
                        </label>
                        <x-input class="border-0 focus:outline-none" label="Digite Sobrenome" icon="o-user"
                            wire:modal="cadastrarUserDTO.sobrenome" inline />
                    </div>
                </div>
                <div class="form-control w-full max-w-xl">
                    <label class="label">
                        <span class="text-lg font-medium">Email</span>
                    </label>
                    <x-input class="border-0 focus:outline-none" label="Digite Email" icon="o-envelope" inline />
                </div>
                <div class="flex flex-row space-x-4">
                    <div class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="text-lg font-medium">CPF</span>
                        </label>
                        <x-input class="border-0 focus:outline-none" label="Digite CPF" icon="o-user" inline />
                    </div>
                    <div class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="text-lg font-medium">Telefone</span>
                        </label>
                        <x-input class="border-0 focus:outline-none" label="Digite Telefone"
                            icon="o-device-phone-mobile" inline />
                    </div>
                </div>
                <div class="flex flex-row space-x-4">
                    <div class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="text-lg font-medium">Senha</span>
                        </label>
                        <x-input class="focus:outline-none border-0 input" label="Digite Senha" icon="m-key" inline>
                            <x-slot:append>
                                <button
                                    class="w-auto h-auto rounded-r-none border-r-o hover:bg-transparent border-0 hover:border-0">
                                    <x-icon name="m-eye-slash" class="w-7 h-6 mx-2" />
                                </button>
                            </x-slot:append>
                        </x-input>
                    </div>
                    <div class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="text-lg font-medium">Confirmar Senha</span>
                        </label>
                        <x-input class="focus:outline-none border-0 input" label="Confirme Senha" icon="m-key" inline>
                            <x-slot:append>
                                <button
                                    class="w-auto h-auto rounded-r-none border-r-o hover:bg-transparent border-0 hover:border-0">
                                    <x-icon name="m-eye-slash" class="w-7 h-6 mx-2" />
                                </button>
                            </x-slot:append>
                        </x-input>
                    </div>
                </div>
                <x-slot:actions>
                    <div class="flex justify-between w-full">
                        <x-button label="Logar" class="btn-secondary mt-6 text-white" x-on:click="open =! open" />
                        <x-button label="Cadastrar" class="btn-primary mt-6 mb-3 text-white" type="submit"
                            spinner="register" />
                    </div>
                </x-slot:actions>
            </x-form>
        </div>
    </div>
</section>
