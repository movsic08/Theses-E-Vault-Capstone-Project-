  <div x-data="{ isSuccess: false }" x-show="isSuccess" x-on:open-suc.window="isSuccess = true"
      x-on:close-suc.window="isSuccess = false" x-transition:enter.duration.400ms x-transition:leave.duration.300ms
      class="fixed inset-0 z-50 flex items-start justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm dark:bg-opacity-0"
      style="display: none">

      <div
          class="mt-16 flex w-full flex-col items-center rounded-lg bg-white p-4 shadow-lg dark:bg-slate-700 md:w-[40%] lg:w-[30%]">
          <h1 class="text-center text-xl font-semibold uppercase text-primary-color dark:text-slate-100">File is uploaded
          </h1>
          <p
              class="mx-4 my-2 rounded-md border bg-blue-100 px-3 py-2 text-sm text-blue-800 dark:border-none dark:bg-slate-500 dark:text-slate-100 md:mx-6 lg:mx-8">
              Admin will
              review
              your uploaded documents, you may return back to
              your profile now.</p>
          <a href="{{ route('edit-profile', ['activeTab' => 'tab4']) }}"
              class="mt-2 rounded-md bg-blue-800 px-3 py-2 font-medium text-white duration-300 ease-in-out hover:bg-primary-color">Return
              to profile</a>
      </div>

  </div>
