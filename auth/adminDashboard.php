<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Global Clinic Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-white">
  <!-- Header -->
  <header class="bg-indigo-700 text-white p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">Global Clinic</h1>
    <button id="toggleSidebarButton" class="lg:hidden p-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
      </svg>
      <span class="sr-only">Toggle menu</span>
    </button>
  </header>

  <div class="flex flex-col lg:flex-row">
    <!-- Sidebar -->
    <aside id="sidebar"
      class="bg-transparent text-black w-64 p-4 space-y-4 fixed inset-y-0 left-0 z-50 lg:relative transition-transform duration-300 ease-in-out transform -translate-x-full lg:translate-x-0">
      <button id="closeSidebarButton" class="absolute top-4 right-4 lg:hidden p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <span class="sr-only">Close menu</span>
      </button>
      <nav class="space-y-2">
        <button class="flex items-center w-full p-2 text-left hover:bg-indigo-600 rounded-md gap-3">
            <i class="fa-solid fa-user-doctor" ></i>
          Doctor List
        </button>
        <button class="flex items-center w-full p-2 text-left hover:bg-indigo-600 rounded-md gap-2">
          <i class="fa-solid fa-bed-pulse"></i>
          Patient List
        </button>
        <button class="flex items-center w-full p-2 text-left hover:bg-indigo-600 rounded-md gap-3">
          <i class="fa-solid fa-calendar-check " ></i>
          Appointment Details
        </button>
        <button class="flex items-center w-full p-2 text-left hover:bg-indigo-600 rounded-md gap-3">
          <i class="fa-solid fa-calendar-check " ></i>
          Add Doctor
        </button>
        <!-- <button class="flex items-center w-full p-2 text-left hover:bg-purple-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 8h10M7 12h8m-5 4h2" />
          </svg>
          Messages
        </button> -->
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4">
      <h2 class="text-2xl font-bold text-black mb-6">WELCOME ADMIN</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center">
          <div class="text-purple-600 mb-4">
          <i class="fa-solid fa-user-doctor fa-fade fa-2xl" style="color: #267aba;"></i>
          </div>
          <h3 class="text-xl font-semibold mb-2">Doctor List</h3>
          <a href="#" class="text-blue-500 hover:underline mt-auto">View Doctors</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center">
          <div class="text-purple-600 mb-4">
          <i class="fa-solid fa-bed-pulse fa-fade fa-2xl" style="color: #267aba;"></i>
          </div>
          <h3 class="text-xl font-semibold mb-2">Patient List</h3>
          <a href="#" class="text-blue-500 hover:underline mt-auto">View Patients</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center">
          <div class="text-purple-600 mb-4">
          <i class="fa-solid fa-calendar-check fa-shake fa-2xl" style="color: #267aba;"></i>
          </div>
          <h3 class="text-xl font-semibold mb-2">Appointment Details</h3>
          <a href="#" class="text-blue-500 hover:underline mt-auto">View Appointments</a>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center">
          <div class="text-purple-600 mb-4">
          <i class="fa-solid fa-plus fa-beat fa-2xl" style="color: #267aba;"></i>
          </div>
          <h3 class="text-xl font-semibold mb-2">Manage Doctors</h3>
          <a href="#" class="text-blue-500 hover:underline mt-auto">Add Doctors</a>
        </div>
      </div>
    </main>
  </div>

  <!-- Bottom Navigation -->
  <nav class="lg:hidden fixed bottom-0 left-0 right-0 bg-purple-800 text-white p-4 flex justify-around">
    <button class="flex flex-col items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M17 20h5v-5M4 7v6a4 4 0 004 4h10a4 4 0 004-4V7" />
      </svg>
      Doctors
    </button>
    <button class="flex flex-col items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M17 20h5v-5M4 7v6a4 4 0 004 4h10a4 4 0 004-4V7" />
      </svg>
      Patients
    </button>
    <button class="flex flex-col items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M8 7V3M8 21v-4M16 7V3m0 18v-4" />
      </svg>
      Appointments
    </button>
    <button class="flex flex-col items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 4v16m8-8H4" />
      </svg>
      Add Doctor
    </button>
    <button class="flex flex-col items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M7 8h10M7 12h8m-5 4h2" />
      </svg>
      Messages
    </button>
  </nav>

  <script>
    const sidebar = document.getElementById("sidebar");
    const toggleSidebarButton = document.getElementById("toggleSidebarButton");
    const closeSidebarButton = document.getElementById("closeSidebarButton");

    toggleSidebarButton.addEventListener("click", () => {
      sidebar.classList.toggle("-translate-x-full");
    });

    closeSidebarButton.addEventListener("click", () => {
      sidebar.classList.add("-translate-x-full");
    });
  </script>
</body>

</html>
