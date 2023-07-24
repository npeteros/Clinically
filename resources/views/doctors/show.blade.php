<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $doctor->name }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-3 mt-4">
        <div></div>
        <div class="col-span-2">
            <img
                class="h-96 w-2/5 ml-24"
                src="{{ asset('storage/images/doctors/' . $doctor->path)}}"
                alt="Doctor {{ $doctor->id }}" 
            />
        </div>
        <div></div>
    </div>

    <div class="grid grid-cols-10">
        <div class="col-span-2"></div>
        <div
            class="col-span-7 w-full rounded-lg mt-6 mb-6 mr-8 bg-slate-300 to-100% shadow-sm rounded-lg divide-y"
        >
            
            <div class="p-6">
                <h6
                    class="mb-2 text-xl font-medium text-center leading-tight text-gray-800"
                >
                    {{ $doctor->name }}
                </h6>
                <p class="mb-4 text-base text-gray-800 italic text-justify">
                    {{ $doctor->description }}
                </p>
                <hr class="border-slate-400 w-1/2 my-6 ml-[25%] mr-[25%]" />
                <p class="mb-4 text-sm text-gray-800 text-justify">
                    <span class="font-semibold">Rate: </span>&#8369; {{ number_format($doctor->rate, 2, ".", ",") }} / hr
                </p>
                <p class="mb-4 text-sm text-gray-800 text-justify">
                    <span class="font-semibold">Total Earnings: </span>&#8369; {{ number_format($doctor->total_earnings, 2, ".", ",") }}
                </p>
                <p class="mb-4 text-sm text-gray-800 text-justify">
                    <span class="font-semibold">Patients: </span>{{ $doctor->patients }}
                </p>
                <p class="mb-4 text-sm text-gray-800 text-justify">
                    <span class="font-semibold">Active Appointments: </span>{{ $doctor->active_appointments }}
                </p>
                <p class="mb-4 text-sm text-gray-800 text-justify">
                    <span class="font-semibold">Total Appointments: </span>{{ $doctor->total_appointments }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>