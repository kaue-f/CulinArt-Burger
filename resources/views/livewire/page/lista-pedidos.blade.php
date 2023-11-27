<div class="flex mt-3 w-[100%] min-h-[70vh] px-3 rounded-xl">
    <div class="flex w-full px-4 py-10 gap-14 justify-center">
        <div class="w-[60%] ">
            <div class="flex flex-col backdrop-blur-[4px] bg-[#2b2b2b73] rounded-xl p-4">
                <h3 class="text-4xl py-4 text-white font-bold pl-3">
                    Lista de Compras
                </h3>
                <dl class="space-y-0.5 font-semibold text-white">
                    <div class="flex justify-between pt-2 px-2">
                        <dt class="pl-3 w-[10%]">Pedido</dt>
                        <dt class="pl-10 w-[30%] ">Data</dt>
                        <dt class="w-[20%]">Forma de Pagamento</dt>
                        <dt class="pr-3 w-[20%] text-center">Valor</dt>
                        <dt class="pr-3 w-[20%] text-center"> status </dt>
                    </div>
                </dl>
                <hr class="my-2">
                <dl class="space-y-0.5 font-semibold text-lg text-white">
                    @foreach ($lista as $key => $pedido)
                        <div class="flex justify-between p-2">
                            <dt class="pl-3 w-[10%]">#{{ $pedido['id'] }}</dt>
                            <dt class="pl-3 w-[30%] text-base">{{ date_format($pedido['created_at'], 'd/m/Y H:i:s') }}
                            </dt>
                            <dt class="w-[20%] text-center">{{ $pedido['pagamento'] }}</dt>
                            <dt class="pr-3 w-[20%] text-center">R$ {{ $pedido['valor_total'] }},00</dt>
                            <dt class="pr-3 w-[20%] text-center">
                                @if ($pedido['status'] == true)
                                    <div class="rounded-3xl bg-emerald-500 p-3 text-xs cursor-pointer"
                                        wire:click="pedido({{ $pedido['id'] }})">
                                        Pedido Entregue
                                    </div>
                                @else
                                    <div class="rounded-3xl bg-sky-600 p-3 text-xs cursor-pointer"
                                        wire:click="pedido({{ $pedido['id'] }})">
                                        Pedido em Andamento
                                    </div>
                                @endif
                            </dt>
                        </div>
                    @endforeach
                    {{ $lista->links('livewire.components.paginator') }}
                </dl>
            </div>
        </div>
    </div>
</div>
