<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        We've sent a 6-digit verification code to your email address. Please enter the code below to verify your email and complete your registration.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('success')" />

    <form method="POST" action="{{ route('otp.verify.submit') }}" id="otpForm">
        @csrf

        <!-- OTP Input -->
        <div>
            <x-input-label for="otp" :value="__('Verification Code')" />
            <x-text-input id="otp"
                class="block mt-1 w-full text-center text-2xl tracking-widest"
                type="text"
                name="otp"
                required
                autofocus
                maxlength="6"
                pattern="[0-9]{6}"
                placeholder="000000" />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
            <p class="mt-2 text-xs text-gray-500">Enter the 6-digit code sent to your email</p>
        </div>

        <!-- Timer Display -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                Code expires in: <span id="timer" class="font-bold text-indigo-600">10:00</span>
            </p>
        </div>

        <div class="flex items-center justify-between mt-6">
            <!-- Resend OTP Button -->
            <form method="POST" action="{{ route('otp.resend') }}" id="resendForm" class="inline">
                @csrf
                <button type="submit"
                    id="resendBtn"
                    class="text-sm text-gray-600 hover:text-gray-900 underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed"
                    disabled>
                    Resend Code
                </button>
            </form>

            <x-primary-button>
                {{ __('Verify Email') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        // OTP Input Auto-format
        const otpInput = document.getElementById('otp');
        otpInput.addEventListener('input', function(e) {
            // Only allow numbers
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Timer Countdown
        let timeLeft = 600; // 10 minutes in seconds
        const timerDisplay = document.getElementById('timer');
        const resendBtn = document.getElementById('resendBtn');

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timerDisplay.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;

            if (timeLeft <= 0) {
                timerDisplay.textContent = 'Expired';
                timerDisplay.classList.add('text-red-600');
                timerDisplay.classList.remove('text-indigo-600');
                resendBtn.disabled = false;
                clearInterval(timerInterval);
            } else if (timeLeft <= 60) {
                timerDisplay.classList.add('text-red-600');
                timerDisplay.classList.remove('text-indigo-600');
            }

            timeLeft--;
        }

        const timerInterval = setInterval(updateTimer, 1000);

        // Enable resend button after 30 seconds
        setTimeout(() => {
            resendBtn.disabled = false;
        }, 30000);

        // Auto-submit when 6 digits are entered
        otpInput.addEventListener('input', function() {
            if (this.value.length === 6) {
                document.getElementById('otpForm').submit();
            }
        });
    </script>
</x-guest-layout>
