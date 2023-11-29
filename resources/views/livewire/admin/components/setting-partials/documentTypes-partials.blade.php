<section>
    <div class="flex w-full items-end justify-between">
        <h2 class="mb-4 text-xl font-bold capitalize">document Type Settings</h2>
        <button wire:click='openAddNewDocumentType'
            class="flex items-center gap-1 rounded-lg bg-primary-color px-3 py-2 text-white duration-300 ease-in-out hover:bg-blue-900">
            Add new
            <svg class="h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0Zm-9.375-4.375a.625.625 0 1 0-1.25 0v3.75h-3.75a.625.625 0 1 0 0 1.25h3.75v3.75a.624.624 0 1 0 1.25 0v-3.75h3.75a.624.624 0 1 0 0-1.25h-3.75v-3.75Z">
                </path>
            </svg>
        </button>
    </div>
    <div class="flex flex-col">
        <div class="custom-scrollbar overflow-x-auto">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left font-bold uppercase text-slate-700">
                                    Document Type
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-bold uppercase text-slate-700">
                                    Sample
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-bold uppercase text-slate-700">
                                    Text Color
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-bold uppercase text-slate-700">
                                    Background Color
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-bold uppercase text-slate-700">
                                    Options
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($documentTypes as $item)
                                <tr>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        {{ $item->document_type_name }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="mt-1 w-fit rounded-full px-2 py-1 font-medium text-white"
                                            style="background-color: {{ $bgColor }}; color: {{ $textColor }}">
                                            {{ $item->document_type_name }}
                                        </div>

                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div>
                                            <div class="h-4 w-4" style="background-color: {{ $item->text_color }}">
                                            </div> {{ $item->text_color }}
                                        </div>

                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="w-1/2 rounded-full" style="background-color:{{ $item->bg_color }} ">
                                            {{ $item->bg_color }}
                                        </div>

                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium">
                                        <div class="flex w-full items-center justify-center gap-1">
                                            <svg wire:click='editDocuType({{ $item->id }})'
                                                class="h-7 cursor-pointer rounded-md bg-blue-600 p-1 text-white duration-200 ease-in-out hover:bg-blue-800"
                                                fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.067 2.182a.625.625 0 0 0-.884 0l-2.058 2.059 4.634 4.634 2.058-2.058a.623.623 0 0 0 0-.885l-3.75-3.75Zm.808 7.576L14.24 5.125 6.116 13.25h.259a.625.625 0 0 1 .625.624v.625h.625a.625.625 0 0 1 .625.625v.625h.625a.625.625 0 0 1 .625.626V17h.625a.625.625 0 0 1 .625.625v.258l8.125-8.125ZM9.54 19.093a.625.625 0 0 1-.04-.218v-.625h-.625a.625.625 0 0 1-.625-.625V17h-.625A.625.625 0 0 1 7 16.375v-.626h-.625a.625.625 0 0 1-.625-.625V14.5h-.625a.624.624 0 0 1-.219-.04l-.224.223a.625.625 0 0 0-.137.21l-2.5 6.25a.625.625 0 0 0 .812.813l6.25-2.5a.625.625 0 0 0 .21-.138l.223-.223Z">
                                                </path>
                                            </svg>
                                            <svg wire:click='deleteDocuType({{ $item->id }})'
                                                class="h-7 cursor-pointer rounded-md bg-red-600 p-1 text-white duration-200 ease-in-out hover:bg-red-800"
                                                fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.36 4.2v1.2h4.2a.6.6 0 0 1 0 1.2h-.645L17.89 19.392a2.4 2.4 0 0 1-2.393 2.208H8.022a2.4 2.4 0 0 1-2.392-2.208L4.606 6.6H3.96a.6.6 0 0 1 0-1.2h4.2V4.2a1.8 1.8 0 0 1 1.8-1.8h3.6a1.8 1.8 0 0 1 1.8 1.8Zm-6 0v1.2h4.8V4.2a.6.6 0 0 0-.6-.6h-3.6a.6.6 0 0 0-.6.6Zm-1.8 4.235.6 10.2a.6.6 0 1 0 1.198-.072l-.6-10.2a.6.6 0 1 0-1.198.072Zm7.836-.633a.6.6 0 0 0-.633.564l-.6 10.2a.6.6 0 0 0 1.197.07l.6-10.2a.6.6 0 0 0-.564-.634ZM11.76 7.8a.6.6 0 0 0-.6.6v10.2a.6.6 0 1 0 1.2 0V8.4a.6.6 0 0 0-.6-.6Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
