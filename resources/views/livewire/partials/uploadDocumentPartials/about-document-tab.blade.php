  <div class="text-gray-700">
                                <h1 class="flex flex-col text-center text-base font-bold text-primary-color md:text-xl">
                                    Enter basic
                                    information
                                    about
                                    your
                                    work.
                                    <small class="font-normal text-gray-400">Please fill in basic information so that
                                        the
                                        other
                                        users
                                        will know
                                        what your research
                                        about is.</small>
                                </h1>
                                <section class="flex flex-col gap-2">
                                    <div class="flex w-full flex-col">
                                        <x-label-input for='title'>Title</x-label-input>
                                        <x-input-field class="w-full" wire:model.live="title" id="title"
                                            placeholder="Title of your work" />
                                        @error('title')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="flex w-full flex-col gap-2 md:mt-2 md:flex-row md:gap-4">
                                        <div class="flex flex-col md:w-1/2">
                                            <x-label-input for='bachelor_degree'>Bachelor Degree</x-label-input>

                                            @if (auth()->user()->is_admin)
                                                <select wire:model.live="bachelor_degree_value"
                                                    class="block h-9 w-full rounded-md border border-gray-300 bg-white px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                                    id="userLevel">
                                                    @php
                                                        $courseLists = \App\Models\BachelorDegree::get();
                                                    @endphp
                                                    @foreach ($courseLists as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <x-input-field class="w-full" type="text"
                                                    wire:model.live="bachelor_degree_value"
                                                    placeholder="{{ auth()->user()->is_admin ? 'Degree name' : '' }}"
                                                    id="bachelor_degree" :disabled="!auth()->user()->is_admin" />
                                            @endif
                                            @error('bachelor_degree_value')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col md:w-1/2">
                                            <x-label-input for='document_type'>Document Type</x-label-input>
                                            <select class="rounded-md border border-gray-400 p-2 text-sm"
                                                wire:model="document_type" id="document_type">
                                                <option selected value="Capstone">Capstone</option>
                                                <option value="Research">Research</option>
                                                <option value="Feasibs">Feasibs</option>
                                                <option value="Thesis">Thesis</option>
                                            </select>
                                            @error('document_type')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex w-full flex-col gap-2 md:mt-2 md:gap-4 lg:flex-row">
                                        <div class="flex w-full flex-col gap-2 md:flex-row md:gap-4 lg:w-1/2">
                                            <div class="flex flex-col md:w-1/2">
                                                <x-label-input for='date_of_approval'>Date of approval</x-label-input>
                                                <x-input-field class="w-full" type="date"
                                                    wire:model.live="date_of_approval" id="date_of_approval" />
                                                @error('date_of_approval')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="flex flex-col md:w-1/2">
                                                <x-label-input for='format'>Format</x-label-input>
                                                <x-input-field class="w-full" type="text" wire:model.live="format"
                                                    id="format" placeholder="Eg. Electronic" />
                                                @error('format')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex w-full flex-col gap-2 md:flex-row md:gap-4 lg:w-1/2">
                                            <div class="flex flex-col md:w-1/2">
                                                <x-label-input for='physical_description'>Physical
                                                    Description</x-label-input>
                                                <x-input-field class="w-full" type="text"
                                                    wire:model.live="physical_description" placeholder="189 pages"
                                                    id="physical_description" />
                                                @error('physical_description')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="flex flex-col md:w-1/2">
                                                <x-label-input for="language">
                                                    Language</x-label-input>
                                                <input class="rounded-md border border-gray-400 p-2 text-sm"
                                                    type="text" wire:model.live="language" id="language"
                                                    placeholder="English" />
                                                @error('language')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 flex w-full flex-col gap-2 md:flex-row md:gap-4">
                                        <div class="flex flex-col md:w-1/2">
                                            <x-label-input for="panel_chair">
                                                Defense panel chair</x-label-input>
                                            <x-input-field class="w-full" type="text"
                                                wire:model.live="panel_chair" id="panel_chair"
                                                placeholder="Name of panel chairperson" />
                                            @error('panel_chair')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col md:w-1/2">
                                            <x-label-input for="advisor">
                                                Advisor</x-label-input>
                                            <x-input-field class="w-full" type="text" wire:model.live="advisor"
                                                id="advisor" placeholder="English"
                                                placeholder="Name of your advisor" />
                                            @error('advisor')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mt-2 flex w-full flex-col gap-2 md:gap-4">
                                        <x-label-input for="panel_member">
                                            Defense panel member</x-label-input>
                                        <div class="flex flex-col gap-2 md:flex-row md:gap-4">
                                            <div class="w-full">
                                                <x-input-field class="w-full" type="text"
                                                    wire:model.live="panel_member1" id="panel_member"
                                                    placeholder="Defense panel member 1"
                                                    placeholder="Panel member 1" />
                                                @error('panel_member1')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="w-full">
                                                <x-input-field class="w-full" type="text"
                                                    wire:model.live="panel_member2" id="panel_member"
                                                    placeholder="Defense panel member 2"
                                                    placeholder="Panel member 2" />
                                                @error('panel_member2')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-2 md:flex-row md:gap-4">
                                            <div class="w-full">
                                                <x-input-field class="w-full" type="text"
                                                    wire:model.live="panel_member3" id="panel_member"
                                                    placeholder="Defense panel member 3"
                                                    placeholder="Panel member 3" />
                                                @error('panel_member3')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="w-full">
                                                <x-input-field class="w-full" type="text"
                                                    wire:model.live="panel_member4" id="panel_member"
                                                    placeholder="Defense panel member 4"
                                                    placeholder="Panel member 4" />
                                                @error('panel_member4')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </section>

                            </div>