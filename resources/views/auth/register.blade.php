<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name Input Field -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" oninput="this.value = this.value.toUpperCase()" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address Input Field -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" oninput="this.value=this.value.toLowerCase()" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password Input Field with Toggle Visibility Button -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" oninput="countPasswordLength('password','password-length')" />
                <button type="button" class="absolute inset-y-2 right-2 pr-2 flex items-center text-sm text-gray-500" onclick="togglePassword('password', 'eye-icon-password', 'password-length')">
                    <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                     <!-- Password Length Display -->
                <span id="password-length" class="absolute left-10 top-1 text-sm text-gray-500" style="display: none;" onclick="disable">0</span>
                </button>
               
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password Input Field with Toggle Visibility Button -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div class="relative">
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" oninput="countPasswordLength('password_confirmation','password-confirm-length')" />
                <button type="button" class="absolute inset-y-2 right-2 pr-2 flex items-center text-sm text-gray-500" onclick="togglePassword('password_confirmation', 'eye-icon-confirm', 'password-confirm-length')">
                    <svg id="eye-icon-confirm" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                     <!-- Confirm Password Length Display -->
                <span id="password-confirm-length" class="absolute left-10 top-1 text-sm text-gray-500" style="display: none;">0</span>
                </button>
               
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Already Registered Link & Register Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- External JavaScript for Password Toggle and Length Display -->
    <script>
        // Function to count password length and change input color
        function countPasswordLength(inputId, lengthDisplayId) {
            const passwordField = document.getElementById(inputId);
            const lengthDisplay = document.getElementById(lengthDisplayId);
            const passwordLength = passwordField.value.length;

            // Set password field color based on length
            if (passwordLength < 5) {
                passwordField.style.color = 'red';
            } else if (passwordLength < 8) {
                passwordField.style.color = 'yellow';
            } else {
                passwordField.style.color = 'green';
            }

            // Display the password length
            lengthDisplay.textContent = passwordLength;
        }

        // Function to toggle password visibility
        function togglePassword(inputId, eyeIconId, lengthDisplayId) {
            const passwordField = document.getElementById(inputId);
            const eyeIcon = document.getElementById(eyeIconId);
            const lengthDisplay = document.getElementById(lengthDisplayId);

            if (passwordField.type === "password") {
                passwordField.type = "text"; // Show password
                eyeIcon.setAttribute('stroke', 'green');
                lengthDisplay.style.display = "block"; // Show length
            } else {
                passwordField.type = "password"; // Hide password
                eyeIcon.setAttribute('stroke', 'currentColor');
                lengthDisplay.style.display = "none"; // Hide length
            }
        }
    </script>
</x-guest-layout>
