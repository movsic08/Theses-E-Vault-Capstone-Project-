<x-app-layout>
    <section class="container flex flex-col items-center">
        <div class="rounded-md bg-white p-4">
            <form class="flex flex-col gap-2" action="{{ route('sendOtp') }}" method="POST">
                @csrf

                <label for="email">Enter your email</label>
                <input class="bg-gray-400 p-2" type="email" name="email" id="email"
                    value="{{ auth()->user()->email }}">
                <input class="rounded bg-blue-400 p-2" type="submit" value="submit">
                @error('email')
                    <small class="text-red-600"> {{ $message }}</small>
                @enderror
            </form>

        </div>
    </section>
</x-app-layout>
