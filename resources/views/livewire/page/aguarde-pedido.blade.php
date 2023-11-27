<div class="flex mt-3 w-[100%] min-h-[70vh] px-3 rounded-xl">
    <div class="flex w-full flex-row px-4 py-10 gap-14">
        <div class="flex flex-col w-[30%]">
            <img class="rounded-2xl" src="/image/delivery.gif" style="width: 100%; height: auto;">
        </div>
        <div class="w-[30%]">
            <div class="flex flex-col backdrop-blur-[4px] bg-[#2b2b2b73] rounded-xl p-4">
                <h3 class="text-2xl text-white font-semibold pl-3">
                    Pedido #{{ $id }}
                </h3>
                <dl class="space-y-0.5 text-sm -mb-1 mt-2 text-white">
                    <div class="flex justify-between">
                        <dt class="pl-3 w-[15%]"></dt>
                        <dt class="w-[55%]">Item</dt>
                        <dd class="pr-3 w-[30%] text-right">Valor</dd>
                    </div>
                </dl>
                <hr class="my-2">

                <dl class="space-y-0.5 font-medium text-white">
                    @foreach ($pedidos as $key => $item)
                        <div class="flex justify-between">
                            <dt class="pl-3 w-[15%]">{{ $key }}</dt>
                            <dt class="w-[55%]">{{ $item['item'] }}</dt>
                            <dd class="pr-3 w-[30%] text-right">R$ {{ $item['valor'] }},00</dd>
                        </div>
                    @endforeach
                </dl>

                <hr class="my-2">

                <dl class="space-y-0.5 font-medium text-white">
                    <div class="flex justify-between">
                        <dt class="pl-3 font-normal pb-1">Detalhes da Compra</dt>
                    </div>

                    <div class="flex justify-between">
                        <dt class="pl-3">Subtotal</dt>
                        <dd class="pr-3">R$ {{ $count['valor'] }},00</dd>
                    </div>

                    <div class="flex justify-between">
                        <dt class="pl-3">Taxa de Entrega Fixa</dt>
                        <dd class="pr-3">R$ 6,00</dd>
                    </div>

                    @if ($count['itens'] >= 5)
                        <div class="flex justify-between">
                            <dt class="pl-3">Desconto</dt>
                            <dd class="pr-3">- R$ 5,00</dd>
                        </div>
                    @endif


                    <div class="flex justify-between">
                        <dt class="pl-3">Total</dt>
                        <dd class="pr-3">R$ {{ $dados['valor_total'] }},00</dd>
                    </div>

                </dl>
                <hr class="border-dashed mt-2">

                <dl class="py-1 font-medium text-white">
                    <div class="flex justify-between">
                        <dt class="pl-3">Forma de Pagamento</dt>
                        <dd class="pr-3">{{ $dados['pagamento'] }}</dd>
                    </div>
                </dl>

                <hr class="my-2">

                <dl class="py-1 font-medium text-white">
                    <div class="flex flex-row">
                        <dt class="px-3">Endereço</dt>
                        <dd class="px-2">{{ $dados['endereco'] }}</dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="flex flex-col w-[40%] items-center">
            <div class="-mt-14 mb-6 w-full text-end px-2">
                <a href="{{ route('dashboard') }}">
                    <x-icon name="o-arrow-left" class="w-12 h-9 text-white hover:text-primary" />
                </a>
            </div>
            <div
                class="relative col-span-12 p-8 space-y-6 sm:col-span-9 backdrop-blur-[4px] bg-[#2b2b2b73] rounded-xl w-full">
                <div
                    class="col-span-12 space-y-12 relative px-4 sm:col-span-8 sm:space-y-8 sm:before:absolute sm:before:top-2 sm:before:bottom-0 sm:before:w-0.5 sm:before:-left-3 before:bg-green-600">
                    <div
                        class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-primary">
                        <h3 class="text-xl text-white font-semibold">Pedido em Processamento</h3>
                        @if ($t >= 1)
                            <time class="text-xs tracki uppercase dark:text-gray-400"
                                wire:ignore>{{ $tempo['recebido'] }}</time>
                            <p class="text-sm mt-2">Pedido Recebido.</p>
                        @endif
                    </div>
                    <div
                        class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-primary">
                        <h3 class="text-xl text-white font-semibold">Estamos Preparando seu Pedido</h3>
                        @if ($t >= 2)
                            <time class="text-xs tracki uppercase dark:text-gray-400">{{ $tempo['preparo'] }}</time>
                            <p class="text-sm mt-2">
                                Seu pedido está sob cuidados especiais. Aguarde enquanto preparamos seu pedido com
                                carinho.
                            </p>
                        @endif
                    </div>
                    <div
                        class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-primary">
                        <h3 class="text-xl text-white font-semibold">Boas Notícias! Seu Pedido Está em Trânsito e
                            Chegará em Breve.</h3>
                        @if ($t >= 3)
                            <time class="text-xs tracki uppercase dark:text-gray-400">{{ $tempo['breve'] }}</time>
                            <p class="text-sm mt-2">
                                Seu pedido está a caminho, e estamos ansiosos para que você o receba em breve.
                                Agradecemos
                                pela confiança em nossos serviços!
                            </p>
                        @endif
                    </div>
                    <div
                        class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-primary">
                        <h3 class="text-xl text-white font-semibold">Seu Pedido Foi Entregue com Sucesso.</h3>
                        @if ($t >= 4)
                            <time class="text-xs tracki uppercase dark:text-gray-400">{{ $tempo['sucesso'] }}</time>
                            <p class="text-sm mt-2">
                                Queremos expressar nossa sincera gratidão pela sua preferência. É uma honra tê-lo como
                                nosso
                                cliente e esperamos que sua experiência tenha sido tão excepcional quanto sua escolha.
                                Agradecemos por confiar em nós!
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
