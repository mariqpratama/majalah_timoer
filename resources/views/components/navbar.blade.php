<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl mx-auto flex items-center justify-between px-4 py-2 md:py-3">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/asset/logo/logo.png" class="h-12 md:h-16 object-contain" alt="Timoer Logo" />
        </a>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-8 font-medium items-center">
            <li>
                <a href="/"
                    class="nav-link block py-2 px-3 rounded md:p-0 text-blue-700 hover:text-blue-900 dark:text-white dark:hover:text-amber-400">Home</a>
            </li>
            <li>
                <a href="/about"
                    class="nav-link block py-2 px-3 rounded md:p-0 text-blue-700 hover:text-blue-900 dark:text-white dark:hover:text-amber-400">Tentang
                    Kami</a>
            </li>
            <li>
                <a href="/contact"
                    class="nav-link block py-2 px-3 rounded md:p-0 text-blue-700 hover:text-blue-900 dark:text-white dark:hover:text-amber-400">Kontak
                    Kami</a>
            </li>
        </ul>

        <!-- Mobile Burger -->
        <div class="md:hidden">
            <button id="menu-button" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="hidden md:hidden bg-white dark:bg-gray-900 w-full px-4 pb-4 transition-all duration-300 ease-in-out">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/"
                    class="nav-link block py-2 px-3 rounded text-blue-700 hover:text-blue-900 dark:text-white dark:hover:text-amber-400">Home</a>
            </li>
            <li>
                <a href="/about"
                    class="nav-link block py-2 px-3 rounded text-blue-700 hover:text-blue-900 dark:text-white dark:hover:text-amber-400">Tentang
                    Kami</a>
            </li>
            <li>
                <a href="/contact"
                    class="nav-link block py-2 px-3 rounded text-blue-700 hover:text-blue-900 dark:text-white dark:hover:text-amber-400">Kontak
                    Kami</a>
            </li>
        </ul>
    </div>
</nav>
