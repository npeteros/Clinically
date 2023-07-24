<x-home>

    <x-guest-navbar />
    
    <div class="max-w-9xl mt-10 sm:px-6 lg:px-8 full-window-height">
        <div class="items-start grid grid-cols-12">
            <div class="col-span-1"></div>
            <div class="col-span-10">
                <div class="flex w-full h-96 bg-gradient-to-r from-[#fe866e] from-50% to-[#f43f5e] to-100% rounded-br-[60px] rounded-br-[60px] h-auto text-black pb-4">
                    <div class="w-1/2">
                        <img src="{{ asset('images/home.png') }}" alt="Home" class="h-96 pt-5 w-auto">
                    </div>

                    <div class="mr-10 w-1/2">
                        <div class="pt-4">
                            <h1 class="mt-6 text-white text-justify font-bold text-3xl tracking-wider">Book an Appointment!</h1>
                            <form action="{{ route('appointments.store') }}" method="post" class="grid grid-cols-4 gap-4 mt-2">
                                @csrf
                                <div class="col-span-2">
                                    <input type="text" placeholder="First Name" id="first_name" name="first_name" class="bg-transparent border-2 border-slate-200 text-white indent-3 placeholder:text-white placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" required value="{{ old('first_name') }}"  />
                                </div>
                            
                                <div class="col-span-2">
                                    <input type="text" placeholder="Last Name" id="last_name" name="last_name" class="bg-transparent border-2 border-slate-200 text-white indent-3 placeholder:text-white placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" required value="{{ old('last_name') }}"  />
                                </div>
                            
                                <div class="col-span-4">                                    
                                    <input type="email" placeholder="Email" id="email" name="email" class="bg-transparent border-2 border-slate-200 text-white indent-3 placeholder:text-white placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" required value="{{ old('email') }}"  />
                                </div>
                            
                                <div class="col-span-4">
                                    <select name="doctor" id="doctor" placeholder="Select Doctor" class="bg-transparent border-2 border-slate-200 text-white indent-3 placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" required>
                                        <option value="0" class="text-white">Select Doctor</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" class="text-gray-700">{{ $doctor->name }} (&#8369; {{ number_format($doctor->rate, 2, ".", ",") }}/hr)</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <div class="col-span-2">
                                    <input type="date" name="date" id="date" class="bg-transparent border-2 border-slate-200 text-white indent-3 placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" required value="{{ date("Y-m-d", strtotime('tomorrow')) }}" />
                                </div>
                            
                                <div class="col-span-4">
                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-white" />
                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-white" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-white" />
                                    <x-input-error :messages="$errors->get('doctor')" class="mt-2 text-white" />
                                    <x-input-error :messages="$errors->get('date')" class="mt-2 text-white" />
                                </div>
                                
                                <div class="col-span-1"></div>

                                <div class="col-span-3">
                                    <button type="submit" class="bg-white text-rose-500 rounded-full px-4 py-2 font-semibold">
                                        Appointment Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="items-start grid grid-cols-12">
            <div class="col-span-1"></div>
            <div class="col-span-10">
                @foreach ($appointments as $appointment)
                    <div class="w-full h-96 bg-rose-200 h-auto text-black pb-4 mt-6">
                        @php
                            $doctor_name = $doctors->where('id', '=', $appointment->doctor)->value('name');    
                        @endphp
                        <div class="p-6 flex space-x-2">
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <small class="text-sm text-gray-600">{{ $appointment->created_at->format('j M Y, g:i a') }}</small>
                                        @unless ($appointment->created_at->eq($appointment->updated_at))
                                            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                        @endunless
                                    </div>
                                    @if ($appointment->user->is(auth()->user()))
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('appointments.edit', $appointment)">
                                                    {{ __('Edit Appointment') }}
                                                </x-dropdown-link>
                                                <form method="POST" action="{{ route('appointments.destroy', $appointment) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link :href="route('appointments.destroy', $appointment)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Cancel Appointment') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    @endif
                                </div>
                                <p class="mt-4 text-md text-gray-900"><span class="font-bold">Patient's Name:</span> {{ $appointment->first_name . ' ' . $appointment->last_name }}</p>
                                <p class="mt-4 text-md text-gray-900"><span class="font-bold">Patient's Email:</span> {{ $appointment->email }}</p>
                                <p class="mt-4 text-md text-gray-900"><span class="font-bold">Date of Appointment:</span> {{ date('F j, Y', strtotime($appointment->date)) }}</p>
                                <p class="mt-4 text-md text-gray-900"><span class="font-bold">Doctor Assigned:</span> {{ $doctor_name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-home>