    <x-layout>
        <section class="bg-white pt-20 pb-10 sm:pt-28 min-h-screen">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                {{-- Breadcrumb --}}
                <nav class="text-sm text-gray-600 mb-4">
                    <a href="/" class="hover:text-blue-600">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-blue-600 font-semibold">Edisi</span>
                </nav>

                {{-- Judul dan Deskripsi --}}
                <div class="mb-8">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">
                        {{ $majalah->judul }}
                    </h2>
                    <p class="mt-2 text-gray-700 text-sm sm:text-base max-w-3xl">
                        {{ $majalah->deskripsi }}
                    </p>
                </div>

                {{-- Flipbook Section --}}
                <div id="flipbook-container" class="w-full flex justify-center items-center mt-8">
                    <div id="df_manual_book"
                        class="_df_book w-full max-w-screen-lg h-[75vh] bg-white shadow-lg rounded-md flex justify-center items-center"
                        source="{{ asset('asset/majalah/pdf/' . $majalah->file_pdf) }}" data-dflip-webgl="true"
                        data-dflip-backgroundcolor="#f0fdf4" style="border-radius: 12px;">
                    </div>
                </div>

                {{-- Tombol kembali (Mobile only) --}}
                <div class="sm:hidden m-4">
                    <a href="/"
                        class="inline-flex items-center gap-2 text-sm text-blue-600 hover:underline font-medium">
                        ← Kembali
                    </a>
                </div>
            </div>
        </section>
    </x-layout>
