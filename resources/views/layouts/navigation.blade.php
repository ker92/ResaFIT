<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex items-center">

                <a href="{{ auth()->user()->role_id == 1 ? route('admin.dashboard') : route('user.dashboard') }}"
                   class="text-purple-600 font-bold text-xl flex items-center gap-2">

                    <i class="fa-solid fa-dumbbell"></i>
                    ResaFit
                </a>

            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:flex items-center space-x-6">

                <a href="{{ auth()->user()->role_id == 1 ? route('admin.dashboard') : route('user.dashboard') }}"
                   class="text-gray-700 hover:text-purple-600 transition">

                    <i class="fa-solid fa-chart-line"></i>
                    Dashboard
                </a>

            </div>

            <!-- User Menu -->
            <div class="hidden sm:flex items-center space-x-4">

<span class="text-gray-700 font-medium">
<i class="fa-solid fa-user"></i>
{{ Auth::user()->name }}
</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="text-red-600 hover:text-red-700 transition flex items-center gap-2">

                        <i class="fa-solid fa-right-from-bracket"></i>
                        Déconnexion

                    </button>

                </form>

            </div>

            <!-- Mobile Button -->
            <div class="sm:hidden">

                <button @click="open = ! open"
                        class="text-gray-700 text-xl">

                    <i :class="open ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'"></i>

                </button>

            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="sm:hidden border-t bg-white px-6 py-4 space-y-3">

        <a href="{{ auth()->user()->role_id == 1 ? route('admin.dashboard') : route('user.dashboard') }}"
           class="block text-gray-700 hover:text-purple-600 transition">

            <i class="fa-solid fa-chart-line me-2"></i>
            Dashboard

        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="text-red-600 flex items-center gap-2">

                <i class="fa-solid fa-right-from-bracket"></i>
                Déconnexion

            </button>

        </form>

    </div>

</nav>
