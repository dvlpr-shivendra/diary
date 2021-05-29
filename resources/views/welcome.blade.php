<x-guest-layout>
    <div class="flex items-center absolute top-0 h-16 w-screen bg-black bg-opacity-30 px-4 md:px-8 lg:px-16 justify-between">
        <a href="/" class="text-white lg:text-black font-bold">
            <x-application-logo class="w-20 h-20" />
        </a>

        <a class="text-white border-2 px-4 py-1 rounded text-sm" href="{{ route('login') }}">{{ __('login') }}</a>
    </div>
    <div class="flex flex-col-reverse lg:flex-row justify-center h-screen">
        <div class="flex flex-col justify-center p-10 md:p-15 lg:p-20 h-2/3 md:h-3/6 lg:w-6/12 lg:h-full">
            <h1 class="text-5xl text-green-800 font-semibold mb-5">What went today?</h1>

            <p class="mb-6 text-xl">Your life is a unique story. Write it down in your diary. Start now be clicking the
                button given below.</p>

            <div>
                <a class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded"
                    href="{{ route('register') }}">
                    Start writing
                </a>
            </div>
        </div>
        <div class="h-3/6 lg:w-1/2 lg:h-full"
            style="background: url(https://images.unsplash.com/photo-1579017308347-e53e0d2fc5e9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80) no-repeat center center / cover;">
        </div>
    </div>
</x-guest-layout>
