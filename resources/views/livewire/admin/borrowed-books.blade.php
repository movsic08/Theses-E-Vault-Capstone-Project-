<div class="container">
    <div class="px-2">
        <div class="flex items-center justify-center rounded-2xl bg-white px-4 py-2 drop-shadow-md">
            <div class="" style="width: fit-content;">
                <img class="max-h-10" src="{{ asset('assets/PSU_logo.png') }}" alt="psu_logo">
            </div>
            <div class="flex-grow text-center">
                <strong class="uppercase text-primary-color">Borrower's logbook </strong>
            </div>

            <div class="relative flex gap-2">
                <div wire:loading
                    class="absolute -left-5 top-3 inline-block h-4 w-4 animate-spin rounded-full border-4 border-solid border-primary-color border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                    role="status">
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                </div>
              
                <div class="mr-2 flex items-center">
                    <x-label-input class="mr-2">Items</x-label-input>
                    <select x-model="itemCategory"
                        class="block h-9 w-fit rounded-lg border border-gray-300 bg-gray-50 px-2 py-1 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option selected value="all">General</option>
                        <option value="month-and-year-only">Student</option>
                        <option value="month-and-year-only">Employee</option>
                    </select>
                </div>
                <div class="mr-2 flex items-center">
                    <x-label-input for="Date">Date</x-label-input>
                    <x-input-field class="ml-2" wire:model.live='findByDate' type="date" name=""
                        id="Date" />
                </div>
                <button wire:click="exportFilev2" class="rounded-md bg-green-950 p-2 text-white">Excel</button>
                </div>
                <div class="rounded-md bg-sky-950 p-2 text-white">Summary</div>
            </div>
        </div>
        <div class="mb-6 mt-2 rounded-lg drop-shadow-md">
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
                            Category
                        </th>
                        <th
                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                            Collections
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
                <tbody class="divide-y divide-gray-200 rounded-xl bg-white">
                    @foreach ($borrowerBooksLists as $item)
                        <tr>
                            @php
                                $borrowerType = rand(0, 1) ? 'Employee' : 'Student';
                            @endphp
                            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium leading-5 text-gray-500">
                                {{ \Carbon\Carbon::parse($item->created_att)->format('M d Y') }}
                            </td>
                            <td class="px-2 py-4 text-sm leading-5 text-gray-500">
                                <span class="whitespace-nowrap">
                                    {{ $item->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                                @if ($borrowerType === 'Student')
                                    {{ ['I', 'II', 'III', 'IV'][rand(0, 3)] . '-' . ['A', 'B', 'C'][rand(0, 2)] }}
                                @elseif ($borrowerType === 'Employee')
                                    {{ $item->course }}
                                @endif


                            </td>
                            <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                                {{ $borrowerType }}
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
