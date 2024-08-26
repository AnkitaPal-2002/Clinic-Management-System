<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Global Clinic</title>
    <style>
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fadeIn {
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }

        /* Ensure animations occur sequentially */
        .fadeIn:nth-child(1) {
            animation-delay: 0s;
        }

        .fadeIn:nth-child(2) {
            animation-delay: 1s;
        }

        .fadeIn:nth-child(3) {
            animation-delay: 2s;
        }

        .fadeIn:nth-child(4) {
            animation-delay: 3s;
        }

        .leFadeInLeft span {
            animation-name: leFadeInLeft
        }

        @keyframes leFadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-60px);
            }

            to {
                opacity: 1
            }
        }

        .btn-transition {
            background-color: transparent; /* Initial background color */
            color: white; /* Initial text color */
            transition: background-color 0.3s ease, color 0.3s ease; /* Transition effect */
        }
        
        .btn-transition:hover {
            background-color: white; /* Background color on hover */
            color: black; /* Text color on hover */
        }
        
    </style>
</head>

<?php
    include('./hooks/useParams.php');
?>

<body>
    <!-- Header Section -->
    <header>
        <nav class="bg-blue-900 border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <span class="flex items-center gap-2">
                    <!-- Logo -->
                    <i class="fa-regular fa-hospital fa-flip-horizontal fa-lg" style="color: #ffffff;"></i>
                    <span class="self-center text-lg md:text-xl font-semibold whitespace-nowrap text-white">Global
                        Clinic</span>
                </span>
                <div class="flex items-center lg:order-2 gap-2">
                    <a href=<?php 
                        echo getHostURL()."/pages/login.php"
                    ?>
                        class="btn-transition text-white font-medium rounded-lg text-sm px-2 md:px-5 py-2.5 focus:outline-none">
                        SignIn
                    </a>
                    <a href=<?php 
                        echo getHostURL()."/pages/register.php"
                    ?>
                        class="btn-transition text-white font-medium rounded-lg text-sm px-2 md:px-5 py-2.5 focus:outline-none">
                        SignUp
                    </a>
                </div>
                

            </div>
        </nav>
    </header>

    <!-- Banner -->
    <section class="bg-gray-200 dark:bg-gray-900 bg-cover bg-center h-[70vh] flex"   
    >
        <div class="grid py-8 px-4 mx-auto max-w-screen-xl lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="place-self-center mr-auto lg:col-span-7">
                <h3 class="max-w-2xl text-2xl font-semibold leading-none md:text-2xl xl:text-2xl text-blue-900/60 fadeIn"
                    style="animation-delay: 0s;">Care for your life</h3>
                <h1 class="mb-4 max-w-2xl text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl text-blue-600 fadeIn  "
                    style="animation-delay: 1s;">
                    
                        Leading the ways in Medical Excellence
                    
                </h1>
                <p class="mb-6 max-w-2xl font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl text-blue-600 fadeIn"
                    style="animation-delay: 2s;">
                    With years of experience, we provide reliable and accurate medical care, using the latest diagnostic tools and treatments to ensure the best outcomes for our patients.
                </p>
                <div class="fadeIn" style="animation-delay: 3s;">
                    <a href=<?php 
                            echo getHostURL()."/pages/login.php"
                        ?>
                        class="inline-flex justify-center items-center py-3 px-5 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900"
                    >
                        <div class="block gap-2">
                            Get started
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>
                    <a href=<?php 
                            echo getHostURL()."/pages/login.php"
                        ?>
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Book a Quick Appointment
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- Offer Section -->
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <h2
                class="mb-8 text-3xl font-extrabold tracking-tight leading-tight text-center text-blue-800 lg:mb-16 dark:text-white md:text-4xl">
                We can offer you </h2>
            <div
                class="grid grid-cols-2 gap-8 sm:gap-12 md:grid-cols-4 dark:text-gray-400">

                <div class="flex justify-center items-center gap-2 text-blue-600/70 hover:text-blue-800 cursor-pointer fadeIn" style="animation-delay: 0s;">
                    <i class="fa-solid fa-user-doctor fa-xl"></i>
                    <p class="text-lg font-bold leading-none text-blue-600/70 hover:text-blue-800 ">Best Doctors</p>
                </div>

                <div class="flex justify-center items-center gap-2 text-blue-600/70 hover:text-blue-800 cursor-pointer fadeIn" style="animation-delay: 1s;">
                    <i class="fa-solid fa-hand-holding-medical fa-xl"></i>
                    <p class="text-lg font-bold leading-none text-blue-600/70 hover:text-blue-800 ">Better Health</p>
                </div>

                <div class="flex justify-center items-center gap-2 text-blue-600/70 hover:text-blue-800 cursor-pointer fadeIn" style="animation-delay: 2s;">
                    <i class="fa-solid fa-bolt fa-lg"></i>
                    <p class="text-lg font-bold leading-none text-blue-600/70 hover:text-blue-800 ">Quick Service</p>
                </div>

                <div class="flex justify-center items-center gap-2 text-blue-600/70 hover:text-blue-800 cursor-pointer fadeIn" style="animation-delay: 3s;">
                    <i class="fa-solid fa-prescription-bottle-medical fa-lg"></i>
                    <p class="text-lg font-bold leading-none text-blue-600/70 hover:text-blue-800 ">Digital Prescription</p>
                </div>

              

                

            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="bg-white dark:bg-gray-900">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-blue-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl font-extrabold text-blue-800">Welcome to Global Clinic</h2>
                <p class="mb-4">With a focus on patient-centered care, I take the time to listen to your concerns, explain your options, and guide you through every step of your treatment. Whether you're visiting for a routine check-up, managing a chronic condition, or seeking specialized care, you can count on receiving the attention and expertise you deserve.</p>
                <p>Contact us today to schedule an appointment, and let us be your partner in health!</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg"
                    src="https://images.pexels.com/photos/3825586/pexels-photo-3825586.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="Doctor image 1">
                <img class="mt-4 w-full rounded-lg lg:mt-10"
                    src="https://images.pexels.com/photos/4167541/pexels-photo-4167541.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="Doctor image 2">
            </div>
        </div>
    </section>

    <!-- Our Contribution -->
    <section class="bg-gray-50 dark:bg-gray-900 dark:bg-gray-800">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="max-w-screen-lg text-blue-500 sm:text-lg dark:text-blue-400">
                <h2 class="mb-4 text-4xl font-bold text-blue-900 dark:text-white">
                    Trusted Care for Over 
                    <span
                        class="font-extrabold"
                    >
                        200,000+
                    </span> Patients and Counting</h2>
                <p class="mb-4 font-light">
                    We pride ourselves on delivering exceptional healthcare services, having cared for over 200,000 patients. Our commitment to quality care, personalized attention, and patient satisfaction has made us a trusted name in the community.
                </p>
                <p class="mb-4 font-medium">Deliver great service experiences fast - without the complexity of
                    traditional ITSM solutions.Accelerate critical development work, eliminate toil, and deploy changes
                    with ease.</p>
                <a href="#"
                    class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 dark:hover:text-primary-700">
                    Learn more
                    <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="p-4 bg-gray-50 sm:p-6 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <div class="flex items-center gap-2 text-blue-800">
                        <i class="fa-regular fa-hospital fa-flip-horizontal fa-lg" ></i>
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Global Cinic</span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-4">
                                <div class="hover:underline ">Github</div>
                            </li>
                            <li>
                                <div class="hover:underline">Discord</div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-4">
                                <div class="hover:underline">Privacy Policy</div>
                            </li>
                            <li>
                                <div class="hover:underline">Terms &amp; Conditions</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400"><i class="fa-regular fa-copyright"></i>
                    Devoped By Ankita pal and Ayan saha
                </span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <div class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                    <div  class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <i class="fa-brands fa-github"></i>
                    </div>
                    <div class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <i class="fa-brands fa-twitter"></i>
                    </div>
                   
                </div>
            </div>
        </div>
    </footer>


</body>

</html>