<x-app-layout>
    <section class="container flex flex-col items-center">
        <div class="rounded-md bg-white p-4">
            @if (session('success'))
                <div class="z-50 p-2 text-red-500">
                    {{ session('success') }}
                </div>
            @endif

            <form class="flex flex-col gap-2" action="{{ route('verifyInputOTP') }}" method="POST">
                @csrf
                <label for="email">Email</label>
                <input class="bg-gray-400 p-2" type="email" name="email" id="email" disabled
                    value="{{ $requestedOTP->email }}">
                <input class="bg-gray-400 p-2" type="" name="id" id="" disabled
                    value="{{ $requestedOTP->id }}" x>
                <input class="bg-gray-400 p-2" type="email" name="email" id="email" disabled
                    value="{{ $requestedOTP->user_id }}">
                <input name="otp">{{ $requestedOTP->otp }}</input>
                <input class="rounded bg-blue-400 p-2" type="submit" value="submit">
                <label for="otp_input">Enter otp here</label>
                <input class="bg-gray-400 p-2" type="text" name="otp_input" id="otp_input">
                @error('otp')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </form>
        </div>
    </section>
</x-app-layout>
