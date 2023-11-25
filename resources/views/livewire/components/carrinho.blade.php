<div class="dropdown dropdown-end">
    <label tabindex="0" class="m-1 indicator">
        {{-- coloar if --}}
        @if ($count > 0)
            <span class="indicator-item badge badge-primary">{{ $count }}</span>
        @endif
        <x-icon name="o-shopping-cart" class="w-8 h-8 text-white" />
    </label>
    <div tabindex="0"
        class="dropdown-content z-[1] card card-compact w-80 lg:w-96 p-2 shadow bg-white text-primary-content">
        <div class="card-body">
            <h3 class="card-title font-medium text-black text-lg">Carrinho</h3>
            <div class="flex justify-between text-black text-sm">
                <div class="text-left"></div>
                <div class="text-left w-36 lg:w-48">Item</div>
                <div class="text-left">
                    Valor
                </div>
                <div class="px-2">

                </div>
            </div>
            <hr class="border-blue-200">
            @if (isNullorEmpty($lista))
            @else
                <form class="" action="">
                    @foreach ($lista['listaItens'] as $key => $item)
                        <div class="flex justify-between text-black font-medium">
                            <div class="text-left">{{ $key }}</div>
                            <div class="text-left w-44">{{ $item['item'] }}</div>
                            <div class="text-right">
                                R$ {{ $item['valor'] }}
                            </div>
                            <div class="tooltip tooltip-right tooltip-error px-2" data-tip="Remover Item">
                                <x-icon class="text-black hover:text-red-500 text-right" name="m-x-mark"
                                    wire:click="remove({{ $key }})" />
                            </div>
                        </div>
                    @endforeach
                    <hr class="border-blue-200 mt-3 mb-4">
                    <div class="flex justify-between">
                        <div class="text-black text-lg">
                            Total: <span class="font-semibold">R$ {{ $total }}</span>
                        </div>
                        <x-button label="Finalizar Pedido" class="btn-primary text-white btn-sm" wire:click="finalizar"
                            @click="Toaster.success(' Falta pouco, você será automaticamente redirecionado para finalizar seu pedido.')" />
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
