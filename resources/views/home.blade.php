<x-layout>
    <section class="bg-white pt-20 pb-10 sm:pt-28">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            {{-- Flipbook Majalah Terbaru --}}
            @if (isset($majalah_terkini))
                <h1 class="text-4xl font-bold text-blue-700 mb-2 text-center">{{ $majalah_terkini->judul }}</h1>
                <div class="w-full max-w-3xl mx-auto px-1 sm:px-3 mb-2">
                    <div id="df_manual_book"
                        class="_df_book w-full h-[72vw] min-h-[340px] max-h-[620px] sm:max-h-[700px] bg-white shadow-lg rounded-xl flex justify-center items-center"
                        source="{{ asset(config('paths.majalah_pdf') . '/' . $majalah_terkini->file_pdf) }}"
                        data-dflip-webgl="true" data-dflip-backgroundcolor="#f0fdf4" style="border-radius: 14px;">
                    </div>
                </div>
            @endif

            {{-- Divider --}}
            <div class="mt-10 mb-6">
                <hr class="border-t-2 border-amber-600 rounded-full shadow-md w-1/2 mx-auto opacity-75">
            </div>

            <div class="mt-10 mb-6">
                <h1 class="text-3xl font-bold text-blue-700 pb-4">Semua Majalah</h1>
            </div>

            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4 gap-2">
                {{-- Form Pencarian Majalah --}}
                <form method="GET" action="#majalah-grid" class="w-full md:w-auto flex items-center gap-2"
                    id="searchForm">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul majalah..."
                        class="border border-gray-300 rounded-md py-1.5 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full md:w-64" />
                    <button type="submit"
                        class="px-3 py-1.5 bg-blue-700 text-white rounded-md text-sm font-semibold hover:bg-blue-800 transition-all">Cari</button>
                </form>
                {{-- Dropdown jumlah card (desktop only) --}}
                <form method="GET" action="#majalah-grid" class="hidden md:flex items-center gap-2" id="perPageForm">
                    <input type="hidden" name="q" value="{{ request('q') }}" />
                    <label for="perPage" class="text-sm font-medium text-gray-700">Tampilkan:</label>
                    <div class="relative w-32">
                        <select name="perPage" id="perPage"
                            class="block w-full appearance-none border border-gray-300 rounded-md py-1.5 pl-3 pr-7 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            onchange="this.form.submit()">
                            <option value="4" {{ request('perPage', 8) == 4 ? 'selected' : '' }}>4</option>
                            <option value="8" {{ request('perPage', 8) == 8 ? 'selected' : '' }}>8</option>
                            <option value="12" {{ request('perPage', 8) == 12 ? 'selected' : '' }}>12</option>
                            <option value="all" {{ request('perPage') == 'all' ? 'selected' : '' }}>Lihat Semua
                            </option>
                        </select>
                    </div>
                    <span class="text-sm text-gray-500">majalah</span>
                </form>
            </div>

            {{-- Majalah Grid --}}
            <div id="majalah-grid"
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-10 max-w-7xl mx-auto mt-4">
                @foreach ($majalahs as $majalah)
                    <article class="flex flex-col items-stretch justify-between max-w-sm mx-auto">
                        <div
                            class="w-full bg-white border border-gray-200 rounded-2xl shadow-md dark:bg-gray-800 dark:border-gray-700 flex flex-col h-full overflow-hidden transition-transform hover:scale-[1.025] duration-200">
                            {{-- Judul Majalah --}}
                            <div class="px-4 pt-4 pb-2 sm:px-5 sm:pt-5 sm:pb-3 text-center">
                                <span
                                    class="block text-lg sm:text-xl font-bold text-blue-800 dark:text-blue-200 leading-tight line-clamp-2">{{ $majalah->judul }}</span>
                            </div>
                            {{-- Gambar Cover --}}
                            <a href="{{ route('majalah.detail', $majalah->id) }}" class="block">
                                <img class="w-full aspect-[3/4] object-cover rounded-xl mx-auto transition-all duration-200 hover:shadow-lg"
                                    src="{{ asset(config('paths.majalah_cover') . '/' . $majalah->cover) }}"
                                    alt="Cover" />
                            </a>
                            {{-- Tombol --}}
                            {{-- <div class="flex-1 flex flex-col justify-end px-4 pb-4 sm:px-5 sm:pb-5 mt-2">
                                <a href="{{ route('majalah.detail', $majalah->id) }}"
                                    class="block w-full text-center px-4 py-2 text-base font-semibold text-white bg-blue-700 rounded-md hover:bg-blue-800 transition-all duration-200 shadow hover:shadow-lg">Baca
                                    Selengkapnya</a>
                            </div> --}}
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8 flex flex-col items-center gap-2">
                <div class="w-full flex justify-center">
                    {{ $majalahs->appends(request()->except('page'))->links() }}
                </div>
            </div>


        </div>
    </section>
</x-layout>
