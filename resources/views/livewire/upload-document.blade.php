<div class="relative">
    <div wire:loading.block wire:target="uploadDocument"
        class="fixed inset-0 z-50 flex h-screen w-screen items-center justify-center bg-gray-600 bg-opacity-25 backdrop-blur-sm">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="mx-auto w-fit rounded-lg bg-white text-center text-gray-600 drop-shadow-lg">
                <div class="rounded-t-xl bg-primary-color p-8 px-10 py-3 font-semibold text-white">
                    <h1>Processing</h1>
                </div>
                <div class="flex flex-col gap-2 px-10 pb-8 pt-3">
                    <img class="h-10" src="{{ asset('icons/logo.svg') }}" alt="Icon Description">
                    <h3 class="text-xs md:text-base">Uploading is on the process, please wait.</h3>
                    <div class="flex flex-col items-center justify-center gap-2">
                        <div class="h-8 w-8 animate-spin rounded-md border-4 border-t-4 border-blue-500">
                        </div>
                        <div class="h-2.5 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div id="progress-bar" class="h-2.5 animate-pulse rounded-full bg-primary-color"
                                style="width: 100%"></div>
                        </div>
                        <button wire:click="incrementProgress" class="text-white">Increment Progress</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($showUploadPdfBox)
        <div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-600 bg-opacity-25 backdrop-blur-sm"
            x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true; progress = 0"
            x-on:livewire-upload-finish="uploading = false; $wire.set('uploaded', true)"
            x-on:livewire-upload-error="uploading = false; progress = 0"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            <div class="mx-3 w-5/6 rounded-xl bg-white text-center text-gray-600 drop-shadow-lg md:w-3/6 lg:w-5/12">
                <div class="relative rounded-t-xl bg-primary-color px-10 py-3 font-semibold text-white">
                    @if (!$uploaded)
                        <svg wire:click='uploadPdfFileBox' class="absolute right-6 top-3 h-8 text-red-500"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0ZM8.693 7.808a.626.626 0 1 0-.885.885L11.116 12l-3.308 3.307a.626.626 0 1 0 .885.885L12 12.884l3.307 3.308a.627.627 0 0 0 .885-.885L12.884 12l3.308-3.307a.627.627 0 0 0-.885-.885L12 11.116 8.693 7.808Z">
                            </path>
                        </svg>
                    @endif

                    <h1>Upload your file here </h1>
                </div>
                <div class="flex h-fit w-full flex-col items-center rounded-b-xl bg-white px-2 py-4">
                    <label for="uploadFile"
                        class="mb-2 w-fit rounded-lg bg-primary-color px-10 py-2 text-center text-white hover:cursor-pointer">Upload
                        <input type="file" wire:model.live="user_upload" id="uploadFile" class="" hidden
                            accept="application/pdf">
                    </label>
                    <small class="text-gray-600">Please be guided, the required file should be in PDF format.</small>
                    <div>
                        @error('user_upload')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full" x-show="uploading" x-cloak>
                        <div class="h-2.5 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div class="h-2.5 rounded-full bg-blue-600" :style="'width: ' + progress + '%'"></div>
                        </div>
                        <div class="mt-2" x-cloak>Uploading...</div>
                    </div>
                    @if ($uploaded)
                        <div class="font-medium text-primary-color">
                            File upload completed!
                        </div>
                        <div class="mt-2 flex w-full items-center justify-center">
                            <div wire:click='uploadPdfFileBox'
                                class="w-fit cursor-pointer rounded-md bg-blue-800 px-4 py-1 align-middle text-white duration-300 hover:bg-primary-color">
                                Close</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if ($is_Success)
        <div
            class="fixed inset-0 z-50 flex h-screen w-screen items-center justify-center bg-gray-600 bg-opacity-25 backdrop-blur-sm">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="flex w-full flex-col items-center rounded-md bg-white p-4 md:w-[40%] lg:w-[30%]">
                    <h1 class="text-center text-xl font-semibold text-primary-color">File is uploaded</h1>
                    <p
                        class="mx-4 my-2 rounded-md border border-blue-400 bg-blue-100 p-1 text-sm font-light md:mx-6 lg:mx-8">
                        Admin will
                        review
                        your uploaded documents, you may return back to
                        your profile now.</p>
                    <a href="{{ route('edit-profile', ['activeTab' => 'tab4']) }}"
                        class="mt-2 rounded-md bg-blue-800 px-2 py-1 font-medium text-white duration-300 ease-in-out hover:bg-primary-color">Return
                        to profile</a>
                </div>
            </div>
        </div>
    @endif


    <div class="container">
        <div class="md:px-6">
            <section class="my-3 flex h-max w-full overflow-y-auto rounded-lg bg-white drop-shadow-lg">
                <form class="flex w-full flex-col" wire:submit='uploadDocument' action="">
                    <section
                        class="w-full gap-1 border-b border-gray-400 text-xs text-gray-600 md:justify-between md:text-sm">
                        <div class="flex justify-between px-8">
                            <div
                                class="{{ $currentTab == 1 ? 'text-primary-color font-bold border-b-2 border-primary-color ' : '' }} flex items-center py-3">
                                <p
                                    class="{{ $currentTab == 1 ? 'bg-primary-color   ' : '' }} flex h-4 w-4 items-center justify-center rounded-full bg-gray-600 text-xs text-white">
                                    1
                                </p>
                                <p class="ml-2">About Document</p>
                            </div>
                            <div
                                class="py-3{{ $currentTab == 2 ? 'text-primary-color font-bold border-b-2 border-primary-color ' : '' }} flex items-center">
                                <p
                                    class="{{ $currentTab == 2 ? 'bg-primary-color' : '' }} flex h-4 w-4 items-center justify-center rounded-full bg-gray-600 text-xs text-white">
                                    2
                                </p>
                                <p class="ml-2">Finalization</p>
                            </div>
                            <div
                                class="py-3{{ $currentTab == 3 ? 'text-primary-color font-bold border-b-2 border-primary-color ' : '' }} flex items-center">
                                <p
                                    class="{{ $currentTab == 3 ? 'bg-primary-color' : '' }} flex h-4 w-4 items-center justify-center rounded-full bg-gray-600 text-xs text-white">
                                    3
                                </p>
                                <p class="ml-2">Preview</p>
                            </div>
                        </div>
                    </section>

                    <div class="px-8 py-2">
                        @if ($currentTab === 1)
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
                                        <x-input-field wire:model.live="title" id="title"
                                            placeholder="Title of your work" />
                                        @error('title')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="flex w-full flex-col gap-2 md:mt-2 md:flex-row md:gap-4">
                                        <div class="flex flex-col md:w-1/2">
                                            <x-label-input for='bachelor_degree'>Bachelor Degree</x-label-input>
                                            <x-input-field type="text" wire:model.live="bachelor_degree_value"
                                                placeholder="{{ auth()->user()->is_admin ? 'Degree name' : '' }}"
                                                id="bachelor_degree" :disabled="!auth()->user()->is_admin" />
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
                                                <x-input-field type="date" wire:model.live="date_of_approval"
                                                    id="date_of_approval" />
                                                @error('date_of_approval')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="flex flex-col md:w-1/2">
                                                <x-label-input for='format'>Format</x-label-input>
                                                <x-input-field type="text" wire:model.live="format" id="format"
                                                    placeholder="Eg. Electronic" />
                                                @error('format')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex w-full flex-col gap-2 md:flex-row md:gap-4 lg:w-1/2">
                                            <div class="flex flex-col md:w-1/2">
                                                <x-label-input for='physical_description'>Physical
                                                    Description</x-label-input>
                                                <x-input-field type="text" wire:model.live="physical_description"
                                                    placeholder="189 pages" id="physical_description" />
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
                                            <x-input-field type="text" wire:model.live="panel_chair"
                                                id="panel_chair" placeholder="Name of panel chairperson" />
                                            @error('panel_chair')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col md:w-1/2">
                                            <x-label-input for="advisor">
                                                Advisor</x-label-input>
                                            <x-input-field type="text" wire:model.live="advisor" id="advisor"
                                                placeholder="English" placeholder="Name of your advisor" />
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
                                                <x-input-field type="text" wire:model.live="panel_member1"
                                                    id="panel_member" placeholder="Defense panel member 1"
                                                    placeholder="Panel member 1" />
                                                @error('panel_member1')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="w-full">
                                                <x-input-field type="text" wire:model.live="panel_member2"
                                                    id="panel_member" placeholder="Defense panel member 2"
                                                    placeholder="Panel member 2" />
                                                @error('panel_member2')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-2 md:flex-row md:gap-4">
                                            <div class="w-full">
                                                <x-input-field type="text" wire:model.live="panel_member3"
                                                    id="panel_member" placeholder="Defense panel member 3"
                                                    placeholder="Panel member 3" />
                                                @error('panel_member3')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="w-full">
                                                <x-input-field type="text" wire:model.live="panel_member4"
                                                    id="panel_member" placeholder="Defense panel member 4"
                                                    placeholder="Panel member 4" />
                                                @error('panel_member4')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </section>

                            </div>
                        @elseif ($currentTab === 2)
                            <div class="text-gray-700">
                                <h1
                                    class="flex flex-col text-center text-base font-bold text-primary-color md:text-xl">
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
                            </div>
                            <section class="mt-2 flex w-full flex-col gap-3">
                                <div class="flex w-full flex-col gap-3 lg:flex-row">
                                    <div class="w-full lg:w-1/2">
                                        <div class="flex w-full flex-col">
                                            <x-label-input for="abstract_or_summary">
                                                Abstract/ Summary</x-label-input>
                                            <textarea class="rounded-md border border-gray-400 p-2 text-sm" type="text" wire:model.live="abstract_or_summary"
                                                rows="25" id="abstract_or_summary" placeholder="abstract_or_summary of your work"></textarea>
                                            @error('abstract_or_summary')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex w-full flex-col gap-2 md:gap-4 lg:w-1/2">
                                        <div class="flex w-full flex-col gap-3">
                                            <x-label-input for="authors">
                                                Author/s</x-label-input>
                                            <div class="">
                                                <x-input-field type="text" wire:model.live="author1"
                                                    id="authors" placeholder="authors of your work"
                                                    :disabled='!auth()->user()->is_admin' />
                                                @error('author1')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="">
                                                <x-input-field type="text" wire:model.live="author2"
                                                    id="authors" placeholder="authors of your work" />
                                                @error('author2')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="">
                                                <x-input-field type="text" wire:model.live="author3"
                                                    id="authors" placeholder="authors of your work" />
                                                @error('author3')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="">
                                                <x-input-field type="text" wire:model.live="author4"
                                                    id="authors" placeholder="authors of your work" />
                                                @error('author4')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex w-full flex-col gap-2">
                                            <x-label-input class="text-sm font-semibold" for="keywords">
                                                Keywords/s</x-label-input>
                                            <small class="text-gray-500">Adding keywords or tags is important to help
                                                others
                                                discover your research easily. 🔍 Keywords act like labels, summarizing
                                                what
                                                your
                                                document is about. 🏷️ They make it simpler for researchers and readers
                                                to
                                                find
                                                content related to specific topics. 📚 Think of them as the key 🔑 to
                                                unlocking
                                                your
                                                research's visibility and making it accessible to a wider
                                                audience.</small>
                                            <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-3">
                                                <div class="">
                                                    <x-input-field type="text" wire:model.live="keyword1"
                                                        id="keywords" placeholder="Keyword 1 required" />
                                                    @error('keyword1')
                                                        <small class="text-red-500">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="">
                                                    <x-input-field type="text" wire:model.live="keyword2"
                                                        id="keywords" placeholder="Keyword 2 required" />
                                                    @error('keyword2')
                                                        <small class="text-red-500">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="">
                                                    <x-input-field type="text" wire:model.live="keyword3"
                                                        id="keywords" placeholder="Keyword 3 required" />
                                                    @error('keyword3')
                                                        <small class="text-red-500">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="">
                                                    <x-input-field type="text" wire:model.live="keyword4"
                                                        id="keywords" placeholder="Keyword 4 required" />
                                                    @error('keyword4')
                                                        <small class="text-red-500">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="">
                                                    <x-input-field type="text" wire:model.live="keyword5"
                                                        id="keywords" placeholder="Keyword 5 required" />
                                                    @error('keyword5')
                                                        <small class="text-red-500">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="">
                                                    <x-input-field type="text" wire:model.live="keyword6"
                                                        id="keywords" placeholder="Keyword 6 required" />
                                                    @error('keyword6')
                                                        <small class="text-red-500">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="">
                                                    <x-input-field type="text" wire:model.live="keyword7"
                                                        id="keywords" placeholder="Keyword 7 optional" />
                                                    @error('keyword7')
                                                        <small class="text-red-500">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="">
                                                    <x-input-field type="text" wire:model.live="keyword8"
                                                        id="keywords" placeholder="Keyword 8 optional" />
                                                    @error('keyword8')
                                                        <small class="text-red-500">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <x-label-input for="recommended_citation">
                                        Recommended citation</x-label-input>
                                    <small class="text-gray-600">This is auto generated based on the collected data
                                        from
                                        your
                                        inputs. You can change it to your desire recommended citation, but highly
                                        require to
                                        use
                                        proper bibliography format.</small>
                                    <div class="flex w-full gap-2">
                                        <button wire:click.prevent="citationAPA_generator"
                                            class="w-fit rounded-md bg-blue-700 px-3 py-1 text-white duration-300 hover:bg-primary-color">Generate</button>
                                        <div class="w-[30%] leading-tight text-gray-500"><small> Click the generate
                                                button to
                                                generate a APA Citation of your document. </small></div>
                                    </div>
                                    <textarea class="resize-none rounded-md border border-gray-400 p-2 text-sm md:resize-y lg:resize-none"
                                        wire:model.live="recommended_citation" rows="6" id="recommended_citation"></textarea>
                                    @error('recommended_citation')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </section>
                        @elseif ($currentTab === 3)
                            <div class="text-gray-700">
                                <p class="text-center text-xs text-gray-600">Please verify the entered information for
                                    accuracy. If any
                                    errors are
                                    found, please use the
                                    'Back' button to make corrections. If the information is correct, you may proceed by
                                    clicking
                                    'Submit'. Thank you.</p>
                            </div>
                            <section class="grid grid-cols-4 gap-3 text-primary-color">
                                <div class="col-span-4">
                                    <h2 class="font-extrabold uppercase">Title</h2>
                                    <p class="break-words text-sm font-semibold text-gray-600">{{ $title }}</p>
                                </div>
                                <div class="col-span-4 flex w-full flex-col gap-2 lg:col-span-3">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="col-span-1">
                                            <h2 class="font-extrabold uppercase">Document type</h2>
                                            <p class="text-sm font-semibold text-gray-600">{{ $document_type }}</p>
                                        </div>
                                        <div class="col-span-1">
                                            <h2 class="font-extrabold uppercase">Format</h2>
                                            <p class="text-sm font-semibold text-gray-600">{{ $format }}</p>
                                        </div>
                                        <div class="col-span-1">
                                            <h2 class="font-extrabold uppercase">Langauge</h2>
                                            <p class="text-sm font-semibold text-gray-600">{{ $language }}</p>
                                        </div>
                                        <div class="col-span-1">
                                            <h2 class="font-extrabold uppercase">Date of publication</h2>
                                            <p class="text-sm font-semibold text-gray-600">{{ $date_of_approval }}</p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="col-span-2 md:col-span-1">
                                            <h2 class="font-extrabold uppercase">Keywords/ Tags</h2>
                                            <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $keyword1 }}</span>
                                                </div>
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $keyword2 }}</span>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $keyword3 }}</span>
                                                </div>
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $keyword4 }}</span>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $keyword5 }}</span>
                                                </div>
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $keyword6 }}</span>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $keyword7 }}</span>
                                                </div>
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $keyword8 }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-2 md:col-span-1">
                                            <h2 class="font-extrabold uppercase">Degree name</h2>
                                            <p class="text-sm font-semibold text-gray-600">
                                                {{ $bachelor_degree_value }}
                                            </p>
                                        </div>
                                        <div class="col-span-2">
                                            <h2 class="font-extrabold uppercase">Recommended citation</h2>
                                            <p class="break-words text-sm font-semibold text-gray-600">
                                                {{ $recommended_citation }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="font-extrabold uppercase">Abstract/ summary</h2>
                                        <p class="break-words text-sm font-semibold text-gray-600">
                                            {{ $abstract_or_summary }}</p>
                                    </div>
                                </div>
                                <div class="col-span-4 text-primary-color lg:col-span-1">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="col-span-2">
                                            <h2 class="font-extrabold uppercase">Author/ s</h2>
                                            <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $author1 }}</span>
                                                </div>
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $author2 }}</span>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $author3 }}</span>
                                                </div>
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $author4 }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-1 md:col-span-2">
                                            <h2 class="font-extrabold uppercase">Advisor</h2>
                                            <p class="text-sm font-semibold text-gray-600">{{ $advisor }}</p>
                                        </div>
                                        <div class="col-span-1 md:col-span-2">
                                            <h2 class="font-extrabold uppercase">Defense panel chair</h2>
                                            <p class="text-sm font-semibold text-gray-600">{{ $panel_chair }}</p>
                                        </div>
                                        <div class="col-span-2">
                                            <h2 class="font-extrabold uppercase">Defense panel member</h2>
                                            <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $panel_member1 }}</span>
                                                </div>
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $panel_member2 }}</span>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $panel_member3 }}</span>
                                                </div>
                                                <div class="col-span-1 gap-1 lg:col-span-2">
                                                    <span
                                                        class="font-semibold text-gray-600">{{ $panel_member4 }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-2 flex flex-col gap-1">
                                            <h2 class="font-extrabold uppercase">Upload your file
                                                here</h2>
                                            <div wire:click='uploadPdfFileBox'
                                                class="w-full rounded-lg bg-primary-color px-1 py-2 text-center text-white hover:cursor-pointer">
                                                Upload
                                            </div>
                                            @error('user_upload')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                            {{-- <label for="uploadFile"
                                            class="w-full rounded-lg bg-primary-color px-1 py-2 text-center text-white hover:cursor-pointer">Upload
                                            <input type="file" wire:model.live="user_upload" id="uploadFile"
                                                class="" hidden accept="application/pdf">
                                        </label>
                                        <small class="text-gray-600">Please be guided, the required file should be in
                                            PDF format.</small>
                                        <div>
                                            @error('user_upload')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif
                    </div>

                    <div class="flex justify-end gap-2 px-8 py-4">
                        @if ($currentTab == 1)
                            <a href="{{ route('edit-profile', 'tab4') }}"
                                class="lg:1/12 w-1/2 rounded-md border border-gray-700 p-1 text-center duration-300 ease-in-out hover:bg-gray-600 hover:text-white md:w-1/4"
                                type="button" wire:click="changeTab({{ intval($currentTab) - 1 }})">Cancel</a>
                        @else
                            <button
                                class="lg:1/12 w-1/2 rounded-md border border-gray-700 p-1 duration-300 ease-in-out hover:bg-gray-600 hover:text-white md:w-1/4"
                                type="button"
                                wire:click="changeTab({{ intval($currentTab) - 1 }})">Previous</button>
                        @endif
                        @php
                            $errorsTab1 = $errors->has('title') || $errors->has('format') || $errors->has('document_type') || $errors->has('language') || $errors->has('panel_chair') || $errors->has('advisor') || $errors->has('panel_member1') || $errors->has('panel_member2') || $errors->has('panel_member3') || $errors->has('panel_member4');

                            $errorsTab2 = $errors->has('abstract_or_summary') || $errors->has('keyword1') || $errors->has('keyword2') || $errors->has('keyword3') || $errors->has('keyword4') || $errors->has('keyword5') || $errors->has('keyword6') || $errors->has('recommended_citation');

                            $errorsTab3 = $errors->has('user_upload');

                        @endphp
                        @if ($currentTab < 3)
                            <button
                                class="{{ $errorsTab1 || $errorsTab2 || $errorsTab3 ? 'bg-blue-500 ' : 'hover:bg-blue-900 bg-blue-700 w-1/2  duration-300 ease-in-out' }} lg:1/12 rounded-md p-1 text-white md:w-1/4"
                                type="button" @if (($currentTab === 1 && $errorsTab1) || ($currentTab === 2 && $errorsTab2) || ($currentTab === 3 && $errorsTab3)) disabled @endif
                                wire:click="changeTab({{ intval($currentTab) + 1 }})">
                                Next
                            </button>
                        @else
                            <button wire:loading.attr="disabled"
                                class="{{ $errorsTab1 && $errorsTab12 && $errorsTab3 ? '' : 'hover:bg-blue-500 w-1/2  duration-300 ease-in-out' }} lg:1/12 rounded-md bg-blue-800 p-1 text-white md:w-1/4"
                                type="Submit" @if ($errorsTab1 && $errorsTab2 && $errorsTab3) disabled @endif>
                                Submit
                            </button>
                        @endif
                    </div>
                </form>
            </section>
        </div>
    </div>

</div>
