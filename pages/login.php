<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sign In</title>
</head>

<?php
    include('../hooks/useParams.php');
    if(isset($_GET['error'])){
        
        include('../components/dangeralert.php');

        if($_GET['error'] == 'usernotfound'){
          danger('Username not found. Please try again.');

        }else if($_GET['error'] == 'invalidpassword'){
            danger('Invalid password');

        }else if($_GET['error'] == 'rolemissing'){
            danger('Role is Missing');
        }
    }
?>

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
            <form 
                class="space-y-6" 
                action=<?php 
                    echo getBaseURL()."/helpers/loginProcess.php"
                ?> 
                method="POST"
            >
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
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                            Role</label>
                        <select id="role" name="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Patient">Patient</option>
                            <option value="Doctor">Doctor</option>
                        </select>
                    </div>

                <div>
                    <button type="submit"
                    name="submit" 
                    value="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</button>
                </div>

            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Doesn't have an account?
                <a href=<?php echo getBaseURL()."/pages/register.php"; ?> class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500 underline">Sign Up</a>
            </p>
        </div>
    </div>
</body>

</html>
</div>
</div>
</body>

</html>
