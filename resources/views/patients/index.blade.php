<x-app-layout>
    @foreach ($patients as $patient)
        {{ $patient->name }}
    @endforeach
</x-app-layout>