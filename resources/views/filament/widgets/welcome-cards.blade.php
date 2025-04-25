<div class="space-y-6">
    {{-- Grid 4 kotak dengan ikon kiri (img) dan teks rata kiri + jarak lebar --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Kiri Atas: Perkara PN --}}
        <a href="http://magangbpn.test/admin/p-n-s" class="block">
        <div class="p-6 bg-white shadow rounded-xl border flex items-center space-x-6 hover:bg-gray-50 transition">
        <div class="w-10 h-10 flex items-center justify-center">
            <img src="{{ asset('img/PNicon.png') }}" alt="Ikon PN" class="w-8 h-8 object-contain">
        </div>
        <div>
            <div class="text-lg font-bold">Perkara PN</div>
        </div>
        </div>
        </a>


        {{-- Kanan Atas: Perkara PTUN --}}
        <a href="http://magangbpn.test/admin/p-t-u-n-s" class="block">
            <div class="p-6 bg-white shadow rounded-xl border flex items-center space-x-6 hover:bg-gray-50 transition">
                <div class="w-10 h-10 flex items-center justify-center">
                    <img src="{{ asset('img/PTUNicon.png') }}" alt="Ikon PTUN" class="w-8 h-8 object-contain">
                </div>
                <div>
                    <div class="text-lg font-bold">Perkara PTUN</div>
                </div>
            </div>
        </a>

        {{-- Kiri Bawah: Sengketa --}}
        <a href="http://magangbpn.test/admin/sengketas" class="block">
            <div class="p-6 bg-white shadow rounded-xl border flex items-center space-x-6 hover:bg-gray-50 transition">
                <div class="w-10 h-10 flex items-center justify-center">
                    <img src="{{ asset('img/iconsengketa.png') }}" alt="Ikon Sengketa" class="w-8 h-8 object-contain">
                </div>
                <div>
                    <div class="text-lg font-bold">Sengketa</div>
                </div>
            </div>
        </a>

        {{-- Kanan Bawah: Pengendalian --}}
        <a href="http://magangbpn.test/admin/pengendalians" class="block">
            <div class="p-6 bg-white shadow rounded-xl border flex items-center space-x-6 hover:bg-gray-50 transition">
                <div class="w-10 h-10 flex items-center justify-center">
                    <img src="{{ asset('img/iconpengendalian.png') }}" alt="Ikon Pengendalian" class="w-8 h-8 object-contain">
                </div>
                <div>
                    <div class="text-lg font-bold">Pengendalian</div>
                </div>
            </div>
        </a>

    </div>
</div>
