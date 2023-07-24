<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctors') }}
        </h2>
    </x-slot>
    {{-- Side Card --}}
    <div class="grid grid-cols-5">
        @foreach ($doctors as $doctor)
            <div
                class="col-span-2 flex flex-col rounded-lg mt-6 ml-6 bg-slate-300 md:max-w-xl md:flex-row"
            >
                <img
                    class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                    src="{{ asset('storage/images/doctors/' . $doctor->path)}}"
                    alt="Doctor {{ $doctor->id }}" 
                />
                <div class="flex flex-col justify-start p-6">
                    <h5
                        class="mb-2 text-xl font-medium text-gray-800"
                    >
                        {{ $doctor->name }}
                    </h5>
                    <p class="mb-4 text-base text-gray-800">
                        {{ mb_strimwidth($doctor->description, 0, 150, "...") }}
                    </p>
                    <button
                        type="button"
                        class="inline-block rounded bg-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-slate-200"
                        onclick="window.location='{{ route('doctors.show', $doctor) }}'"
                    >
                        View Doctor
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Horizontal Card --}}
    {{-- <div class="grid grid-cols-3 gap-4">
        @foreach ($doctors as $doctor)
            <div
                class="w-2/3 rounded-lg mt-6 ml-6 mr-8 bg-gradient-to-r from-[#fe866e] from-50% to-[#f43f5e] to-100% shadow-sm rounded-lg divide-y"
            >
                <img
                    class="h-48 w-full"
                    src="{{ asset('storage/images/doctors/' . $doctor->path)}}"
                    alt="Doctor {{ $doctor->id }}" 
                />
                <div class="p-6">
                    <h6
                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50"
                    >
                        {{ $doctor->name }}
                    </h6>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        {{ mb_strimwidth($doctor->description, 0, 100, "...") }}
                    </p>
                    <button
                        type="button"
                        class="inline-block rounded bg-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-slate-200"
                    >
                        View Doctor
                    </button>
                </div>
            </div>
        @endforeach
    </div> --}}

</x-app-layout>