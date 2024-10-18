<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sign In</title>
    <style>
        .captcha {
            display: inline-block;
            margin-top: 10px;
            padding: 10px;
            font-size: 24px;
            font-weight: bold;
            font-family: 'Courier New', Courier, monospace;
            background-color: #f0f0f0;
            border: 2px solid #ccc;
            border-radius: 4px;
            letter-spacing: 4px;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);
            user-select: none;
        }

        .captcha-input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="mt-10 text-center text-3xl font-bold text-indigo-600">
                Global Clinic
            </div>
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-indigo-500">Sign in to your
                account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form id="login-form" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Select a Role</label>
                    <select id="role" name="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Choose a Role</option>
                        <option value="Admin">Admin</option>
                        <option value="Patient">Patient</option>
                        <option value="Doctor">Doctor</option>
                    </select>
                </div>

                <!-- CAPTCHA -->
                <div class="form-group">
                    <label for="captcha-code" class="block text-sm font-medium leading-6 text-gray-900">Captcha Code</label>
                    <div class="flex items-center">
                        <div class="captcha" id="captcha-code"></div>
                        <button type="button" id="refresh-captcha" class="ml-4 text-indigo-600 hover:text-indigo-500">
                            <i class="fa-solid fa-rotate fa-spin fa-xl" style="color: #0d1972;"></i>
                        </button>
                        <button type="button" id="play-audio" class="ml-4 text-indigo-600 hover:text-indigo-500">
                        <i class="fa-regular fa-circle-play fa-beat fa-xl" style="color: #24447a;"></i>
                        </button>
                    </div>
                </div>

                <div class="mt-2">
                    <label for="captcha-input" class="block text-sm font-medium leading-6 text-gray-900">Captcha</label>
                    <input type="text" id="captcha-input" name="captcha" placeholder="Enter captcha" required
                        class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Doesn't have an account?
                <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500 underline">Sign Up</a>
            </p>
        </div>
    </div>

    <script>
        // Function that generate a random CAPTCHA 
        function generateCaptcha() {
            const rand = Math.floor(1000 + Math.random() * 9000);
            document.getElementById('captcha-code').innerText = rand;
            return rand;
        }

        let currentCaptcha = generateCaptcha();

        // Refresh CAPTCHA when the reload button is clicked.
        document.getElementById('refresh-captcha').addEventListener('click', function() {
            currentCaptcha = generateCaptcha();
        });

        // Play CAPTCHA as audio
    document.getElementById('play-audio').addEventListener('click', function() {
        const synth = window.speechSynthesis;
        const digits = currentCaptcha.toString().split(''); 
        const utterance = new SpeechSynthesisUtterance(digits.join(' ')); 
        utterance.rate = 0.9; 
        // Try to select a female voice
        const voices = synth.getVoices();
        const femaleVoice = voices.find(voice => voice.name.toLowerCase().includes('female') || voice.gender === 'female' || voice.name.toLowerCase().includes('woman'));
        utterance.voice = femaleVoice || voices[0]; 

        synth.speak(utterance);
    });

     // Ensure voices are loaded before attempting to use them
     window.speechSynthesis.onvoiceschanged = function() {
        // Refresh available voices when they are loaded
        const voices = window.speechSynthesis.getVoices();
    };


        // Validate the CAPTCHA on form submission
        document.getElementById('login-form').addEventListener('submit', function(event) {
            const userCaptcha = document.getElementById('captcha-input').value;
            if (userCaptcha != currentCaptcha) {
                event.preventDefault();
                alert('Captcha does not match. Please try again.');
                currentCaptcha = generateCaptcha();
            }
        });
    </script>
</body>

</html>