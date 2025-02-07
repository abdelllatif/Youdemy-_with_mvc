<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Youdemy - Modern Learning Platform</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    /* Custom Animations */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideIn {
      from {
        transform: translateX(-100%);
      }
      to {
        transform: translateX(0);
      }
    }

    .animate-fade-in {
      animation: fadeIn 0.6s ease-out forwards;
    }

    .animate-slide-in {
      animation: slideIn 0.3s ease-out forwards;
    }

    /* Custom Styles */
    .glass-effect {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.1);
    }

    .dark .glass-effect {
      background: rgba(0, 0, 0, 0.2);
    }

    .course-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .course-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Dark mode transitions */
    .dark-transition {
      transition: background-color 0.3s ease, color 0.3s ease;
    }
  </style>
</head>
<body class="dark-transition bg-gray-50 dark:bg-gray-900">
  <!-- Navigation -->
  <?php include'includes/header.php' ?>
  <!-- Main Content -->
  <main class="pt-16">
    <!-- Hero Section -->
    <div class="relative h-screen bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-800 dark:to-indigo-800 overflow-hidden">
      <!-- Video Background -->
      <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover opacity-50">
        <source src="https://cdn.pixabay.com/video/2024/06/06/215470_large.mp4" type="video/mp4" />
      </video>

      <!-- Overlay Pattern (Optional) -->
      <div class="absolute inset-0 opacity-10"></div>

      <!-- Content -->
      <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
        <div class="text-center">
          <h1 class="animate-fade-in text-4xl font-extrabold text-white sm:text-5xl md:text-6xl">
            Unlock Your Potential
            <span class="block text-blue-200">Learn Without Limits</span>
          </h1>
          <p class="animate-fade-in mt-6 max-w-2xl mx-auto text-xl text-blue-100">
            Join millions of learners worldwide and transform your career with expert-led courses.
          </p>
          <div class="animate-fade-in mt-10 flex justify-center space-x-4">
            <a href="STUDENT/Frontend/cource.html" class="inline-flex items-center px-6 py-3 rounded-lg bg-white text-blue-600 hover:bg-gray-100 transition-colors duration-300">
              <span>Start Learning</span>
              <i class="fas fa-arrow-right ml-2"></i>
            </a>
            <a href="/teach" class="inline-flex items-center px-6 py-3 rounded-lg border-2 border-white text-white hover:bg-white hover:text-blue-600 transition-colors duration-300">
              Become an Instructor
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Featured Categories -->
    <div class="max-w-7xl mx-auto py-12 px-4">
      <h2 class="text-2xl font-bold dark-transition text-gray-900 dark:text-white mb-8">Top Categories</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Category Card -->
        <div class="course-card dark-transition bg-white dark:bg-gray-800 rounded-xl p-6 text-center cursor-pointer">
          <div class="rounded-full bg-green-100 dark:bg-green-900 w-16 h-16 flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-flask text-2xl text-green-600 dark:text-green-400"></i>
          </div>
          <h3 class="font-semibold dark-transition text-gray-900 dark:text-white">Science</h3>
          <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">850+ courses</p>
        </div>
        <div class="course-card dark-transition bg-white dark:bg-gray-800 rounded-xl p-6 text-center cursor-pointer">
          <div class="rounded-full bg-yellow-100 dark:bg-yellow-900 w-16 h-16 flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-calculator text-2xl text-yellow-600 dark:text-yellow-400"></i>
          </div>
          <h3 class="font-semibold dark-transition text-gray-900 dark:text-white">Mathematics</h3>
          <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">500+ courses</p>
        </div>
        <div class="course-card dark-transition bg-white dark:bg-gray-800 rounded-xl p-6 text-center cursor-pointer">
          <div class="rounded-full bg-purple-100 dark:bg-purple-900 w-16 h-16 flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-paint-brush text-2xl text-purple-600 dark:text-purple-400"></i>
          </div>
          <h3 class="font-semibold dark-transition text-gray-900 dark:text-white">Arts & Design</h3>
          <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">400+ courses</p>
        </div>
        <div class="course-card dark-transition bg-white dark:bg-gray-800 rounded-xl p-6 text-center cursor-pointer">
          <div class="rounded-full bg-red-100 dark:bg-red-900 w-16 h-16 flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-globe text-2xl text-red-600 dark:text-red-400"></i>
          </div>
          <h3 class="font-semibold dark-transition text-gray-900 dark:text-white">Languages</h3>
          <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">750+ courses</p>
        </div>
      </div>
    </div>

    <!-- Featured Courses -->
    <div class="max-w-7xl mx-auto py-12 px-4">
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold dark-transition text-gray-900 dark:text-white">Featured Courses</h2>
        <a href="STUDENT/Frontend/cource.html" class="text-blue-600 dark:text-blue-400 hover:underline">View All</a>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Course Card Example -->
        <div class="course-card dark-transition bg-white dark:bg-gray-800 rounded-xl p-6">
          <img src="https://i.pinimg.com/736x/41/f7/c2/41f7c2d6fcdb4d04f0f05b9b675a8c6a.jpg" alt="Course Thumbnail" class="w-full h-40 object-cover rounded-lg mb-4" />
          <h3 class="font-semibold dark-transition text-gray-900 dark:text-white mb-2">Basics of Quantum Physics</h3>
          <div class="flex items-center mb-2">
            <img src="https://www.sapaviva.com/wp-content/uploads/2017/06/9S.-Marie-Curie-1867-1934-1-1918x1918.jpg" alt="Creator" class="w-8 h-8 rounded-full mr-2" />
            <span class="text-sm text-gray-500 dark:text-gray-400">by Dr. Marie Curie</span>
          </div>
          <div class="flex items-center mb-2">
            <!-- Star Rating -->
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
          </div>
          <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Last updated: 2025-01-05</p>
          <p class="text-sm text-gray-500 dark:text-gray-400">30 videos</p>
        </div>
        <div class="course-card dark-transition bg-white dark:bg-gray-800 rounded-xl p-6">
          <img src="https://media.licdn.com/dms/image/v2/D4D12AQHBRJhvIvL5QA/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1721179052009?e=2147483647&v=beta&t=P6SewZ_urLxkD2wqvAXzI7pRuq7g4zbXn7aeclV-ZN8" alt="Course Thumbnail" class="w-full h-40 object-cover rounded-lg mb-4" />
          <h3 class="font-semibold dark-transition text-gray-900 dark:text-white mb-2">Mastering Algebra</h3>
          <div class="flex items-center mb-2">
            <img src="https://i.pinimg.com/736x/5b/c7/58/5bc7580160e1d64115810d180aa1bfbc.jpg" alt="Creator" class="w-8 h-8 rounded-full mr-2" />
            <span class="text-sm text-gray-500 dark:text-gray-400">by Alan Edelman</span>
          </div>
          <div class="flex items-center mb-2">
            <!-- Star Rating -->
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
          </div>
          <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Last updated: 2025-01-03</p>
          <p class="text-sm text-gray-500 dark:text-gray-400">50 videos</p>
        </div>
        <div class="course-card dark-transition bg-white dark:bg-gray-800 rounded-xl p-6">
          <img src="https://nexacu.com/media/p4ydfxqm/illustration-of-streamlined-workflow-with-adobe-illustrator-tools.jpg" alt="Course Thumbnail" class="w-full h-40 object-cover rounded-lg mb-4" />
          <h3 class="font-semibold dark-transition text-gray-900 dark:text-white mb-2">Illustration with Adobe Illustrator</h3>
          <div class="flex items-center mb-2">
            <img src="https://yt3.googleusercontent.com/GJejalNPLMeFgKmPhxJ9cx5Q8_ESmceiPN8_YjXLUtfD1gy9J81S5Gatt7sUbpU_jSs-fgzZjA=s160-c-k-c0x00ffffff-no-rj" alt="Creator" class="w-8 h-8 rounded-full mr-2" />
            <span class="text-sm text-gray-500 dark:text-gray-400">by Andy Tells Things</span>
          </div>
          <div class="flex items-center mb-2">
            <!-- Star Rating -->
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
          </div>
          <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Last updated: 2025-01-04</p>
          <p class="text-sm text-gray-500 dark:text-gray-400">40 videos</p>
        </div>
        <div class="course-card dark-transition bg-white dark:bg-gray-800 rounded-xl p-6">
          <img src="https://cdn.buttercms.com/t349DUJUReydclxkbGiA" alt="Course Thumbnail" class="w-full h-40 object-cover rounded-lg mb-4" />
          <h3 class="font-semibold dark-transition text-gray-900 dark:text-white mb-2">Python Essentials</h3>
          <div class="flex items-center mb-2">
            <img src="https://gvanrossum.github.io/images/guido-headshot-2019.jpg" alt="Creator" class="w-8 h-8 rounded-full mr-2" />
            <span class="text-sm text-gray-500 dark:text-gray-400">by Guido van Rossum</span>
          </div>
          <div class="flex items-center mb-2">
            <!-- Star Rating -->
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
          </div>
          <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Last updated: 2025-01-01</p>
          <p class="text-sm text-gray-500 dark:text-gray-400">45 videos</p>
        </div>
        <div class="course-card dark-transition bg-white dark:bg-gray-800 rounded-xl p-6">
          <img src="https://i.ytimg.com/vi/_UEdm9GLDkk/maxresdefault.jpg" alt="Course Thumbnail" class="w-full h-40 object-cover rounded-lg mb-4" />
          <h3 class="font-semibold dark-transition text-gray-900 dark:text-white mb-2">Web Design for Beginners</h3>
          <div class="flex items-center mb-2">
            <img src="https://yt3.googleusercontent.com/YhKL_HNwoDofviNS13Sp_QjQGQy0mOwp4G9CWED26v55GsoYLaA6adCbhb00Sx0621sLkkIA=s160-c-k-c0x00ffffff-no-rj" alt="Creator" class="w-8 h-8 rounded-full mr-2" />
            <span class="text-sm text-gray-500 dark:text-gray-400">by Jesse Showalter</span>
          </div>
          <div class="flex items-center mb-2">
            <!-- Star Rating -->
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
          </div>
          <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Last updated: 2025-01-10</p>
          <p class="text-sm text-gray-500 dark:text-gray-400">30 videos</p>
        </div>
        <div class="course-card dark-transition bg-white dark:bg-gray-800 rounded-xl p-6">
          <img src="https://i.ytimg.com/vi/RjfZrcAMH5E/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLBzTHSv7xF0Bmjkyzl7BWdv0D1m7Q" alt="Course Thumbnail" class="w-full h-40 object-cover rounded-lg mb-4" />
          <h3 class="font-semibold dark-transition text-gray-900 dark:text-white mb-2">Mastering Data Analysis with Excel</h3>
          <div class="flex items-center mb-2">
            <img src="https://yt3.googleusercontent.com/9ZZjWRnwsec7xVsT1Uu67UEhqNt5KYW5hjbr8pw3msp5C6LCUGuEuBx-LhDyf5QwWKkAwz2ktg=s160-c-k-c0x00ffffff-no-rj" alt="Creator" class="w-8 h-8 rounded-full mr-2" />
            <span class="text-sm text-gray-500 dark:text-gray-400">by Kenji Explains</span>
          </div>
          <div class="flex items-center mb-2">
            <!-- Star Rating -->
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-yellow-400"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
            <i class="fas fa-star text-gray-300 dark:text-gray-600"></i>
          </div>
          <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Last updated: 2025-01-08</p>
          <p class="text-sm text-gray-500 dark:text-gray-400">video</p>
        </div>
      </div>
    </div>
  </main>

