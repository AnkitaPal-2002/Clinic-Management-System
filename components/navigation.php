
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .btn-transition {
            transition: background-color 0.3s ease, color 0.3s ease; /* Transition effect */
        }
        
        .btn-transition:hover {
            color: white; /* Text color on hover */
        }
    </style>
</head>
<body>
<header class="bg-blue-800 text-white p-4 flex justify-between items-center max-w-7xl mx-auto rounded-md">
        <span class="flex items-center gap-2">
            <i class="fa-regular fa-hospital fa-flip-horizontal fa-lg" style="color: #ffffff;"></i>
            <!-- Logo -->
            <span class="self-center text-lg md:text-xl font-semibold whitespace-nowrap text-white">
                Global Clinic
            </span>
        </span>
       
        <button id="logoutBtn" 
            class="btn-transition text-white bg-indigo-500 hover:bg-indigo-600 font-medium rounded-lg text-sm px-2 md:px-5 py-2.5 focus:outline-none"
        >
            Logout
        </button>
       
    </header>
    <script>
        document.getElementById('logoutBtn').addEventListener('click', function(e) {
            e.preventDefault(); 
            const confirmed = confirm('Are you sure you want to logout?');
            if (confirmed) {
                window.location.href = '/Clinic-Management-System/pages/logout.php'; 
            }
        });
    </script>
</body>
</html>
