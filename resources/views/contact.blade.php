<x-layout>
    <section class="bg-white pt-20 pb-10 sm:pt-28">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Hubungi Kami di Media Sosial</h2>
                <p class="mt-4 text-lg text-gray-600 sm:text-xl">
                    Ikuti dan terhubung dengan kami melalui berbagai platform media sosial resmi Dinas Komunikasi,
                    Informatika, Statistika dan Persandian.
                </p>
            </div>

            <ul role="list"
                class="mt-20 grid gap-x-12 gap-y-14 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 justify-center">
                @php
                    $socials = [
                        [
                            'name' => 'Instagram',
                            'username' => '@diskominfobeltim',
                            'color' => 'from-yellow-400 via-pink-500 to-purple-600',
                            'icon' => 'instagram',
                        ],
                        [
                            'name' => 'YouTube',
                            'username' => '@KominfoBelitungTV',
                            'color' => 'from-red-500 via-red-600 to-red-700',
                            'icon' => 'youtube',
                        ],
                        [
                            'name' => 'TikTok',
                            'username' => '@diskominfo_beltim',
                            'color' => 'from-gray-800 via-gray-900 to-black',
                            'icon' => 'tiktok',
                        ],
                        [
                            'name' => 'Facebook',
                            'username' => '@diskominfobeltim',
                            'color' => 'from-blue-600 via-blue-700 to-blue-800',
                            'icon' => 'facebook',
                        ],
                        [
                            'name' => 'X (Twitter)',
                            'username' => '@kominfoBeltim',
                            'color' => 'from-gray-900 to-black',
                            'icon' => 'x',
                        ],
                    ];
                @endphp

                @foreach ($socials as $social)
                    <li class="w-full max-w-md mx-auto">
                        <div class="flex items-center gap-x-6">
                            <div
                                class="w-[64px] h-[64px] rounded-full bg-gradient-to-tr {{ $social['color'] }} flex items-center justify-center">
                                @switch($social['icon'])
                                    @case('instagram')
                                        <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.6 2.2a1 1 0 1 1 0 2h-.01a1 1 0 1 1 0-2h.01ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z" />
                                        </svg>
                                    @break

                                    @case('youtube')
                                        <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5c0 1.062.07 2.125.2 3.206.094.712.364 1.39.784 1.972a2.84 2.84 0 0 0 2.187.848c1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965c.132-1.081.2-2.144.2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206ZM10.008 14.59V8.97l5.4 2.81-5.4 2.81Z" />
                                        </svg>
                                    @break

                                    @case('tiktok')
                                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M9.5 3.25a.75.75 0 0 1 .75-.75h1.003c.776 0 1.48.293 2.01.77.525.473.902 1.11 1.057 1.786l.027.124c.075.338.245.642.486.884.242.24.547.41.886.484l.124.027a4.142 4.142 0 0 0 1.134.125h.02a.75.75 0 0 1 .75.75v.997a.75.75 0 0 1-.75.75 5.578 5.578 0 0 1-2.189-.426V14a5.5 5.5 0 1 1-6.753-5.352.75.75 0 0 1 .904.734v1.003a.75.75 0 0 1-.62.74A2.998 2.998 0 1 0 12.5 14V3.25a.75.75 0 0 1 .75-.75h.997a.75.75 0 0 1 .75.75v2.07a3.615 3.615 0 0 1-.97-.517 3.61 3.61 0 0 1-1.143-1.734A3.527 3.527 0 0 1 12.5 3h-.997a.75.75 0 0 1-.75-.75Z" />
                                        </svg>
                                    @break

                                    @case('facebook')
                                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.5 9.00007H15.5V6.00007H13.5C11.567 6.00007 10 7.56708 10 9.50007V11.0001H8V14.0001H10V21.0001H13V14.0001H15.5L16 11.0001H13V9.50007C13 9.22393 13.2239 9.00007 13.5 9.00007Z" />
                                        </svg>
                                    @break

                                    @case('x')
                                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M19.42 3H16.7L12.94 8.18 9.69 3H3.98L10.51 12.66 3.5 21H6.28L10.46 15.49 14.09 21H19.82L12.97 11.73 19.42 3ZM7.14 4.53H8.88L16.66 19.48H14.92L7.14 4.53Z" />
                                        </svg>
                                    @break
                                @endswitch
                            </div>
                            <div>
                                <h3 class="text-base font-semibold text-gray-900">{{ $social['name'] }}</h3>
                                <p class="text-sm font-semibold text-indigo-600">{{ $social['username'] }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layout>
