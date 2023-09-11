<div class="">
    @if ($showProgressBox)
        <div
            class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-600 bg-opacity-25 backdrop-blur-sm">
            <div class="mx-3 w-5/6 rounded-xl bg-white text-center text-gray-600 drop-shadow-lg md:w-3/6 lg:w-5/12">
                <div class="rounded-t-xl bg-primary-color px-10 py-3 font-semibold text-white">
                    <h1>Processing</h1>
                </div>
                <div class="flex flex-col gap-2 px-10 pb-8 pt-3">
                    <img class="h-10" src="{{ asset('icons/logo.svg') }}" alt="Icon Description">
                    <h3 class="text-xs md:text-base">Uploading is on the process, please wait. If the process is
                        completed, it will bring you back to your profile.</h3>
                    <div>
                        <div class="h-2.5 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div id="progress-bar" class="h-2.5 animate-pulse rounded-full bg-primary-color"
                                style="width: {{ $progressPercent }}%"></div>
                        </div>
                        <button wire:click="incrementProgress" class="text-white">Increment Progress</button>
                    </div>
                    @if ($is_Success)
                        <a href="{{ route('edit-profile', 'tab4') }}" wire:click="closeShowProgressBox"
                            class="rounded-md bg-primary-color p-2 text-white duration-300 ease-in hover:bg-blue-700">Close</a>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="container">
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
                            <h1 class="flex flex-col text-center font-bold text-primary-color">Enter basic information
                                about
                                your
                                work.
                                <small class="font-normal text-gray-400">Please fill in basic information so that the
                                    other
                                    users
                                    will know
                                    what your research
                                    about is.</small>
                            </h1>
                            <section class="flex flex-col gap-2">
                                <div class="flex w-full flex-col">
                                    <label class="text-sm font-semibold" for="title">
                                        Title</label>
                                    <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                        wire:model.live="title" id="title" placeholder="Title of your work" />
                                    @error('title')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="flex w-full flex-col md:flex-row md:gap-2">
                                    <div class="flex flex-col md:w-1/2">
                                        <label class="text-sm font-semibold" for="bachelor_degree">
                                            Bachelor degree</label>
                                        <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                            wire:model.live="bachelor_degree_value" id="bachelor_degree"
                                            {{ auth()->user()->is_admin ? '' : 'disabled' }}
                                            placeholder="{{ auth()->user()->is_admin ? 'Degree name' : '' }}" />
                                        @error('bachelor_degree_value')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col md:w-1/2">
                                        <label class="text-sm font-semibold" for="document_type">
                                            Document type</label>
                                        <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                            wire:model.live="document_type" id="document_type" placeholder="English" />
                                        @error('document_type')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex w-full flex-col lg:flex-row lg:gap-2">
                                    <div class="flex w-full flex-col md:flex-row md:gap-2 lg:w-1/2">
                                        <div class="flex flex-col md:w-1/2">
                                            <label class="text-sm font-semibold" for="date_of_approval">
                                                Date of approval</label>
                                            <input class="rounded-md border border-gray-400 p-2 text-sm" type="date"
                                                wire:model.live="date_of_approval" id="date_of_approval" />
                                            @error('date_of_approval')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col md:w-1/2">
                                            <label class="text-sm font-semibold" for="format">
                                                Format</label>
                                            <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                                wire:model.live="format" id="format" placeholder="Eg. Electronic" />
                                            @error('format')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex w-full flex-col md:flex-row md:gap-2 lg:w-1/2">
                                        <div class="flex flex-col md:w-1/2">
                                            <label class="text-sm font-semibold" for="physical_description">
                                                Physical description</label>
                                            <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                                wire:model.live="physical_description" placeholder="189 pages"
                                                id="physical_description" />
                                            @error('physical_description')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col md:w-1/2">
                                            <label class="text-sm font-semibold" for="language">
                                                Language</label>
                                            <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                                wire:model.live="language" id="language" placeholder="English" />
                                            @error('language')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="flex w-full flex-col md:flex-row md:gap-2">
                                    <div class="flex flex-col md:w-1/2">
                                        <label class="text-sm font-semibold" for="panel_chair">
                                            Defense panel chair</label>
                                        <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                            wire:model.live="panel_chair" id="panel_chair"
                                            placeholder="Name of panel chairperson" />
                                        @error('panel_chair')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col md:w-1/2">
                                        <label class="text-sm font-semibold" for="advisor">
                                            Advisor</label>
                                        <input class="rounded-md border border-gray-400 p-2 text-sm" type="text"
                                            wire:model.live="advisor" id="advisor" placeholder="English"
                                            placeholder="Name of your advisor" />
                                        @error('advisor')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex w-full flex-col gap-2">
                                    <label class="text-sm font-semibold" for="panel_member">
                                        Defense panel member</label>
                                    <div class="flex flex-col gap-2 md:flex-row">
                                        <div class="w-full">
                                            <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                type="text" wire:model.live="panel_member1" id="panel_member"
                                                placeholder="Defense panel member 1" placeholder="Panel member 1" />
                                            @error('panel_member1')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                type="text" wire:model.live="panel_member2" id="panel_member"
                                                placeholder="Defense panel member 2" placeholder="Panel member 2" />
                                            @error('panel_member2')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-2 md:flex-row">
                                        <div class="w-full">
                                            <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                type="text" wire:model.live="panel_member3" id="panel_member"
                                                placeholder="Defense panel member 3" placeholder="Panel member 3" />
                                            @error('panel_member3')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                type="text" wire:model.live="panel_member4" id="panel_member"
                                                placeholder="Defense panel member 4" placeholder="Panel member 4" />
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
                            <h1 class="flex flex-col text-center font-bold text-primary-color">Enter basic information
                                about
                                your
                                work.
                                <small class="font-normal text-gray-400">Please fill in basic information so that the
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
                                        <label class="text-sm font-semibold" for="abstract_or_summary">
                                            Abstract/ Summary</label>
                                        <textarea class="rounded-md border border-gray-400 p-2 text-sm" type="text" wire:model.live="abstract_or_summary"
                                            rows="25" id="abstract_or_summary" placeholder="abstract_or_summary of your work"></textarea>
                                        @error('abstract_or_summary')
                                            <small class="text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex w-full flex-col gap-2 lg:w-1/2">
                                    <div class="flex w-full flex-col gap-2">
                                        <label class="text-sm font-semibold" for="authors">
                                            Author/s</label>
                                        <div class="">
                                            <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                type="text" wire:model.live="author1" id="authors"
                                                placeholder="authors of your work" disabled />
                                            @error('author1')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                type="text" wire:model.live="author2" id="authors"
                                                placeholder="authors of your work" />
                                            @error('author2')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                type="text" wire:model.live="author3" id="authors"
                                                placeholder="authors of your work" />
                                            @error('author3')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                type="text" wire:model.live="author4" id="authors"
                                                placeholder="authors of your work" />
                                            @error('author4')
                                                <small class="text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex w-full flex-col gap-2">
                                        <label class="text-sm font-semibold" for="keywords">
                                            Keywords/s</label>
                                        <small class="text-gray-500">Adding keywords or tags is important to help
                                            others
                                            discover your research easily. 🔍 Keywords act like labels, summarizing what
                                            your
                                            document is about. 🏷️ They make it simpler for researchers and readers to
                                            find
                                            content related to specific topics. 📚 Think of them as the key 🔑 to
                                            unlocking
                                            your
                                            research's visibility and making it accessible to a wider audience.</small>
                                        <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
                                            <div class="">
                                                <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                    type="text" wire:model.live="keyword1" id="keywords"
                                                    placeholder="Keyword 1 required" />
                                                @error('keyword1')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="">
                                                <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                    type="text" wire:model.live="keyword2" id="keywords"
                                                    placeholder="Keyword 2 required" />
                                                @error('keyword2')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="">
                                                <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                    type="text" wire:model.live="keyword3" id="keywords"
                                                    placeholder="Keyword 3 required" />
                                                @error('keyword3')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="">
                                                <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                    type="text" wire:model.live="keyword4" id="keywords"
                                                    placeholder="Keyword 4 required" />
                                                @error('keyword4')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="">
                                                <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                    type="text" wire:model.live="keyword5" id="keywords"
                                                    placeholder="Keyword 5 required" />
                                                @error('keyword5')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="">
                                                <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                    type="text" wire:model.live="keyword6" id="keywords"
                                                    placeholder="Keyword 6 required" />
                                                @error('keyword6')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="">
                                                <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                    type="text" wire:model.live="keyword7" id="keywords"
                                                    placeholder="Keyword 7 optional" />
                                                @error('keyword7')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="">
                                                <input class="w-full rounded-md border border-gray-400 p-2 text-sm"
                                                    type="text" wire:model.live="keyword8" id="keywords"
                                                    placeholder="Keyword 8 optional" />
                                                @error('keyword8')
                                                    <small class="text-red-500">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold" for="recommended_citation">
                                    Recommended citation</label>
                                <small class="text-gray-600">This is auto generated based on the collected data from
                                    your
                                    inputs. You can change it to your desire recommended citation, but highly require to
                                    use
                                    proper bibliography format.</small>
                                <button wire:click.prevent="citationAPA_generator">Generate</button>
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
                                                <span class="font-semibold text-gray-600">{{ $keyword1 }}</span>
                                            </div>
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $keyword2 }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $keyword3 }}</span>
                                            </div>
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $keyword4 }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $keyword5 }}</span>
                                            </div>
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $keyword6 }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $keyword7 }}</span>
                                            </div>
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $keyword8 }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2 md:col-span-1">
                                        <h2 class="font-extrabold uppercase">Degree name</h2>
                                        <p class="text-sm font-semibold text-gray-600">{{ $bachelor_degree_value }}
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
                                                <span class="font-semibold text-gray-600">{{ $author1 }}</span>
                                            </div>
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $author2 }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $author3 }}</span>
                                            </div>
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $author4 }}</span>
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
                                                <span class="font-semibold text-gray-600">{{ $panel_member1 }}</span>
                                            </div>
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $panel_member2 }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-2 lg:gap-0">
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $panel_member3 }}</span>
                                            </div>
                                            <div class="col-span-1 gap-1 lg:col-span-2">
                                                <span class="font-semibold text-gray-600">{{ $panel_member4 }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2 flex flex-col gap-1">
                                        <h2 class="font-extrabold uppercase">Upload your file
                                            here</h2>
                                        <label for="uploadFile"
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                </div>

                <div class="flex justify-end gap-2 px-8 py-4">
                    @if ($currentTab == 1)
                        <a href="{{ url()->previous() }}"
                            class="lg:1/12 w-1/2 rounded-md border border-gray-700 p-1 text-center duration-300 ease-in-out hover:bg-gray-600 hover:text-white md:w-1/4"
                            type="button" wire:click="changeTab({{ intval($currentTab) - 1 }})">Cancel</a>
                    @else
                        <button
                            class="lg:1/12 w-1/2 rounded-md border border-gray-700 p-1 duration-300 ease-in-out hover:bg-gray-600 hover:text-white md:w-1/4"
                            type="button" wire:click="changeTab({{ intval($currentTab) - 1 }})">Previous</button>
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
