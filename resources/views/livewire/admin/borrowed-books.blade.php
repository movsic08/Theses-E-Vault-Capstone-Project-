<div class="container">
    <div class="px-2">
        <section class="mt-1 flex justify-between py-1">
            <h2>Borrowed Books</h2>
            <div class="rounded-md bg-green-950 p-2 text-white">Excel</div>
        </section>
        <div class="mt-2 overflow-x-auto">
            <div class="flex">
                <div class="bg-blue-300" style="width: fit-content;">
                    <img class="max-h-8" src="{{ asset('assets/PSU_logo.png') }}" alt="psu_logo">
                </div>
                <div class="flex-grow text-center">
                    <h1>Borrower's logbook student</h1>
                </div>
            </div>
            <table class="min-w-full divide-y divide-gray-200 rounded-lg drop-shadow-lg">
                <!-- Table Head -->
                <thead>
                    <tr>
                        <th
                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
                            Date
                        </th>
                        <th
                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">
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
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr>
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium leading-5 text-gray-500">
                            Jan 23, 2023
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                            <span class="whitespace-nowrap">John Maria DumusmogTen</span>
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                            III - B
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                            Research
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque aperiam nam amet eum
                            obcaecati tempore exercitationem, saepe provident earum assumenda corrupti in quaerat esse
                            aliquam adipisci! Error molestiae animi repudiandae.
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                            <span class="whitespace-nowrap">Juan Dela Cruz</span>
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-500">
                            2u3i4bi23ub23
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
