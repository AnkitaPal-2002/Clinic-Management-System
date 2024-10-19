<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Forget Password</title>
</head>

<?php
include '../../hooks/useParams.php';
include '../../hooks/useSecurityQuestions.php';
include("../../config/db.php");

$user = $_GET['user'];
$role = $_GET['role'];
$questionId = $_GET['questionId'];

$securityQuestion = getSecurityQuestionById($questionId, $connection);
?>

<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="mt-10 text-center text-3xl font-bold text-indigo-600">
                Global Clinic
            </div>
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-indigo-500">
                Forget Password
            </h2>
            <h2 class="mt-2 text-center text-lg font-semibold leading-9 tracking-tight text-indigo-500">
                Security Question
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action=<?php
                            echo getHostURL() . "/helpers/securityQuestionProcess.php?role=" . $role . "&user=" . $user
                            ?> method="post">

                <div class="relative my-6">
                    <label for="securityQuestion" class="block text-sm font-medium leading-6 text-gray-900">Security Question</label>
                    <div class="mt-2">
                        <p
                            class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <?php echo $securityQuestion['questionText'] ?>
                        </p>
                    </div>
                </div>

                <div class="relative my-6">
                    <label for="securityAnswer" class="block text-sm font-medium leading-6 text-gray-900">Security Answer</label>
                    <div class="mt-2">
                        <input
                            id="securityAnswer"
                            name="securityAnswer"
                            type="text"
                            required
                            class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button
                        type="submit"
                        name="submit"
                        value="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Continue</button>
                </div>
            </form>


            <p class="mt-10 text-center text-sm text-gray-500">
                Doesn't have an account?
                <a href=<?php echo getHostURL() . "/pages/register.php"; ?> class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500 underline">Sign Up</a>
            </p>
        </div>
    </div>


</body>

</html>