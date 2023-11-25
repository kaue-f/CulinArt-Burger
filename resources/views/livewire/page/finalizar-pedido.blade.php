<div class="flex flex-row w-[100%] min-h-[80vh] backdrop-blur-[8px] bg-[#4a484896] gap-6 px-5 rounded-lg shadow-2xl">
    {{-- Pedidos --}}
    <div class="w-[100%] mt-2 space-y-3">
        <h3 class="text-4xl text-black text-center font-bold p-4">
            Confirmação de Pedidos
        </h3>
        <div class="flex flex-col items-center h-[60vh] space-y-2 overflow-hidden overflow-y-auto rounded-2xl">
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
                        <p class="font-medium">R$: <span class="font-bold text-2xl">{{ $item['valor'] }}</span></p>
                    </div>
                    <div class="mt-1 flex items-center justify-center w-[5%] text-black tooltip tooltip-error"
                        data-tip="Remover Item">
                        <x-icon name="m-x-mark" class="w-6 h-6 hover:text-red-500"
                            wire:click="removeItem({{ $key }})" />
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex flex-row items-center px-7 pt-6">
            <div class="text-2xl font-bold text-black w-[65%]">
                Quantidade: <span>{{ $countItens }}</span>
            </div>
            <div class="flex flex-row text-2xl text-center font-bold text-black">
                Valor Total R$: {{ $valorTotal }}
            </div>
        </div>
    </div>
    {{-- Dados --}}
    <div class="w-[100%]">dsas</div>


</div>
