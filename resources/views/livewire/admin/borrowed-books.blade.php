<div class="container">
    <div class="px-2">
        <div class="flex">
            <div class="bg-blue-300" style="width: fit-content;">
                <img class="max-h-8" src="{{ asset('assets/PSU_logo.png') }}" alt="psu_logo">
            </div>
            <div class="flex-grow text-center">
                <h1>Borrower's logbook student</h1>
            </div>
            <div class="rounded-md bg-green-950 p-2 text-white">Excel</div>
        </div>
        <div class="mb-6 mt-2 overflow-x-auto rounded-lg drop-shadow-md">

            <div class="my-2 divide-y divide-gray-200 bg-white">
                <h2>Hello</h2>
            </div>
            <table class="min-w-full divide-y rounded-lg">
                <!-- Table Head -->
                <thead>
                    <tr>
                        <th
                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                            Date
                        </th>
                        <th
                            class="bg-gray-50 px-2 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                            Name
                        </th>
                        <th
                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                            Course and year level
                        </th>
                        <th
                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                            category of collections
                        </th>
                        <th
                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                            Title
                        </th>
                        <th
                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                            Author/s
                        </th>
                        <th
                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                            reference
                        </th>
                    </tr>
                </thead>


                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200 rounded-lg bg-white">
                    @foreach ($borrowerBooksLists as $item)
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium leading-5 text-gray-500">
                                {{ $item->created_at }}
                            </td>
                            <td class="px-2 py-4 text-sm leading-5 text-gray-500">
                                <span class="whitespace-nowrap">
                                    {{ $item->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                                III - B notworking pa hehe
                            </td>
                            <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                                {{ $item->category }}
                            </td>

                            <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                                {{ $item->title }}
                            </td>
                            <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                                <span class="whitespace-nowrap">
                                    {{ $item->author }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                                {{ $item->reference }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
