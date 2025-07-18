<x-admin-layout>
    <main class="max-w-4xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-blue-700 mb-6">Edit Majalah</h1>

        <form method="POST" action="{{ route('admin.majalah.update', $majalah->id) }}" enctype="multipart/form-data"
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
                @if ($majalah->cover)
                    <img src="{{ asset(config('paths.majalah_cover') . '/' . $majalah->cover) }}" alt="cover"
                        class="h-24 mb-2 rounded shadow">
                @endif
                <input type="file" name="cover" accept="image/*"
                    class="w-full border rounded px-3 py-2 bg-white focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Ganti PDF (opsional)</label>
                <input type="file" name="file_pdf" accept="application/pdf"
                    class="w-full border rounded px-3 py-2 bg-white focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 text-center">Batal</a>
                <button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded hover:bg-blue-800">Simpan
                    Perubahan</button>
            </div>
        </form>
    </main>
</x-admin-layout>
