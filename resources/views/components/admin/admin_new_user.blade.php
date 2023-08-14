<div class="flex rounded bg-white p-1 drop-shadow-lg">
    <div class="flex-grow p-3">
        <div class="flex flex-col">
            <label class="font-medium" for="confirm_password">Account role</label>
            <select name="role_id" id="account-role"
                class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            @error('role_id')
                <span class="w-full px-1 text-xs text-red-700">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <label for="completeAccount" class="cursor-pointer">
            Complete the user account?
            <input type="checkbox" id="completeAccount">
        </label>
        <div>
            <button class="rounded-md bg-red-500 p-2 text-white" id="cancelbtn"> Cancel</button>
        </div>
    </div>
    <div id="leftContainer">
        <div class="flex-grow bg-blue-400 p-3">
            <h2>Hello</h2>
        </div>
    </div>
</div>
