<div class="text-white">
    <div class="flex justify-between items-center pb-2">
        <h4 class="text-2xl font-semibold">Editar Usuário</h4>
        <x-icon class="text-white hover:text-red-500 w-8 h-8" name="m-x-mark" onclick="editUser.close()" />
    </div>
    <x-form wire:submit="edite">
        <div class="flex flex-row space-x-4">
            <div class="form-control w-full max-w-sm">
                <label class="label">
                    <span class="text-lg font-medium">Nome</span>
                </label>
                <x-input class="border-0 focus:outline-none" icon="o-user" inline wire:model="editeUserDTO.nome"
                    autocomplete="off" disabled />
            </div>
            <div class="form-control w-full max-w-md">
                <label class="label">
                    <span class="text-lg font-medium">Sobrenome</span>
                </label>
                <x-input class="border-0 focus:outline-none" icon="o-user" wire:model="editeUserDTO.sobrenome" inline
                    autocomplete="off" disabled />
            </div>
        </div>
        <div class="form-control w-full max-w-xl">
            <label class="label">
                <span class="text-lg font-medium">Email</span>
            </label>
            <x-input class="border-0 focus:outline-none" label="Digite Email" icon="o-envelope" inline
                wire:model="editeUserDTO.email" autocomplete="off" />
        </div>
        <div class="flex flex-row space-x-4">
            <div class="form-control w-full max-w-md">
                <label class="label">
                    <span class="text-lg font-medium">CPF</span>
                </label>
                <x-input class="border-0 focus:outline-none" icon="o-user" inline x-mask="999.999.999-99"
                    wire:model="editeUserDTO.cpf" autocomplete="off" disabled />
            </div>
            <div class="form-control w-full max-w-md">
                <label class="label">
                    <span class="text-lg font-medium">Telefone</span>
                </label>
                <x-input x-mask="99 99999-9999" class="border-0 focus:outline-none" label="Digite Telefone"
                    icon="o-device-phone-mobile" wire:model="editeUserDTO.telefone" inline autocomplete="off" />
            </div>
        </div>
        <div class="flex flex-row space-x-4">
            <div x-data="{ open: false }" class="form-control w-full max-w-md">
                <label class="label">
                    <span class="text-lg font-medium">Senha</span>
                </label>
                <x-input x-bind:type="open ? 'text' : 'password'" class="focus:outline-none border-0 input"
                    label="Digite Senha" icon="m-key" wire:model="editeUserDTO.senha" inline>
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
                <x-button label="Deletar Usuário" class="btn-error mt-6 text-white" onclick="deleteUser.showModal()" />
                <dialog id="deleteUser" class="modal">
                    <div class="modal-box">
                        <a class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                            onclick="deleteUser.close()">✕</a>
                        <div class="flex flex-col">
                            <h3 class="font-bold text-xl">Você Decidiu Partir 😢</h3>
                            <p class="py-2 font-medium">
                                Parece que você tá dando um tchauzinho pra gente. Se esse é o caminho que você precisa
                                seguir, estamos aqui para respeitar. Digite sua senha e clique para confirmar exclusão.
                            </p>
                            <div x-data="{ open: false }" class="form-control w-full max-w-md">
                                <label class="label">
                                    <span class="text-lg font-medium">Senha</span>
                                </label>
                                <x-input x-bind:type="open ? 'text' : 'password'"
                                    class="focus:outline-none border-r-0 focus:border-y-white border-y-white focus:border-l-white border-l-white input"
                                    label="Digite Senha" icon="m-key" wire:model="deletePassword" inline>
                                    <x-slot:append>
                                        <label
                                            class="swap mr-2 h-full rounded-r-lg border-l-0 border border-y-white border-r-white">
                                            <input type="checkbox" @click="open = !open" tabindex="-1" />
                                            <x-icon name="m-eye-slash" class="w-7 h-6 mx-2 swap-off" />
                                            <x-icon name="m-eye" class="w-7 h-6 mx-2 swap-on" />
                                        </label>
                                    </x-slot:append>
                                </x-input>
                            </div>
                        </div>
                        <div class="flex flex-row justify-between items-center py-3">
                            <x-button label="Errei, fui moleque!" class="btn-success text-white"
                                onclick="deleteUser.close()" />
                            <x-button label="Isso é um Adeus!" class="btn-error text-white"
                                wire:click="delete('{{ $editeUserDTO['id'] }}')" />
                        </div>
                    </div>
                </dialog>
                <x-button label="Atualizar Usuário" class="btn-primary mt-6 mb-3 text-white" type="submit"
                    spinner="register" />
            </div>
        </x-slot:actions>
    </x-form>
</div>
