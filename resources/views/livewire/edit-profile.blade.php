<script>
    $(document).ready(function() {
        // Show the content of the "General" tab by default
        $('#tab-1').show();

        $('.tab-button').click(function() {
            var tabId = $(this).data('tab');
            $('.tab-content').hide();
            $('#' + tabId).show();
            // Remove the 'active' class from all buttons
            $('.tab-button').removeClass('border-b-4 border-primary-color font-bold ');

            // Add the 'active' class to the clicked button
            $(this).addClass('border-b-4 border-primary-color font-bold');
        });
    });
</script>
<div class="container mb-4">
    <h1 class="font-bold">Account information</h1>
</div>
<section class="container mb-8 flex h-full items-start justify-center">
    <div class="flex h-full w-full flex-col gap-6 lg:flex-row lg:items-start lg:justify-center">
        <section class="flex h-full flex-col gap-2">
            <div class="flex flex-col rounded-lg bg-white p-4 drop-shadow-lg">
                <div class="flex flex-col items-center justify-center">
                    <img class="h-40 w-40 rounded-full object-cover" src="{{ asset('assets/psu_acc.jpg') }}"
                        alt="profile">
                    <h3 class="font-semibold">Elmer t</h3>
                </div>
                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Username</p>
                    <p class="whitespace-normal pl-4 text-gray-500">
                        dbf90</p>
                </div>
                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Student ID</p>
                    <p class="whitespace-normal pl-4 text-gray-500">
                        21-DB-9823
                    </p>
                </div>
                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Email</p>
                    <p class="whitespace-normal pl-14 text-gray-500">
                        21kermmy@gmail.com
                    </p>
                </div>
                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Phone</p>
                    <p class="whitespace-normal pl-12 text-gray-500">
                        09102678192
                    </p>
                </div>
                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Address</p>
                    <p class="whitespace-normal pl-8 text-gray-500">
                        Poblacion, Alaminos City, Pangasinan
                    </p>
                </div>
                <div class="flex flex-col md:flex-row">
                    <p class="font-bold text-gray-700">Bachelor</p>
                    <p class="whitespace-normal pl-6 text-gray-500">
                        Bachelor of Science in Information Technology
                    </p>
                </div>
            </div>
            <div class="flex h-full gap-2">
                <div
                    class="flex h-full w-1/2 flex-col items-center justify-center rounded-lg bg-white p-4 drop-shadow-lg">
                    <span>Facebook</span>
                </div>
                <div
                    class="flex h-full w-1/2 flex-col items-center justify-center rounded-lg bg-white p-4 drop-shadow-lg">
                    <span>MIcrosft Team</span>
                </div>
            </div>
        </section>
        <section class="h-full flex-grow rounded-lg bg-white drop-shadow-lg lg:w-3/4">
            <div class="flex flex-row gap-6 border-b border-gray-300 px-8 text-gray-600 md:gap-10 lg:gap-14">
                <button class="tab-button border-b-4 border-primary-color py-3 pt-5 font-bold"
                    data-tab="tab-1">General</button>
                <button class="tab-button py-3 pt-5" data-tab="tab-2">Security</button>
                <button class="tab-button py-3 pt-5" data-tab="tab-3">Links</button>
                <button class="tab-button py-3 pt-5" data-tab="tab-4">Files</button>
            </div>
            <div class="tab-content flex flex-col gap-1 px-6 py-4 text-gray-600" id="tab-1">
                <div class="flex flex-row">
                    <div class="flex flex-col">
                        <label class="text-sm font-semibold" for="fname">First name</label>
                        <input class="rounded-md border border-gray-400 p-2" type="text" name="fname"
                            id="fname" value="Elmer t">
                    </div>
                    <div class="flex flex-col">
                        <label for="fname" class="text-sm font-semibold">Last name</label>
                        <input class="rounded-md border border-gray-400 p-2" type="text" name="fname"
                            id="fname" value="Tirao">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="flex flex-col">
                        <label class="text-sm font-semibold" for="email">Email address</label>
                        <input class="rounded-md border border-gray-400 p-2" type="email" name="email"
                            id="email" value="Elmer@gmail.com">
                    </div>
                    <div class="flex flex-col">
                        <label for="pnumber" class="text-sm font-semibold">Phone number</label>
                        <input class="rounded-md border border-gray-400 p-2" type="text" name="pnumber"
                            id="pnumber" value="09107891327">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="flex flex-col">
                        <label class="text-sm font-semibold" for="studentID">Student ID</label>
                        <input class="rounded-md border border-gray-400 p-2" type="text" name="studentID"
                            id="studentID" value="21-JK-2342">
                    </div>
                    <div class="flex flex-col">
                        <label class="text-sm font-semibold" for="usernames">Username</label>
                        <input class="rounded-md border border-gray-400 p-2" type="text" name="usernames"
                            id="usernames" value="21-JK-2342">
                    </div>
                </div>
                <div class="w-full">
                    <label class="text-sm font-semibold" for="bachelor_degree">Bachelor Degree</label>
                    <select wire:model="bachelor_degree" id="bachelor-degree"
                        class="rounded-md border border-gray-400 p-2">
                        @foreach ($bachelor_degree as $degree)
                            <option class="text-sm" value="{{ $degree->id }}">{{ $degree->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex w-full flex-col">
                    <label class="text-sm font-semibold" for="address">Address</label>
                    <input class="rounded-md border border-gray-400 p-2" type="text" name="address"
                        id="address" value="Almainos, City Pangasinan">
                </div>
                <div class="flex flex-row gap-2">
                    <button class="w-1/4 rounded-md bg-blue-700 p-1 font-semibold text-white">Save</button>
                    <button
                        class="w-1/4 rounded-md border border-gray-400 bg-white p-1 font-semibold drop-shadow-md">Cancel</button>
                </div>
            </div>
            <div class="tab-content hidden p-4" id="tab-2">Content for Security tab</div>
            <div class="tab-content hidden p-4" id="tab-3">Content for Links tab</div>
            <div class="tab-content hidden p-4" id="tab-4">Content for Files tab</div>
        </section>
    </div>
</section>
