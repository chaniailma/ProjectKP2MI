<aside class="w-64 bg-white border-r min-h-screen flex flex-col">

    <div class="h-16 flex items-center px-6 border-b font-bold">
        ADMIN PANEL
    </div>

    <nav class="flex-1 px-4 py-4 space-y-2">

        <a href="{{ route('admin.dashboard') }}"
           class="block px-3 py-2 rounded hover:bg-gray-100">
            📊 Dashboard
        </a>

        <a href="{{ route('admin.pengaduan.index') }}"
           class="block px-3 py-2 rounded hover:bg-gray-100">
            📄 List Pengaduan
        </a>

    </nav>

    <div class="border-t p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-red-600 w-full text-left">
                🚪 Logout
            </button>
        </form>
    </div>

</aside>
