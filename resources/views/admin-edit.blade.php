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

    @section('content')
        <main class="max-w-4xl mx-auto py-8 px-4">
            <h1 class="text-2xl font-bold text-blue-700 mb-6">Edit Majalah</h1>

            <form method="POST" action="{{ url('admin/majalah/' . $majalah->id) }}" enctype="multipart/form-data"
                class="bg-white p-6 rounded-xl space-y-4 shadow-lg">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="mb-2 text-red-600 text-sm">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Judul Majalah</label>
                    <input type="text" name="judul" value="{{ old('judul', $majalah->judul) }}"
                        class="w-full border rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>{{ old('deskripsi', $majalah->deskripsi) }}</textarea>
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
                    <a href="{{ url('admin') }}"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 text-center">Batal</a>
                    <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">Simpan
                        Perubahan</button>
                </div>
            </form>
        </main>
    @endsection

</x-admin-layout>
