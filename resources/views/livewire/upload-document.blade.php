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
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('livewire.partials.uploadDocumentPartials.upload-pdf-box')
    @include('livewire.partials.uploadDocumentPartials.upload-pdf-success')


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
                            @include('livewire.partials.uploadDocumentPartials.about-document-tab')
                        @elseif ($currentTab === 2)
                            @include('livewire.partials.uploadDocumentPartials.finalization-tab')
                        @elseif ($currentTab === 3)
                            @include('livewire.partials.uploadDocumentPartials.preview-tab')
                        @endif
                    </div>

                    <div class="relative flex justify-end gap-2 px-8 py-4">
                        <div wire:loading wire:target='changeTab, uploadDocument'
                            class="mt-2 h-4 w-4 animate-spin rounded-full border-4 border-solid border-primary-color border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                            role="status">
                            <span
                                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                        </div>
                        @if ($currentTab == 1)
                            <a href="{{ route('edit-profile', 'tab4') }}"
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
                                class="{{ $errorsTab1 && $errorsTab2 && $errorsTab3 ? '' : 'hover:bg-blue-500 w-1/2  duration-300 ease-in-out' }} lg:1/12 rounded-md bg-blue-800 p-1 text-white md:w-1/4"
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
