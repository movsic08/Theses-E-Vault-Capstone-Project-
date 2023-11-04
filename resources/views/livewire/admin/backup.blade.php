  <div x-data="{ report: true }" x-show="report" x-on:open-rep.window = "report = true"
      x-on:close-rep.window = "report = false" x-on:keydown.escape.window = "report = false"
      x-transition:enter.duration.400ms x-transition:leave.duration.300ms
      class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm"
      style="display: none">
      <div class="container h-full md:w-[40%]">
          <section
              class="custom-scrollbar relative mt-[7rem] flex h-[70%] w-full flex-col gap-2 overflow-y-auto rounded-lg bg-white px-6 py-4 drop-shadow-xl">
              <div class="mb-4">
                  <strong class="block text-primary-color">Report Comment</strong>
                  <div class="mt-2 flex flex-col gap-2">
                      <div>
                          <label class="inline-flex items-center">
                              <input type="radio" id="report-radio-spam" wire:model="reportReason" value="spam"
                                  class="form-radio accent-blue-900" />
                              <span class="ml-2 font-medium text-gray-700">Spam</span>
                          </label>
                          <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                              We don't allow things like: Encouraging people to engage with content under false
                              pretenses.
                          </p>
                      </div>
                      <div>
                          <label class="inline-flex items-center">
                              <input type="radio" id="report-radio-spam" wire:model="reportReason" value="spam"
                                  class="form-radio accent-blue-900" />
                              <span class="ml-2 font-medium text-gray-700">Nudity</span>
                          </label>
                          <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                              We only allow comments that go against our community standards. We don't allow things
                              like: Offering or requesting sexual content or activity.
                          </p>
                      </div>
                      <div>
                          <label class="inline-flex items-center">
                              <input type="radio" id="report-radio-spam" wire:model="reportReason" value="spam"
                                  class="form-radio accent-blue-900" />
                              <span class="ml-2 font-medium text-gray-700">Violence</span>
                          </label>
                          <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                              We do not permit comments that promote or glorify violence.
                          </p>
                      </div>
                      <div>
                          <label class="inline-flex items-center">
                              <input type="radio" id="report-radio-spam" wire:model="reportReason" value="spam"
                                  class="form-radio accent-blue-900" />
                              <span class="ml-2 font-medium text-gray-700">False Information in Comment</span>
                          </label>
                          <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                              Comments containing false or misleading information that could harm others or spread
                              misinformation are not allowed.
                          </p>
                      </div>
                      <div>
                          <label class="inline-flex items-center">
                              <input type="radio" id="report-radio-spam" wire:model="reportReason" value="spam"
                                  class="form-radio accent-blue-900" />
                              <span class="ml-2 font-medium text-gray-700">Hate Speech</span>
                          </label>
                          <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                              Comments that promote hate speech, discrimination, or harm based on factors like race,
                              religion, gender, or other protected categories are not tolerated.
                          </p>
                      </div>
                      <div>
                          <label class="inline-flex items-center">
                              <input type="radio" id="report-radio-spam" wire:model="reportReason" value="spam"
                                  class="form-radio accent-blue-900" />
                              <span class="ml-2 font-medium text-gray-700">Inappropriate</span>
                          </label>
                          <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                              Inappropriate comments that do not adhere to our content guidelines are against our
                              policies.
                          </p>
                      </div>
                      <div>
                          <label class="inline-flex items-center">
                              <input type="radio" id="report-radio-spam" wire:model="reportReason" value="spam"
                                  class="form-radio accent-blue-900" />
                              <span class="ml-2 font-medium text-gray-700">Other </span>
                          </label>
                          <p class="ml-5 rounded-md bg-gray-50 p-1 text-sm text-gray-600">
                              For any other report reasons or issues that do not fit the categories mentioned above,
                              please select "Other" and provide additional details in the report.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="sticky bottom-0 right-0 bg-red-800">
                  <button type="submit" class="rounded bg-indigo-500 px-4 py-2 text-white hover:bg-indigo-600">Submit
                      Report</button>
              </div>

          </section>
      </div>
  </div>
