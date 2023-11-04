  <div x-data="{ report: false }" x-show="report" x-on:open-rep.window = "report = true"
      x-on:close-rep.window = "report = false" x-on:keydown.escape.window = "report = false; $wire.closeReportBox()"
      x-transition:enter.duration.400ms x-transition:leave.duration.300ms
      class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
      style="display: none">
      <div class="container h-full md:w-[40%]">
          @if (isset($reportingCommentData))
              <section x-data="{ selectedStatus: @entangle('reportReason') }"
                  class="relative mr-0.5 mt-[7rem] flex h-[70%] w-full flex-col gap-2 rounded-lg bg-white drop-shadow-xl">
                  <div class="custom-scrollbar h-full overflow-y-auto px-6">
                      <div
                          class="sticky -top-1 right-0 -mx-6 -my-5 flex flex-col items-end gap-1 rounded-t-lg bg-white bg-opacity-25 px-6 py-4 backdrop-blur-md">
                          <strong class="flex w-full items-center justify-center text-primary-color">Report
                              Comment</strong>
                          <p
                              class="rounded-lg bg-gray-300 bg-opacity-25 p-1 text-sm font-medium text-gray-700 backdrop-blur">
                              You're about to report
                              <strong> Elmer</strong> 's comment
                              <i> "ang gwapo
                                  mo".</i>
                          </p>
                      </div>

                      <div class="mt-6 flex flex-col gap-2 py-4">
                          <div>
                              <label class="inline-flex items-center">
                                  <input type="radio" id="report-radio-spam" wire:model="reportReason" value="spam"
                                      class="form-radio accent-blue-900" />
                                  <span class="ml-2 font-bold text-gray-700">Spam</span>
                              </label>
                              <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                                  We don't allow things like: Encouraging people to engage with content under false
                                  pretenses.
                              </p>
                          </div>
                          <div>
                              <label class="inline-flex items-center">
                                  <input type="radio" id="report-radio-nudity" wire:model="reportReason"
                                      value="nudity" class="form-radio accent-blue-900" />
                                  <span class="ml-2 font-bold text-gray-700">Nudity</span>
                              </label>
                              <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                                  We only allow comments that go against our community standards. We don't allow things
                                  like: Offering or requesting sexual content or activity.
                              </p>
                          </div>
                          <div>
                              <label class="inline-flex items-center">
                                  <input type="radio" id="report-radio-violence" wire:model="reportReason"
                                      value="violence" class="form-radio accent-blue-900" />
                                  <span class="ml-2 font-bold text-gray-700">Violence</span>
                              </label>
                              <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                                  We do not permit comments that promote or glorify violence.
                              </p>
                          </div>
                          <div>
                              <label class="inline-flex items-center">
                                  <input type="radio" id="report-radio-false-information" wire:model="reportReason"
                                      value="false_information" class="form-radio accent-blue-900" />
                                  <span class="ml-2 font-bold text-gray-700">False Information in Comment</span>
                              </label>
                              <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                                  Comments containing false or misleading information that could harm others or spread
                                  misinformation are not allowed.
                              </p>
                          </div>
                          <div>
                              <label class="inline-flex items-center">
                                  <input type="radio" id="report-radio-hate-speech" wire:model="reportReason"
                                      value="hate_speech" class="form-radio accent-blue-900" />
                                  <span class="ml-2 font-bold text-gray-700">Hate Speech</span>
                              </label>
                              <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                                  Comments that promote hate speech, discrimination, or harm based on factors like race,
                                  religion, gender, or other protected categories are not tolerated.
                              </p>
                          </div>
                          <div>
                              <label class="inline-flex items-center">
                                  <input type="radio" id="report-radio-inappropriate" wire:model="reportReason"
                                      value="inappropriate" class="form-radio accent-blue-900" />
                                  <span class="ml-2 font-bold text-gray-700">Inappropriate</span>
                              </label>
                              <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                                  Inappropriate comments that do not adhere to our content guidelines are against our
                                  policies.
                              </p>
                          </div>
                          <div class="mb-6">
                              <label class="inline-flex items-center">
                                  <input type="radio" id="report-radio-other" href='otherTextArea'
                                      wire:model="reportReason" value="other" class="form-radio accent-blue-900" />
                                  <span class="ml-2 font-bold text-gray-700">Other</span>
                              </label>
                              <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                                  For any other report reasons or issues that do not fit the categories mentioned above,
                                  please select "Other" and provide additional details in the report below.
                              </p>
                              <div x-show="selectedStatus === 'other'"
                                  x-transition:enter="transition ease-out duration-300"
                                  x-transition:enter-start="opacity-0 transform scale-95"
                                  x-transition:enter-end="opacity-100 transform scale-100"
                                  x-transition:leave="transition ease-in duration-200"
                                  x-transition:leave-start="opacity-100 transform scale-100"
                                  x-transition:leave-end="opacity-0 transform scale-95" class="flex flex-col gap-1">
                                  <x-label-input for="otherTextArea" class="mr-1">Add you reason
                                      below.</x-label-input>
                                  <textarea
                                      class="w-full resize-none rounded-md border border-gray-400 p-2 text-sm focus:outline-blue-950 md:resize-y lg:resize-none"
                                      wire:model.live="report_other_context" rows="4" placeholder="Tell us the reason of reporting this comment."
                                      id="otherTextArea"></textarea>
                                  @error('report_other_context')
                                      <small class="text-red-500">{{ $message }}</small>
                                  @enderror
                              </div>
                          </div>

                      </div>

                      <div
                          class="sticky bottom-0 right-0 -mx-6 -my-5 flex justify-end gap-2 rounded-b-lg bg-white bg-opacity-25 p-2 backdrop-blur-md">
                          <button type="submit" wire:click='closeReportBox'
                              class="rounded border border-red-500 px-4 py-2 text-red-800 duration-500 ease-linear hover:bg-red-600 hover:text-white">Cancel</button>
                          <button wire:click.prevent='createReportComment'
                              class="rounded bg-indigo-500 px-4 py-2 text-white duration-500 ease-linear hover:bg-indigo-900">Submit
                              Report</button>
                      </div>
                  </div>
              </section>
          @endif
      </div>
  </div>
