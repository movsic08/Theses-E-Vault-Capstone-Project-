<section>
    <div class="flex w-full items-end justify-between">
        <h2 class="mb-4 text-xl font-semibold capitalize">filterWords Settings</h2>
        <button
            class="flex items-center gap-1 rounded-lg bg-primary-color px-3 py-2 text-white duration-300 ease-in-out hover:bg-blue-900">
            Add new
            <svg class="h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0Zm-9.375-4.375a.625.625 0 1 0-1.25 0v3.75h-3.75a.625.625 0 1 0 0 1.25h3.75v3.75a.624.624 0 1 0 1.25 0v-3.75h3.75a.624.624 0 1 0 0-1.25h-3.75v-3.75Z">
                </path>
            </svg>
        </button>
    </div>
    <div class="mt-2 flex flex-col">
        <div class="-my-2 overflow-x-auto">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Word
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    created at
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    options
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4">
                                    Document 1
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    Sample Content
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                    <button class="ml-2 text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-2 flex w-full items-center justify-center">
                        {{ $filterwords->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