<?php include 'includes/footer.php' ?>
  <script>
    // Dark Mode Toggle
    function toggleDarkMode() {
      document.documentElement.classList.toggle('dark');
      const isDark = document.documentElement.classList.contains('dark');
      localStorage.setItem('darkMode', isDark);
    }

    // Check for saved dark mode preference
    if (
      localStorage.getItem('darkMode') === 'true' ||
      (window.matchMedia('(prefers-color-scheme: dark)').matches && !localStorage.getItem('darkMode'))
    ) {
      document.documentElement.classList.add('dark');
    }

    // Optional: Profile Dropdown Example
    const profileDropdown = document.getElementById('profileDropdown');
    if (profileDropdown) {
      profileDropdown.addEventListener('click', () => {
        const menu = document.createElement('div');
        menu.className =
          'absolute right-0 mt-2 w-48 rounded-lg shadow-lg dark-transition bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 animate-fade-in';
        menu.innerHTML = `
          <div class="py-1">
            <a href="teacher.html" class="dark-transition block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">Teacher</a>
            <a href="profile.html" class="dark-transition block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
            <a href="settings.html" class="dark-transition block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Settings</a>
            <a href="logout.html" class="dark-transition block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">Logout</a>
          </div>
        `;
        const existingMenu = document.querySelector('#profileMenu');
        if (existingMenu) {
          existingMenu.remove();
        } else {
          menu.id = 'profileMenu';
          profileDropdown.appendChild(menu);
        }
      });

      // Close dropdown when clicking outside
      document.addEventListener('click', (e) => {
        if (!profileDropdown.contains(e.target)) {
          const menu = document.querySelector('#profileMenu');
          if (menu) menu.remove();
        }
      });
    }
  </script>
</body>
</html>
