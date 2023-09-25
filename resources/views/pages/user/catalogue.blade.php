<x-app-layout>
    @section('title', 'Catologue')
    <section class="container">
        <div class="p-2">
            <h2 class="">Document Types</h2>
            @php
                // dd($document_types);
            @endphp
            <section class="flex w-full gap-3">
                @foreach ($document_types as $itemDocumentType)
                    @php
                        $itemCount = \App\Models\DocuPost::where('document_type', $itemDocumentType)->count();
                    @endphp
                    <div class="my-2 flex w-full items-center rounded-lg bg-white p-2 shadow-lg">
                        <div
                            class="mx-4 flex h-fit w-fit rounded-md bg-blue-500 px-4 py-2 font-semibold text-white drop-shadow-md">
                            {{ $itemCount }}
                        </div>
                        <div class="mr-4">
                            <h1 class="font-bold text-blue-500">{{ $itemDocumentType }}</h1>
                        </div>
                    </div>
                @endforeach
            </section>
            <h2 class="mt-2">Collections</h2>
            <section class="mt-2">
                @foreach ($degree_lists as $itemDegree)
                    @php
                        $itemCount = \App\Models\DocuPost::where('course', $itemDegree)->count();
                    @endphp
                    <div class="my-3 flex items-center rounded-lg bg-white p-2 shadow-lg">
                        <div
                            class="mx-4 flex h-fit w-[3.5rem] items-center justify-center rounded-md bg-blue-500 px-4 py-2 font-semibold text-white drop-shadow-md">
                            {{ $itemCount }}
                        </div>
                        <div>
                            <h1 class="font-bold text-blue-500">{{ $itemDegree }}</h1>
                            <p class="text-gray-500">Theses submitted to the {{ $itemDegree }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
    </section>
</x-app-layout>
