<x-app-layout>
    @push('styles')
        <link href="{{ asset('css/users/basic-search.css') }}" rel="stylesheet">
    @endpush
    @section('title', 'Advanced Search')

    <livewire:user.advanced-search>
</x-app-layout>
