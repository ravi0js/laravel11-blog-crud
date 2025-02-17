<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" oninput="this.value=this.value.toLowerCase()"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
        
            <!-- Password input -->
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" oninput="countPasswordLength('password','password-length')"/>
                
                <!-- View Password Button -->
                <button type="button" class="absolute inset-y-2 right-2 pr-13 flex items-center text-sm text-gray-500" onclick="togglePassword('password', 'eye-icon-password', 'password-length');">
                    <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <!-- Password Length Display -->
                    <span id="password-length" class="absolute left-8 top-1 text-sm text-gray-500" style="display: none;">0</span>
                </button>
                
            </div>
        
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- External JavaScript for Password Toggle -->
    <script>
        function countPasswordLength(inputId, lengthDisplayId) {
            const passwordField = document.getElementById(inputId);
            const lengthDisplay = document.getElementById(lengthDisplayId);
            const passwordLength = passwordField.value.length;
            if(passwordLength < 5){
                passwordField.style.color = 'red';
            }
            else if(passwordLength < 8){
                passwordField.style.color='yellow';
            }
            else{
                passwordField.style.color='green';
            }
            lengthDisplay.textContent = passwordLength;
            
        }
        function togglePassword(inputId, eyeIconId, lengthDisplayId) {
            const passwordField = document.getElementById(inputId);
            const eyeIcon = document.getElementById(eyeIconId);
            const lengthDisplay = document.getElementById(lengthDisplayId);
            
            if (passwordField.type === "password") {
                // Show password
                passwordField.type = "text";
                eyeIcon.setAttribute('stroke', 'green');
                lengthDisplay.textContent = passwordField.value.length;
                lengthDisplay.style.display = "block"; // Show password length
            } else {
                // Hide password
                passwordField.type = "password";
                eyeIcon.setAttribute('stroke', 'currentColor');
                lengthDisplay.textContent = '';
                lengthDisplay.style.display = "none"; // Hide password length
            }
        }
    </script>
</x-guest-layout>
