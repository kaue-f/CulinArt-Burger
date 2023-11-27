<div class="flex flex-row -mt-3 w-[100%] min-h-[84vh] gap-6 px-5 backdrop-blur-[2px] bg-[#13131373] rounded-xl">
    {{-- Pedidos --}}
    <div class="w-[100%] space-y-3 px-4 mt-3">
        <h3 class="text-2xl text-white font-bold pt-5">
            Detalhes do Pedido
        </h3>
        <div class="flex flex-col items-center h-[68vh] space-y-2 overflow-hidden overflow-y-auto rounded-2xl">
            @foreach ($pedidos['listaItens'] as $key => $item)
                <div class="flex w-[95%] h-24 items-center justify-between rounded-xl bg-slate-300 px-3 py-[20px]">
                    <div class="flex items-center gap-3 w-[75%]">
                        <div class="flex h-16 w-auto max-w-[8rem] items-center justify-center">
                            <img class="h-full w-full rounded-xl" src="{{ $item['imagem'] }}" />
                        </div>
                        <div class="flex flex-col">
                            <h5 class="text-2xl font-bold text-black">
                                {{ $item['item'] }}
                            </h5>
                            <p class="mt-1 text-sm font-medium text-black">
                                {{ $item['categoria'] }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-1 flex items-center justify-center text-black w-[15%]">
                        <p class="font-medium">R$: <span class="font-bold text-2xl">{{ $item['valor'] }},00</span></p>
                    </div>
                    <div class="mt-1 flex items-center justify-center w-[5%] text-black tooltip tooltip-error"
                        data-tip="Remover Item">
                        <x-icon name="m-x-mark" class="w-6 h-6 hover:text-red-500"
                            wire:click="removeItem({{ $key }})" />
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex flex-col px-6 pt-3 font-medium text-white text-xl border-t border-gray-300 ">
            <dl>
                <div class="flex justify-between">
                    <dt class="pl-3">Itens no Carrinho</dt>
                    <dd class="pr-3">{{ $countItens }}</dd>
                </div>
            </dl>
        </div>
    </div>
    {{-- Dados --}}
    <div class="flex flex-col w-[100%] px-4 mt-3">
        <div class="flex flex-row justify-between items-center">
            <h3 class="text-2xl text-white font-bold pt-5">
                Dados do Cliente
            </h3>
            <div class="tooltip tooltip-secondary" data-tip="Continua Comprado">
                <a href="{{ route('dashboard') }}">
                    <x-icon name="o-arrow-left" class="w-9 h-9 text-white hover:text-blue-600" route="dashboard" />
                </a>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <div class="flex flex-row gap-2">
                <div class="form-control w-full max-w-sm">
                    <label class="label">
                        <span class="text-lg font-semibold text-white">Nome</span>
                    </label>
                    <x-input class="border-0 focus:outline-none bg-slate-200 text-black font-medium" icon="o-user"
                        wire:model="user.nome" disabled />
                </div>
                <div class="form-control w-full max-w-sm">
                    <label class="label">
                        <span class="text-lg font-semibold text-white">CPF</span>
                    </label>
                    <x-input class="border-0 focus:outline-none bg-slate-200 text-black font-medium" icon="o-user"
                        wire:model="user.cpf" disabled />
                </div>
            </div>
            <div class="flex flex-row gap-4">
                <div class="form-control w-full max-w-sm">
                    <label class="label">
                        <span class="text-lg font-semibold text-white">Email</span>
                    </label>
                    <x-input class="border-0 focus:outline-none bg-slate-200 text-black font-medium" icon="o-envelope"
                        wire:model="user.email" disabled />
                </div>
                <div class="form-control w-full max-w-sm">
                    <label class="label">
                        <span class="text-lg font-semibold text-white">Telefone</span>
                    </label>
                    <x-input class="border-0 focus:outline-none bg-slate-200 text-black font-medium"
                        icon="o-device-phone-mobile" wire:model="user.telefone" disabled />
                </div>
            </div>
            <form wire:submit="finalizarPedido">
                <h3 class="text-2xl text-white font-bold pt-3">
                    Detalhes de Entrega
                </h3>
                <div class="flex flex-row gap-4">
                    <div class="form-control w-full max-w-[10rem]">
                        <label class="label">
                            <span class="text-lg font-semibold text-white">CEP</span>
                        </label>
                        <x-input x-mask="99999-999"
                            class="border-0 focus:outline-none bg-slate-200 text-black font-medium" icon="o-map-pin"
                            wire:model="cep" />
                    </div>
                    <div class="form-control w-full max-w-xl">
                        <label class="label">
                            <span class="text-lg font-semibold text-white">Endereço</span>
                        </label>
                        <x-input class="border-0 focus:outline-none bg-slate-200 text-black font-medium" icon="o-map"
                            wire:model="rua" />
                    </div>
                </div>
                <div class="flex flex-row px-3 gap-6 mt-3">
                    <div class="flex flex-col gap-3 w-[40%]">
                        <h3 class="text-2xl text-white font-bold pt-3">
                            Forma de Pagamento
                        </h3>
                        <div class="text-red-500 font-semibold text-center">
                            @error('finalizarPedidoDTO.pagamento')
                                {{ $message }}
                            @enderror
                        </div>
                        {{-- credito --}}
                        <div
                            class="form-control border rounded-lg border-error backdrop-blur-[12px] bg-[#19181896] px-2">
                            <label class="cursor-pointer label flex flex-row gap-3">
                                <input wire:model="finalizarPedidoDTO.pagamento" type="radio"
                                    class="radio radio-sm radio-error" value="Crédito" name="pagamento" />
                                <span
                                    class="label-text text-error flex flex-row items-center gap-1 text-xl font-semibold">
                                    Cartão de Crédito
                                    <svg class="w-[25px] h-[25px] fill-[#ff374b]" viewBox="0 0 576 512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z">
                                        </path>
                                    </svg>
                                </span>
                            </label>
                        </div>
                        {{-- debito --}}
                        <div
                            class="form-control border rounded-lg border-secondary backdrop-blur-[12px] bg-[#19181896] px-2">
                            <label class="cursor-pointer label flex flex-row gap-3">
                                <input wire:model="finalizarPedidoDTO.pagamento" type="radio"
                                    class="radio radio-sm radio-secondary" value="Débito" name="pagamento" />
                                <span
                                    class="label-text text-secondary flex flex-row items-center gap-1 text-xl font-semibold">
                                    Cartão de Débito
                                    <svg class="w-[25px] h-[25px] fill-[#0f4ed7]" viewBox="0 0 576 512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M64 32C28.7 32 0 60.7 0 96v32H576V96c0-35.3-28.7-64-64-64H64zM576 224H0V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V224zM112 352h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16z">
                                        </path>
                                    </svg>
                                </span>
                            </label>
                        </div>

                        {{-- pix --}}
                        <div
                            class="form-control border rounded-lg border-[#2ebdaf] backdrop-blur-[12px] bg-[#19181896] px-2">
                            <label class="cursor-pointer label flex flex-row gap-3">
                                <input wire:model="finalizarPedidoDTO.pagamento" type="radio"
                                    class="radio radio-sm radio-info" value="PIX" name="pagamento" />
                                <span
                                    class="label-text text-[#2ebdaf] flex flex-row items-center gap-1 text-xl font-semibold">
                                    Pagamento Pix
                                    <svg class="w-[25px] h-[25px] fill-[#2ebdaf]" viewBox="0 0 512 512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M242.4 292.5C247.8 287.1 257.1 287.1 262.5 292.5L339.5 369.5C353.7 383.7 372.6 391.5 392.6 391.5H407.7L310.6 488.6C280.3 518.1 231.1 518.1 200.8 488.6L103.3 391.2H112.6C132.6 391.2 151.5 383.4 165.7 369.2L242.4 292.5zM262.5 218.9C256.1 224.4 247.9 224.5 242.4 218.9L165.7 142.2C151.5 127.1 132.6 120.2 112.6 120.2H103.3L200.7 22.76C231.1-7.586 280.3-7.586 310.6 22.76L407.8 119.9H392.6C372.6 119.9 353.7 127.7 339.5 141.9L262.5 218.9zM112.6 142.7C126.4 142.7 139.1 148.3 149.7 158.1L226.4 234.8C233.6 241.1 243 245.6 252.5 245.6C261.9 245.6 271.3 241.1 278.5 234.8L355.5 157.8C365.3 148.1 378.8 142.5 392.6 142.5H430.3L488.6 200.8C518.9 231.1 518.9 280.3 488.6 310.6L430.3 368.9H392.6C378.8 368.9 365.3 363.3 355.5 353.5L278.5 276.5C264.6 262.6 240.3 262.6 226.4 276.6L149.7 353.2C139.1 363 126.4 368.6 112.6 368.6H80.78L22.76 310.6C-7.586 280.3-7.586 231.1 22.76 200.8L80.78 142.7H112.6z">
                                        </path>
                                    </svg>
                                </span>
                            </label>
                        </div>
                        {{-- money --}}
                        <div
                            class="form-control border rounded-lg border-primary backdrop-blur-[12px] bg-[#19181896] px-2">
                            <label class="cursor-pointer label flex flex-row gap-3">
                                <input wire:model="finalizarPedidoDTO.pagamento" type="radio"
                                    class="radio radio-sm radio-primary" value="Dinheiro" name="pagamento" />
                                <span
                                    class="label-text text-primary flex flex-row items-center gap-1 text-xl font-semibold">
                                    Pagamento Dinheiro
                                    <svg class="w-[25px] h-[25px] fill-[#00812f]" viewBox="0 0 576 512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M312 24V34.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8V232c0 13.3-10.7 24-24 24s-24-10.7-24-24V220.6c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2V24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5H192 32c-17.7 0-32-14.3-32-32V416c0-17.7 14.3-32 32-32H68.8l44.9-36c22.7-18.2 50.9-28 80-28H272h16 64c17.7 0 32 14.3 32 32s-14.3 32-32 32H288 272c-8.8 0-16 7.2-16 16s7.2 16 16 16H392.6l119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384l0 0-.9 0c.3 0 .6 0 .9 0z">
                                        </path>
                                    </svg>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="w-[55%]">
                        <h3 class="text-2xl text-center text-white font-bold pt-3">
                            Revisão de Preços
                        </h3>
                        <div class="mt-3 flex justify-end border-t border-gray-300 pt-8">
                            <div class="w-screen max-w-lg space-y-4">
                                <dl class="space-y-0.5 text-xl font-semibold text-white">
                                    <div class="flex justify-between">
                                        <dt class="pl-3">Subtotal</dt>
                                        <dd class="pr-3">R$ {{ $total }},00</dd>
                                    </div>

                                    <div class="flex justify-between">
                                        <dt class="pl-3">Taxa de Entrega Fixa</dt>
                                        <dd class="pr-3">R$ 6,00</dd>
                                    </div>

                                    @if ($countItens >= 5)
                                        <div class="flex justify-between">
                                            <dt class="pl-3">Desconto</dt>
                                            <dd class="pr-3">- R$ 5,00</dd>
                                        </div>
                                    @endif

                                    <div class="flex justify-between">
                                        <dt class="pl-3">Total</dt>
                                        <dd class="pr-3">R$ {{ $finalizarPedidoDTO['valorTotal'] }},00</dd>
                                    </div>
                                </dl>
                                <div class="flex justify-between items-center pt-2 px-2">
                                    <x-button label="Cancelar Compra" class="btn-error btn-sm text-white"
                                        wire:click="cancelarCompra" />
                                    <x-button type="submit" label="Finalizar Compra"
                                        class="btn-success text-white" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="py-4">
            <p class="text-white text-center font-medium pb-2 backdrop-blur-[12px] bg-[#36353596] rounded-xl px-3">
                Em suas compras de 5 itens ou mais, você terá o prazer de receber um cupom de desconto exclusivo
                no
                valor de R$5,00!
                <br>
                Aproveite esta oferta especial como um agradecimento por escolher nossos produtos.
            </p>
        </div>
    </div>
</div>
</div>
