<x-admin-layout>
    {{-- Navbar Admin --}}
    <nav class="bg-white border-b border-gray-200 px-4 py-3 flex justify-between items-center shadow-sm">
        <div class="flex items-center space-x-3">
            <img src="/asset/logo/logo.png" class="h-10 w-auto object-contain" alt="Logo" />
            <span class="font-bold text-blue-700 text-lg">Admin Panel</span>
        </div>
        <div class="flex items-center space-x-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="px-4 py-2 bg-amber-500 text-white rounded-lg shadow hover:bg-amber-600 transition font-semibold">Log
                    Out</button>
            </form>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto py-8 px-2 sm:px-4">
        {{-- Dashboard Section --}}
        <section class="mb-6 bg-white rounded-xl shadow p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row sm:gap-8 gap-4 justify-center items-stretch">
                <div
                    class="flex-1 bg-blue-50 rounded-lg p-6 flex flex-col items-center shadow min-w-[180px] mb-2 sm:mb-0">
                    <h2 class="text-base sm:text-lg font-bold text-blue-700 mb-1 sm:mb-2">Kunjungan Website</h2>
                    <span class="text-3xl sm:text-5xl font-extrabold text-blue-700 mb-1 sm:mb-2">
                        {{ $visits }}
                    </span>
                    <span class="text-gray-600 text-xs sm:text-base">Total Kunjungan Website</span>
                </div>
                <div class="flex-1 bg-blue-50 rounded-lg p-6 flex flex-col items-center shadow min-w-[180px]">
                    <h2 class="text-base sm:text-lg font-bold text-blue-700 mb-1 sm:mb-2">Kunjungan Majalah</h2>
                    <span class="text-3xl sm:text-5xl font-extrabold text-blue-700 mb-1 sm:mb-2">
                        {{ $totalMajalahVisits ?? 0 }}
                    </span>
                    <span class="text-gray-600 text-xs sm:text-base">Total Kunjungan ke Semua Majalah</span>
                </div>
            </div>
        </section>

        {{-- Tabel Majalah --}}
        <section class="mb-8 bg-white rounded-xl shadow p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-2">
                <h2 class="text-base sm:text-lg font-bold text-blue-700">Daftar Majalah</h2>
                <a href="{{ route('admin.majalah.create') }}"
                    class="w-full sm:w-auto px-4 py-2 bg-blue-700 text-white rounded-lg shadow hover:bg-blue-800 font-semibold transition">
                    Tambah Majalah Baru
                </a>

            </div>
            <div class="overflow-x-auto">
                <div class="w-full"
                    style="max-height: 520px; overflow-y: auto; {{ count($majalahs) > 8 ? '' : 'overflow-y:unset; max-height:none;' }}">
                    <table class="min-w-full text-xs sm:text-sm text-left align-middle">
                        <colgroup>
                            <col style="width: 40px;">
                            <col style="width: 40%;">
                            <col style="width: 120px;">
                            <col style="width: 120px;">
                        </colgroup>
                        <thead class="bg-blue-50">
                            <tr>
                                <th class="px-2 sm:px-4 py-2 text-center align-middle">#</th>
                                <th class="px-2 sm:px-4 py-2 text-left align-middle">Judul</th>
                                <th class="px-2 sm:px-4 py-2 text-center align-middle">Cover</th>
                                <th class="px-2 sm:px-4 py-2 text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($majalahs as $i => $majalah)
                                <tr class="border-b">
                                    <td class="px-2 sm:px-4 py-2 text-center align-middle">{{ $i + 1 }}</td>
                                    <td class="px-2 sm:px-4 py-2 align-middle max-w-[180px] truncate">
                                        {{ $majalah->judul }}
                                    </td>
                                    <td class="px-2 sm:px-4 py-2 text-center align-middle"><img
                                            src="{{ asset(config('paths.majalah_cover') . '/' . $majalah->cover) }}"
                                            class="h-10 w-auto rounded shadow inline-block" alt="cover"></td>
                                    <td class="px-2 sm:px-4 py-2 align-middle">
                                        <div class="flex flex-col sm:flex-row gap-2 justify-center items-center">
                                            <a href="{{ route('admin.majalah.edit', $majalah->id) }}"
                                                class="inline-block px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600 w-full sm:w-auto text-center font-semibold transition">
                                                Edit
                                            </a>

                                            <form method="POST"
                                                action="{{ route('admin.majalah.destroy', $majalah->id) }}"
                                                onsubmit="return confirm('Yakin hapus majalah?')"
                                                class="w-full sm:w-auto">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700 w-full sm:w-auto font-semibold transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <script src="{{ asset('style/js/adminScript.js') }}"></script>
    </main>
</x-admin-layout>
