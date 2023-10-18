<x-app-layout>
    @section('title', 'Pdf - ' . $titleOfDocu)
    <p>PDF File: {{ $pdfFile }}</p>

    <livewire:components.pdf-viewer-security :pdfFile="$pdfFile">

</x-app-layout>
