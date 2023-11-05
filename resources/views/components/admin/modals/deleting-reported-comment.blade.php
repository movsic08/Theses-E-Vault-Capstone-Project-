  <div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm lg:items-start"
      x-data="{ del: false }" x-del="del" x-on:open-del.window = "del = true" x-on:close-del.window = "del = false"
      x-on:keydown.escape.window = "del = false" x-transition:enter.duration.400ms x-transition:leave.duration.300ms
      style="display: none">
      <div class="mx-auto md:flex md:items-center lg:justify-center">
          <section
              class="h-fit w-[20rem] rounded-lg bg-slate-50 px-6 py-4 drop-shadow-xl md:w-[35rem] lg:mt-32 2xl:w-big">
              <strong class="flex w-full items-center justify-center rounded-t-lg text-white">Are you sure you want to
                  delete this report?</strong>


              <div class="flex w-full flex-col gap-2 md:flex-row md:justify-end">
                  <button
                      class="w-full rounded-md border border-red-500 bg-white p-2 text-red-500 duration-500 ease-in-out hover:bg-red-800 hover:text-white md:w-[6rem]">Close</button>
                  <button
                      class="w-full rounded-md bg-yellow-500 p-2 text-white duration-500 ease-in-out hover:bg-yellow-800 md:w-[6rem]">Resolve</button>
              </div>
          </section>
      </div>
  </div>
