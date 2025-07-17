<x-admin-layout>
    {{-- Navbar Admin --}}
    <nav class="bg-white border-b border-gray-200 px-4 py-3 flex justify-between items-center shadow-sm">
        <div class="flex items-center space-x-3">
            <img src="/asset/logo/logo.png" class="h-10 w-auto object-contain" alt="Logo" />
            <span class="font-bold text-blue-700 text-lg">Admin Panel</span>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-gray-700 font-medium">
                {{-- 👤 {{ Auth::user()->name ?? 'Admin' }} --}}
            </span>
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
                <button
                    class="w-full sm:w-auto px-4 py-2 bg-blue-700 text-white rounded-lg shadow hover:bg-blue-800 font-semibold transition"
                    onclick="openModal('modalMajalah')">Tambah Majalah Baru</button>
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
                                            <button
                                                class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 w-full sm:w-auto"
                                                onclick="editMajalah({{ $majalah->id }})">Edit</button>
                                            <form method="POST" action="{{ url('admin/majalah/' . $majalah->id) }}"
                                                onsubmit="return confirm('Yakin hapus majalah?')"
                                                class="w-full sm:w-auto">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 w-full sm:w-auto">Hapus</button>
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

        {{-- Tabel Carousel --}}
        {{-- <section class="mb-8 bg-white rounded-xl shadow p-4 sm:p-6">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-2">
                    <h2 class="text-base sm:text-lg font-bold text-blue-700">Daftar Banner Carousel</h2>
                    <button
                        class="w-full sm:w-auto px-4 py-2 bg-amber-500 text-white rounded-lg shadow hover:bg-amber-600 font-semibold transition"
                        onclick="openModal('modalCarousel')">Tambah Banner</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-xs sm:text-sm text-left align-middle">
                        <colgroup>
                            <col style="width: 40px;">
                            <col style="width: 60%;">
                            <col style="width: 120px;">
                        </colgroup>
                        <thead class="bg-amber-50">
                            <tr>
                                <th class="px-2 sm:px-4 py-2 text-center align-middle">#</th>
                                <th class="px-2 sm:px-4 py-2 text-left align-middle">Banner</th>
                                <th class="px-2 sm:px-4 py-2 text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carousels as $i => $carousel)
                                <tr class="border-b">
                                    <td class="px-2 sm:px-4 py-2 text-center align-middle">{{ $i + 1 }}</td>
                                    <td class="px-2 sm:px-4 py-2 align-middle">
                                        <img src="{{ asset(config('paths.carousel_banner') . '/' . $carousel->banner_path) }}"
                                            class="h-10 w-auto rounded shadow inline-block" alt="banner">
                                    </td>
                                    <td class="px-2 sm:px-4 py-2 align-middle">
                                        <div class="flex flex-col sm:flex-row gap-2 justify-center items-center">
                                            <form method="POST" action="{{ url('admin/carousel/' . $carousel->id) }}"
                                                onsubmit="return confirm('Yakin hapus banner?')" class="w-full sm:w-auto">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 w-full sm:w-auto">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section> --}}

        {{-- Modal Tambah Majalah --}}
        <dialog id="modalMajalah" class="rounded-xl p-0 w-full max-w-lg flex items-center justify-center mx-auto"
            style="top:50%;left:50%;transform:translate(-50%,-50%);position:fixed;display:none;">
            <form method="POST" action="{{ url('admin/majalah') }}" enctype="multipart/form-data"
                class="bg-white p-6 rounded-xl space-y-4 shadow-lg">
                @csrf
                <h3 class="text-lg font-bold text-blue-700 mb-2">Tambah Majalah Baru</h3>
                @if ($errors->any())
                    <div class="mb-2 text-red-600 text-sm">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Judul Majalah</label>
                    <input type="text" name="judul" placeholder="Judul Majalah"
                        class="w-full border rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Deskripsi</label>
                    <textarea name="deskripsi" placeholder="Deskripsi"
                        class="w-full border rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Upload Cover Majalah</label>
                    <input type="file" name="cover" accept="image/*"
                        class="w-full border rounded px-3 py-2 bg-white focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Upload PDF Majalah <span
                            class="text-xs text-gray-500">(maksimal 48MB)</span></label>
                    <input type="file" name="file_pdf" accept="application/pdf"
                        class="w-full border rounded px-3 py-2 bg-white focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 close-modal-btn"
                        data-modal="modalMajalah">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">Simpan</button>
                </div>
            </form>
        </dialog>

        {{-- Modal Tambah Carousel --}}
        <dialog id="modalCarousel" class="rounded-xl p-0 w-full max-w-md flex items-center justify-center mx-auto"
            style="top:50%;left:50%;transform:translate(-50%,-50%);position:fixed;display:none;">
            <form method="POST" action="{{ url('admin/carousel') }}" enctype="multipart/form-data"
                class="bg-white p-6 rounded-xl space-y-4 shadow-lg">
                @csrf
                <h3 class="text-lg font-bold text-blue-700 mb-2">Tambah Banner Carousel</h3>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Upload Banner Carousel</label>
                    <input type="file" name="banner_path" accept="image/*"
                        class="w-full border rounded px-3 py-2 bg-white focus:ring-amber-500 focus:border-amber-500"
                        required>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 close-modal-btn"
                        data-modal="modalCarousel">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-amber-500 text-white rounded hover:bg-amber-600">Simpan</button>
                </div>
            </form>
        </dialog>

        {{-- Modal Edit Majalah --}}
        <dialog id="modalEditMajalah" class="rounded-xl p-0 w-full max-w-lg flex items-center justify-center mx-auto"
            style="top:50%;left:50%;transform:translate(-50%,-50%);position:fixed;display:none;">
            <form id="editMajalahForm" method="POST" action="" enctype="multipart/form-data"
                class="bg-white p-6 rounded-xl space-y-4 shadow-lg">
                @csrf
                @method('PUT')
                <h3 class="text-lg font-bold text-blue-700 mb-2">Edit Majalah</h3>
                <div id="editMajalahCarousel" class="mb-4"></div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Judul Majalah</label>
                    <input type="text" name="judul" id="editJudul"
                        class="w-full border rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Deskripsi</label>
                    <textarea name="deskripsi" id="editDeskripsi"
                        class="w-full border rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Ganti Cover (opsional)</label>
                    <input type="file" name="cover" accept="image/*"
                        class="w-full border rounded px-3 py-2 bg-white focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Ganti PDF (opsional)</label>
                    <input type="file" name="file_pdf" accept="application/pdf"
                        class="w-full border rounded px-3 py-2 bg-white focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="closeModal('modalEditMajalah')"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                    <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">Simpan
                        Perubahan</button>
                </div>
            </form>
        </dialog>

        <script src="{{ asset('style/js/adminScript.js') }}"></script>
    </main>
</x-admin-layout>
