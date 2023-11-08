  <div class="fixed right-0 top-0 z-30 flex h-screen w-screen items-center justify-center bg-gray-300 bg-opacity-25 backdrop-blur-sm lg:items-start"
      x-data="{ success: false }" x-show="success" x-on:open-del.window = "success = true"
      x-on:close-del.window = "success = false" x-on:keydown.escape.window = "success = false"
      x-transition:enter.duration.400ms x-transition:leave.duration.300ms style="display: none">
      <div class="mx-auto md:flex md:items-center md:justify-center">
          <section
              class="flex h-fit w-[30rem] flex-col items-center gap-3 rounded-lg bg-white px-6 py-6 drop-shadow-xl md:mt-32">
              <strong class="text-xl text-primary-color">Password changed success.</strong>
              <small class="rounded-lg bg-green-100 text-center text-sm text-green-800">Password Successfully Updated:
                  You have
                  successfully
                  reset your password. Your account is now secure, and you can continue to access our services with your
                  new credentials. If you have any further questions or need assistance, please don't hesitate to
                  contact our support team. Thank you for choosing our platform.</small>

              <a href="{{ route('login') }}"
                  class="w-fit cursor-pointer rounded-md bg-blue-500 p-2 font-medium text-white duration-300 hover:bg-blue-800">Login
                  now</a>
          </section>
      </div>
  </div>
