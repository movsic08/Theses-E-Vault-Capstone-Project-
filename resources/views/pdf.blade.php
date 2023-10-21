<x-app-layout>
    @section('title', 'Pdf - ' . $titleOfDocu)

    {{-- <p>PDF File: {{ $pdfFile }}</p> --}}
    {{-- @php
        $file = \Illuminate\Support\Facades\Crypt::decrypt($pdfFile);
    @endphp
    <p>PDF File: DECRYPTED {{ $file }}</p> --}}


    <livewire:components.pdf-viewer-security :pdfFile="$pdfFile" :titleOfDocu="$titleOfDocu" :docuPostID="$docuPostID">

</x-app-layout>
