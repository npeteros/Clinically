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
                            <h1 class="mt-6 text-white text-justify font-bold text-3xl tracking-wider">Edit Appointment!</h1>
                            <form action="{{ route('appointments.update', $appointment) }}" method="post" class="grid grid-cols-4 gap-4 mt-2">
                                @csrf
                                @method('patch')
                                <div class="col-span-2">
                                    <input type="text" placeholder="First Name" id="first_name" name="first_name" class="bg-transparent border-2 border-slate-200 text-white indent-3 placeholder:text-white placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" required value="{{ old('first_name', $appointment->first_name) }}"  />
                                </div>
                            
                                <div class="col-span-2">
                                    <input type="text" placeholder="Last Name" id="last_name" name="last_name" class="bg-transparent border-2 border-slate-200 text-white indent-3 placeholder:text-white placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" required value="{{old('last_name', $appointment->last_name)}}"  />
                                </div>
                            
                                <div class="col-span-4">                                    
                                    <input type="email" placeholder="Email" id="email" name="email" class="bg-transparent border-2 border-slate-200 text-white indent-3 placeholder:text-white placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" required value="{{old('email', $appointment->email)}}"  />
                                </div>
                            
                                <div class="col-span-4">
                                    <select name="doctor" id="doctor" placeholder="Select Doctor" class="bg-transparent border-2 border-slate-200 text-white indent-3 placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" selected="{{ old('doctor', $appointment->doctor) }}" required>
                                        <option value="0" class="text-white">Select Doctor</option>
                                        @foreach ($doctors as $doctor)
                                            <option 
                                                value="{{ $doctor->id }}" 
                                                class="text-gray-700"
                                                @if ($doctor->id == $appointment->doctor)
                                                    {{ 'selected' }}
                                                @endif
                                            >{{ $doctor->name }} (&#8369; {{ number_format($doctor->rate, 2, ".", ",") }}/hr)</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-span-2">
                                    <input type="date" name="date" id="date" class="bg-transparent border-2 border-slate-200 text-white indent-3 placeholder:indent-3 block w-full rounded-md focus:outline-0 px-5 py-2" value="{{ date('Y-m-d', strtotime(old('date', $appointment->date))) }}" required />
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
                                        Save Appointment
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
