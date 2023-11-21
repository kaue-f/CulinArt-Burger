<section class="py-10 px-4 backdrop-blur-[3px] bg-[#33333396] rounded-xl h-auto min-h-full w-auto">
    <div class="flex flex-col text-center text-black gap-2" x-data="{ open: false }">
        <div class="space-y-4">
            <h3 class="text-5xl font-semibold text-white">CulinArt Burger</h3>
            <h3 class="text-3xl font-medium text-white" :class="open ? 'hidden' : ''" x-transition>Login</h3>
            <h3 class="text-3xl font-medium text-white" :class="open ? '' : 'hidden'" x-transition>Registrar</h3>
        </div>
        {{-- Login --}}
        <div class="justify-center px-8 w-[35rem] max-w-md text-white" :class="open ? 'hidden' : ''" x-transition>
            <x-form wire:submit="logged" class="space-y-4">
                <div class="form-control w-full max-w-md">
                    <label class="label">
                        <span class="text-lg font-medium">Login</span>
                    </label>
                    <x-input class="border-0 focus:outline-none" label="Digite Email" icon="o-user" inline
                        wire:model="loginDTO.login" />
                </div>
                <div x-data="{ open: false }" class="form-control w-full max-w-md">
                    <label class="label">
                        <span class="text-lg font-medium">Senha</span>
                    </label>
                    <x-input x-bind:type="open ? 'text' : 'password'" class="focus:outline-none border-0 input"
                        label="Digite Senha" icon="m-key" inline wire:model="loginDTO.senha">
                        <x-slot:append>
                            <label class="swap mr-2">
                                <input type="checkbox" @click="open = !open" tabindex="-1" />
                                <x-icon name="m-eye-slash" class="w-7 h-6 mx-2 swap-off" />
                                <x-icon name="m-eye" class="w-7 h-6 mx-2 swap-on" />
                            </label>
                        </x-slot:append>
                    </x-input>
                </div>
                <x-slot:actions>
                    <div class="flex justify-between w-full">
                        <x-button label="Registar" class="btn-secondary mt-6 text-white" spinner="register"
                            x-on:click="open =! open" />
                        <x-button label="Entrar" class="btn-primary mt-6 mb-3 text-white" type="submit"
                            spinner="logged" />
                    </div>
                </x-slot:actions>
            </x-form>
        </div>
        {{-- Registrar --}}
        <div class="justify-center px-8 w-[40rem] max-w-2xl text-white" :class="open ? '' : 'hidden'" x-transition>
            <x-form wire:submit="register">
                <div class="flex flex-row space-x-4">
                    <div class="form-control w-[24rem] max-w-sm">
                        <label class="label">
                            <span class="text-lg font-medium">Nome</span>
                        </label>
                        <x-input class="border-0 focus:outline-none" label="Digite Nome" icon="o-user" inline
                            wire:model="cadastrarUserDTO.nome" autocomplete="off" />
                    </div>
                    <div class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="text-lg font-medium">Sobrenome</span>
                        </label>
                        <x-input class="border-0 focus:outline-none" label="Digite Sobrenome" icon="o-user"
                            wire:model="cadastrarUserDTO.sobrenome" inline autocomplete="off" />
                    </div>
                </div>
                <div class="form-control w-full max-w-xl">
                    <label class="label">
                        <span class="text-lg font-medium">Email</span>
                    </label>
                    <x-input class="border-0 focus:outline-none" label="Digite Email" icon="o-envelope" inline
                        wire:model="cadastrarUserDTO.email" autocomplete="off" />
                </div>
                <div class="flex flex-row space-x-4">
                    <div class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="text-lg font-medium">CPF</span>
                        </label>
                        <x-input class="border-0 focus:outline-none" label="Digite CPF" icon="o-user" inline
                            x-mask="999.999.999-99" wire:model="cadastrarUserDTO.cpf" autocomplete="off" />
                    </div>
                    <div class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="text-lg font-medium">Telefone</span>
                        </label>
                        <x-input x-mask="99 99999-9999" class="border-0 focus:outline-none" label="Digite Telefone"
                            icon="o-device-phone-mobile" wire:model="cadastrarUserDTO.telefone" inline
                            autocomplete="off" />
                    </div>
                </div>
                <div class="flex flex-row space-x-4">
                    <div x-data="{ open: false }" class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="text-lg font-medium">Senha</span>
                        </label>
                        <x-input x-bind:type="open ? 'text' : 'password'" class="focus:outline-none border-0 input"
                            label="Digite Senha" icon="m-key" wire:model="cadastrarUserDTO.senha" inline>
                            <x-slot:append>
                                <label class="swap mr-2">
                                    <input type="checkbox" @click="open = !open" tabindex="-1" />
                                    <x-icon name="m-eye-slash" class="w-7 h-6 mx-2 swap-off" />
                                    <x-icon name="m-eye" class="w-7 h-6 mx-2 swap-on" />
                                </label>
                            </x-slot:append>
                        </x-input>
                    </div>
                    <div x-data="{ open: false }" class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="text-lg font-medium">Confirmar Senha</span>
                        </label>
                        <x-input x-bind:type="open ? 'text' : 'password'" class="focus:outline-none border-0 input"
                            label="Confirme Senha" icon="m-key" wire:model="password" inline>
                            <x-slot:append>
                                <label class="swap mr-2">
                                    <input type="checkbox" @click="open = !open" tabindex="-1" />
                                    <x-icon name="m-eye-slash" class="w-7 h-6 mx-2 swap-off" />
                                    <x-icon name="m-eye" class="w-7 h-6 mx-2 swap-on" />
                                </label>
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
