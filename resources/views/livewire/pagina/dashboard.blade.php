<div class="mt-6">
    <x-tabs class="flex justify-center" wire:model="selectedTab">
        <x-tab name="users-tab" label="Users" icon="o-users">

        </x-tab>
        <x-tab name="tricks-tab" label="Tricks" icon="o-sparkles">

        </x-tab>
        <x-tab name="musics-tab" label="Musics" icon="o-musical-note">
            <div class="mb-12 mt-6 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden  shadow-blue-500/40 shadow-lg absolute -mt-6 grid h-24 w-auto place-items-center">
                        <img class="bg-cover" src="/image/cardapio/Agua.jpg" style="width:100; height:6rem;">
                    </div>
                    <div class="p-4 text-right">
                        <p class="block antialiased text-base leading-normal text-black">
                            sas
                        </p>
                        <h4 class="block antialiased tracking-normal text-2xl font-semibold leading-snug text-black">
                            ssa
                        </h4>
                    </div>
                    <div class=" flex flex-col border-t border-blue-gray-50 p-4">
                        <p class="block antialiased leading-relaxed text-black">
                            Para os amantes de pimenta! Hambúrguer apimentado com queijo pepper jack, jalapeños, alface
                            e maionese de chipotle.
                        </p>
                        <div class="flex justify-end">
                            <button>aa</button>
                        </div>
                    </div>
                </div>

            </div>
        </x-tab>
    </x-tabs>
</div>
