<x-app-layout>
    @push('styles')
        <link href="{{ asset('css/users/basic-search.css') }}" rel="stylesheet">
    @endpush
    @section('title', 'Search')

    <livewire:user.basic-search>
</x-app-layout>
