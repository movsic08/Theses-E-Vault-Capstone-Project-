<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                User
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                Account Role
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                Login Time
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($loginlogs as $item)
                            <tr>
                                @php
                                    $userData = \App\Models\User::where('id', $item->user_id)->first();
                                    if ($userData == null) {
                                        $fullname = 'Deleted user';
                                        $accountRole = 'Deleted user';
                                    } else {
                                        $fullname = $userData->first_name . ' ' . $userData->last_name;
                                        if ($item->is_admin == 1) {
                                            $accountRole = 'Admin';
                                        } else {
                                            if ($userData->role_id == 1) {
                                                $accountRole = 'User';
                                            } else {
                                                $accountRole = 'Faculty User';
                                            }
                                        }
                                    }

                                @endphp
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ $fullname }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ $accountRole }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ $item->login_time }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 flex w-full items-center justify-center">
                    {{ $loginlogs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
