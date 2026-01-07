<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="bg-white p-8 rounded-lg shadow text-center">

            <h1 class="text-xl font-bold mb-6 text-gray-800">
                QR Pengaduan Publik KP2MI
            </h1>

            {!! QrCode::format('svg')
                ->size(300)
                ->margin(2)
                ->merge(public_path('images/kp2mi-logo.png'), 0.25, true)
                ->generate(route('pengaduan.form')) !!}

            <p class="mt-4 text-sm text-gray-500">
                Scan QR ini untuk mengisi formulir pengaduan publik
            </p>

            <a href="{{ route('admin.qr.pengaduan.download') }}"
               class="inline-block mt-6 px-5 py-2 bg-[#0A1A3F] text-white rounded hover:bg-[#081532] transition">
                ⬇ Download QR
            </a>

        </div>
    </div>
</x-app-layout>
