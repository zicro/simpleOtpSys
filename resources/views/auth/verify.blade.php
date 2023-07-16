<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

@if(Session::has('error'))

<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" style="color: red" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">{{ Session::get('error') }}.</span>
    
  </div>
@endif

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your OTP Code before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('verify.store') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="code" :value="__('The 4 Digit Code')" />

                <x-input id="code" class="block mt-1 w-full" maxlength="4"
                                type="text"
                                name="code"
                                required/>
               
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
