<nav class="fixed w-full z-50 dark-transition bg-white dark:bg-gray-800 shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between h-16">
        <!-- Logo and Brand -->
        <div class="flex items-center">
          <a href="/" class="flex items-center space-x-2">
            <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 text-transparent bg-clip-text hover:scale-105 transition-transform">
              Youdemy
            </span>
          </a>
          <!-- Desktop Navigation -->
          <div class="hidden md:flex ml-10 space-x-8">
            <a
              href="Home.php"
              class="dark-transition text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700"
              >Home</a
            >
            <a
              href="?route=course/vedios"
              class="dark-transition text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700"
              >Courses</a
            >
            <a
              href="/learning"
              class="dark-transition text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700"
              >My Learning</a
            >
          </div>
        </div>

        <!-- Search Bar -->
        <div class="hidden md:flex flex-1 items-center justify-center px-6">
          <div class="w-full max-w-lg relative">
            <input
              type="text"
              class="w-full dark-transition bg-gray-100 dark:bg-gray-700 rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-white"
              placeholder="Search for courses..."
            />
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
          </div>
        </div>

        <!-- Right Navigation -->
        <div class="flex items-center space-x-4">
          <!-- Dark Mode Toggle -->
          <button onclick="toggleDarkMode()" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fas fa-moon dark:hidden text-gray-600"></i>
            <i class="fas fa-sun hidden dark:block text-yellow-400"></i>
          </button>

          <!-- Notifications -->
          <div class="relative">
            <button class="dark-transition text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">
              <i class="fas fa-bell"></i>
              <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
            </button>
          </div>

          <!-- Static Login/Profile Link (Front‑end Only) -->
          <a href="?route=login" class="text-blue-500 hover:underline">Connexion</a>
          <!-- 
          If you want a static profile dropdown instead, you could use this instead:
          <div class="relative" id="profileDropdown">
            <button class="flex items-center space-x-2 focus:outline-none">
              <img src="https://via.placeholder.com/32" alt="Profile" class="h-8 w-8 rounded-full ring-2 ring-blue-500" />
              <span class="hidden md:block dark-transition text-gray-700 dark:text-gray-200">User</span>
              <i class="fas fa-chevron-down text-gray-400"></i>
            </button>
          </div>
          -->
        </div>
      </div>
    </div>
  </nav>
