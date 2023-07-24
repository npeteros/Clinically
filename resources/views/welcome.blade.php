<x-home>

<x-guest-navbar />

<div class="full-window-height">
    <div class="max-w-7xl mt-10 sm:px-6 lg:px-8">
        <div class="items-start grid grid-cols-12" id="home">
            <div class="col-span-2"></div>
            <div class="col-span-10">
                <div class="flex w-full h-96 bg-gradient-to-r from-[#fe866e] from-50% to-[#f43f5e] to-100% rounded-br-[60px] ml-6 text-black">
                    <div class="w-1/2">
                        <img src="{{ asset('images/home.png') }}" alt="Home" class="h-96 pt-5 w-auto">
                    </div>

                    <div class="mr-10 w-1/2">
                        <div class="pt-4">
                            <h1 class="mt-6 text-white text-justify font-bold text-3xl tracking-widest">Clinically</h1>
                            <p class="mt-6 text-slate-100 font-semibold tracking-wider text-l text-justify">
                                Experience hassle-free scheduling and efficient management of your clinic appointments with our user-friendly interface. Whether you're a patient or a healthcare provider, we've designed our platform to streamline the process and enhance your overall experience.
                                
                                <br />
                                
                                <button 
                                    type="submit" 
                                    class="bg-white text-rose-500 rounded-full mt-8 px-4 py-2 ml-24 font-semibold" 
                                    onclick="event.preventDefault(); window.location='{{ route('home') }}/#services'"
                                >
                                    &#8595; Learn More
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-12 border-solid border-b-2 border-rose-100 w-4/5 m-auto">&ensp;</div>

    <div class="max-w-7xl mt-10 sm:px-6 lg:px-8">
        <div class="items-start grid grid-cols-12 mt-12" id="services">
            <div class="col-span-2"></div>
            <div class="col-span-5 ml-6">
                <h6 class="font-mono tracking-widest text-rose-500 text-lg font-bold">Services</h6>

                <div class="grid grid-cols-6 mt-6">

                    <div class="col-span-5">
                        <span class="text-4xl font-extrabold tracking-widest text-right">We Cover A Big Variety of Medical Services</span>
                    </div>

                    <div class="col-span-1"></div>

                    <div class="col-span-4">
                        <p class="mt-6 text-slate-600 font-semibold tracking-wider text-l text-justify">
                            At Clinically, we are dedicated to providing exceptional healthcare services and ensuring a seamless experience for our patients. Our Clinic Appointment Management System offers a range of convenient services to streamline the appointment process and enhance your healthcare journey.

                            
                        </p>
                    </div>

                </div>

            </div>
            <div class="col-span-5">
                <div class="bg-rose-400 opacity-30 w-screen h-72 rounded-l-3xl mt-20"></div>
            </div>
        </div>
        
        {{-- 
        <div class="items-start grid grid-cols-12 mt-12" id="team">
            <div class="col-span-3"></div>
            <div class="col-span-9">
                <div class="flex w-full h-auto bg-gradient-to-r from-[#fe866e] from-50% to-[#f43f5e] to-100% text-black">
                    <div class="mr-10 w-full">
                        <h1 class="text-white text-center font-bold text-3xl tracking-widest">Our Team</h1>
                    </div>
                </div>
            </div>
            <div class="col-span-3"></div>
            <div class="col-span-9">
                @foreach ($doctors as $doctor)
                    <div class="col-span-4 mt-6">
                        <div
                            class="flex w-full h-full flex-grow rounded-lg bg-gradient-to-r from-[#fe866e] from-50% to-[#f43f5e] to-100"
                        >
                            <img
                                class="h-96 rounded-t-lg object-cover md:h-auto md:w-1/5 md:rounded-none md:rounded-l-lg"
                                src="{{ asset('storage/images/doctors/' . $doctor->path)}}"
                                alt="Doctor {{ $doctor->id }}" 
                            />
                            <div class="flex flex-col justify-start p-9">
                                <h5
                                    class="mb-2 text-xl font-medium text-gray-800"
                                >
                                    {{ $doctor->name }}
                                </h5>
                                <p class="mb-4 text-justify text-gray-800">
                                    {{ mb_strimwidth($doctor->description, 0, 200, "...") }}
                                </p>
                                <button
                                    type="button"
                                    class="inline-block rounded bg-white w-1/3 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-slate-200"
                                    onclick="window.location='{{ route('doctors.show', $doctor) }}'"
                                >
                                    View Doctor
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>
</x-home>