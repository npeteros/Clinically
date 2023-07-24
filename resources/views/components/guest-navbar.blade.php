<nav class="sticky top-0 border-b border-b-gray-200 w-full bg-white">

    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 mt-1 mr-2 text-right z-10">
            @auth
                {{-- <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-black-600 hover:text-black-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> --}}
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-black-600 hover:text-black-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm font-medium text-black-600 hover:text-black-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="max-w-7xl sm:px-6 lg:px-3">
        <div class="items-center h-20 grid grid-cols-12">
            @auth
                <div class="col-span-3"></div>
                <div class="flex items-center col-span-6 gap-6">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo(text).png') }}" alt="Logo" class="h-12 w-auto">
                    </a>
                    <!-- Navbar links -->
                    <a href="{{ route('home') }}" class="text-black px-3 py-2 text-sm font-medium">Home</a>
                    <a href="{{ route('home') }}/#services" class="text-black px-3 py-2 text-sm font-medium">Services</a>
                    <a href="#team" class="text-black px-3 py-2 text-sm font-medium">Our Team</a>
                    <a href="#" class="text-black px-3 py-2 text-sm font-medium">About Us</a>
                    <a href="#" class="text-black px-3 py-2 text-sm font-medium">Contact Us</a>
                </div>
                <div class="flex items-center col-span-3">
                    @admin
                        <button type="button" class="px-8 py-3 bg-white border-2 border-rose-500 rounded-full font-semibold text-xs text-rose-500" onclick="window.location='{{ route('dashboard') }}'">
                            Dashboard
                        </button>
                    @endadmin
                    &ensp;&ensp;
                    <button type="button" class="px-4 py-3 bg-gradient-to-r from-[#fe866e] from-40% to-[#f43f5e] to-100% border border-transparent rounded-full font-semibold text-xs text-white" onclick="window.location='{{ route('appointments.index') }}'">
                        Book an Appointment
                    </button>
                </div>
            @else
                <div class="col-span-4"></div>
                <div class="flex items-center col-span-6 gap-6">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo(text).png') }}" alt="Logo" class="h-12 w-auto">
                    </a>
                    <!-- Navbar links -->
                    <a href="{{ route('home') }}" class="text-black px-3 py-2 text-sm font-medium">Home</a>
                    <a href="{{ route('home') }}/#services" class="text-black px-3 py-2 text-sm font-medium">Services</a>
                    <a href="#team" class="text-black px-3 py-2 text-sm font-medium">Our Team</a>
                    <a href="#" class="text-black px-3 py-2 text-sm font-medium">About Us</a>
                    <a href="#" class="text-black px-3 py-2 text-sm font-medium">Contact Us</a>
                </div>
                <div class="flex items-center col-span-2">
                    <button type="button" class="px-4 py-3 bg-gradient-to-r from-[#fe866e] from-40% to-[#f43f5e] to-100% border border-transparent rounded-full font-semibold text-xs text-white" onclick="window.location='{{ route('appointments.index') }}'">
                        Book an Appointment
                    </button>
                </div>
            @endauth
        </div>
    </div>
</nav>