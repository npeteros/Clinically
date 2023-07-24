<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Doctors') }}
        </h2>
    </x-slot>

    <div class="mt-10 sm:px-6 lg:px-8">
        <div class="items-start grid grid-cols-12">
            <div class="col-span-12 mr-8">
                <div class="flex w-full h-96 bg-slate-300 rounded-br-[60px] rounded-br-[60px] h-auto text-black pb-4">
                    <div class="grid grid-cols-6">
                        <div></div>
                        <div class="col-span-4">
                            <img src="{{ asset('images/doctor.png') }}" alt="Doctor" class="h-96 pt-5 w-auto">
                        </div>
                    </div>

                    <div class="mr-10 w-1/2">
                        <div class="pt-4">
                            <h1 class="mt-6 text-gray-800 text-justify font-bold text-3xl tracking-wider">Add a Doctor!</h1>
                            <form action="{{ route('doctors.store') }}" method="post" class="grid grid-cols-4 gap-4 mt-2" enctype="multipart/form-data">
                                @csrf
                                <div class="col-span-4">
                                    <input type="text" placeholder="Full Name" id="name" name="name" class="bg-transparent border-2 border-slate-500 text-gray-800 indent-3 placeholder:text-gray-600 placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" required value="{{ old('name') }}"  />
                                </div>
                            
                                <div class="col-span-4">                                    
                                    <input type="email" placeholder="Email" id="email" name="email" class="bg-transparent border-2 border-slate-500 text-gray-800 indent-3 placeholder:text-gray-600 placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" required value="{{ old('email') }}"  />
                                </div>
                                
                                <div class="col-span-4">
                                    <textarea
                                        name="description"
                                        placeholder="{{ __('Doctor\'s Description') }}"
                                        class="bg-transparent border-2 border-slate-500 text-gray-800 indent-3 placeholder:text-gray-600 placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2"
                                        required>{{ old('description') }}</textarea>
                                </div>
                            
                                <div class="col-span-2">
                                    <input type="number" placeholder="Rate (in PHP)" name="rate" id="rate" min="1" step="0.01" class="bg-transparent border-2 border-slate-500 text-gray-800 indent-3 placeholder:text-gray-600 placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" required value="{{ old('rate') }}">
                                </div>

                                <div class="col-span-2 bg-transparent border-2 border-slate-500 text-gray-800 placeholder:text-gray-600 block w-full rounded-md focus:outline-0 px-5 py-1">
                                    <input type="file" placeholder="Upload image" name="path" id="path" class="form-control-file"  required>
                                </div>
                            
                                <div class="col-span-4">
                                    <x-input-error :messages="$errors->get('name')" />
                                    <x-input-error :messages="$errors->get('email')" />
                                    <x-input-error :messages="$errors->get('description')" />
                                    <x-input-error :messages="$errors->get('rate')" />
                                    <x-input-error :messages="$errors->get('path')" />
                                </div>
                                
                                <div class="col-span-1"></div>

                                <div class="col-span-2">
                                    <button type="submit" class="bg-white text-gray-800 rounded-full px-12 py-2 font-semibold">
                                        Add Doctor
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Side Card --}}
    <div class="grid grid-cols-4 ml-2">
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
                    >
                        Modify Doctor
                    </button>
                    <button
                        type="button"
                        class="mt-2 inline-block rounded bg-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-slate-200"
                    >
                        Remove Doctor
                    </button>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>