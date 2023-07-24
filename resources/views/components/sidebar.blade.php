<div class="relative flex grow flex-col bg-white text-sm font-medium leading-5 text-gray-900 full-window-height">

    <!-- Sidebar content -->
    <div class="grow mt-2">
        <!-- Sidebar links -->
        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H3l9-9 9 9h-2"></path>
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"></path>
                <path d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"></path>
            </svg>
            &nbsp;{{ __('Dashboard') }}
        </x-sidebar-link>
        <x-sidebar-link :href="route('doctors.index')" :active="request()->routeIs('doctors.index')">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 4H5a2 2 0 0 0-2 2v3.5a5.5 5.5 0 0 0 11 0V6a2 2 0 0 0-2-2h-1"></path>
                <path d="M8 15a6 6 0 0 0 12 0v-3"></path>
                <path d="M11 3v2"></path>
                <path d="M6 3v2"></path>
                <path d="M20 12a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
            </svg>
            &nbsp;{{ __('Doctors') }}
        </x-sidebar-link>
        {{-- <x-sidebar-link :href="route('appointments.index')" :active="request()->routeIs('appointments.index') || request()->routeIs('appointments.edit')">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M17 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Z"></path>
                <path d="M9 7h6"></path>
                <path d="M9 11h6"></path>
                <path d="M9 15h4"></path>
            </svg>
            &nbsp;{{ __('Appointments') }}
        </x-sidebar-link> --}}
        <x-sidebar-link :href="route('patients.index')" :active="request()->routeIs('patients.index')">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"></path>
                <path d="M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 3.133a4 4 0 0 1 0 7.75"></path>
                <path d="M21 20.998v-2a4 4 0 0 0-3-3.85"></path>
            </svg>
            &nbsp;{{ __('Patients') }}
        </x-sidebar-link>
        <x-sidebar-link :href="route('doctors.create')" :active="request()->routeIs('doctors.create') || request()->routeIs('doctors.edit')">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"></path>
                <path d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                <path d="M6.168 18.849A4 4 0 0 1 10 16h4a4 4 0 0 1 3.834 2.855"></path>
            </svg>
            &nbsp;{{ __('Manage Doctors') }}
        </x-sidebar-link>
    </div>
</div>