<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Course Catalog - Youdemy</title>
  <!-- Font Awesome and Tailwind CSS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .view-toggle-btn.active {
      background-color: #3b82f6;
      color: white;
    }
  </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-200">
  <!-- Navbar -->
  <?php require_once __DIR__ . '/../includes/header.php'; ?>


  <!-- Main Content (with top margin to account for fixed navbar) -->
  <div class="pt-16">
    <div class="max-w-7xl mx-auto px-4 py-8">
      <!-- Search and Filters Section -->
      <div class="mb-8">
        <!-- Search Bar (for medium and up) -->
        <div class="hidden md:flex flex-1 items-center justify-center px-6">
          <form action="#" method="POST" class="w-full max-w-lg relative">
            <input type="text" name="search_term" class="w-full dark-transition bg-gray-100 dark:bg-gray-700 rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-white" placeholder="Search for courses..." />
            <button type="submit" class="absolute right-3 top-3 text-gray-400">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>
        <!-- Filter Buttons -->
        <div class="flex flex-wrap gap-4 mt-4">
          <button class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition-colors">All</button>
          <button class="px-4 py-2 rounded-lg border dark:border-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Programming</button>
          <button class="px-4 py-2 rounded-lg border dark:border-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Design</button>
          <button class="px-4 py-2 rounded-lg border dark:border-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Business</button>
          <button class="px-4 py-2 rounded-lg border dark:border-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Marketing</button>
        </div>
      </div>

      <!-- Results Summary and View Toggle -->
      <div class="flex justify-between items-center mb-6">
        <p class="text-gray-600 dark:text-gray-300">
          Showing <span class="font-semibold">1-9</span> of <span class="font-semibold">256</span> courses
        </p>
        <div class="flex items-center space-x-2">
          <label class="text-gray-600 dark:text-gray-300">View:</label>
          <button onclick="toggleView('video')" id="videoViewBtn" class="view-toggle-btn px-3 py-2 rounded-lg border dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 active">
            Video
          </button>
          <button onclick="toggleView('document')" id="documentViewBtn" class="view-toggle-btn px-3 py-2 rounded-lg border dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
            Documents
          </button>
        </div>
        <div class="flex items-center space-x-2">
          <label class="text-gray-600 dark:text-gray-300">Sort by:</label>
          <select class="bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-lg px-3 py-2 text-gray-700 dark:text-gray-300">
            <option>Most Popular</option>
            <option>Newest First</option>
            <option>Highest Rated</option>
          </select>
        </div>
      </div>

      <!-- Video Grid (Default View) -->
      <div id="courseGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <!-- Sample Video Card 1 -->
    <article class="course-card bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="relative">
            <!-- Thumbnail -->
            <img src="<?php echo $result['thumbnail_path'] ?>" alt="Video Thumbnail" class="w-full h-40 object-cover">
        </div>
        <div class="p-3">
            <!-- Title -->
            <h3 class="text-md font-semibold mb-1 text-white truncate"><?php echo $result['title'] ?></h3>
            <!-- Categories -->
            <div class="flex flex-wrap gap-1 mb-1">
                <span class="bg-blue-600 text-xs px-2 py-1 rounded"><?php echo $result['categorie'] ?></span>
            </div>
            <!-- Tags -->
            <div class="flex flex-wrap gap-1 mb-2">
             <?php foreach($result['tag'] as $tag): ?>
                <span class="bg-green-600 text-xs px-2 py-1 rounded"><?php echo $tag ?></span>
              <?php  endforeach;
                ?>
            </div>
            <!-- Teacher Information -->
            <div class="flex items-center mb-2">
                <img src="https://via.placeholder.com/32" alt="Teacher Avatar" class="w-6 h-6 rounded-full mr-2">
                <span class="text-xs text-gray-400 truncate"><?php echo $result['first_name']." ".$result['last_name'] ?></span>
            </div>
            <!-- Ratings -->
            <div class="flex items-center mb-2">
                <i class="fas fa-star text-yellow-400 text-xs"></i>
                <span class="ml-1 text-xs text-gray-300">4.8</span>
                <span class="mx-2 text-gray-400 text-xs">|</span>
                <span class="text-xs text-gray-400">1250 students</span>
            </div>
            <!-- View Details Button -->
            <div>
                <a href="vedio.php" class="text-blue-400 text-xs hover:text-blue-300">Join Course →</a>
            </div>
        </div>
    </article>

    <!-- Sample Video Card 2 -->
    <article class="course-card bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="relative">
            <img src="https://via.placeholder.com/640x360.png?text=Video+Thumbnail" alt="Video Thumbnail" class="w-full h-40 object-cover">
            <span class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white text-xs px-2 py-1 rounded">00:10:00</span>
        </div>
        <div class="p-3">
            <h3 class="text-md font-semibold mb-1 text-white truncate">Mastering Algebra</h3>
            <div class="flex flex-wrap gap-1 mb-1">
                <span class="bg-blue-600 text-xs px-2 py-1 rounded">Mathematics</span>
            </div>
            <div class="flex flex-wrap gap-1 mb-2">
                <span class="bg-green-600 text-xs px-2 py-1 rounded">Algebra</span>
            </div>
            <div class="flex items-center mb-2">
                <img src="https://via.placeholder.com/32" alt="Teacher Avatar" class="w-6 h-6 rounded-full mr-2">
                <span class="text-xs text-gray-400 truncate">Alan Turing - Instructor</span>
            </div>
            <div class="flex items-center mb-2">
                <i class="fas fa-star text-yellow-400 text-xs"></i>
                <span class="ml-1 text-xs text-gray-300">4.5</span>
                <span class="mx-2 text-gray-400 text-xs">|</span>
                <span class="text-xs text-gray-400">980 students</span>
            </div>
            <div>
                <a href="vedio.php" class="text-blue-400 text-xs hover:text-blue-300">Join Course →</a>
            </div>
        </div>
    </article>

    <!-- Sample Video Card 3 -->
    <article class="course-card bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="relative">
            <img src="https://via.placeholder.com/640x360.png?text=Video+Thumbnail" alt="Video Thumbnail" class="w-full h-40 object-cover">
            <span class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white text-xs px-2 py-1 rounded">00:12:45</span>
        </div>
        <div class="p-3">
            <h3 class="text-md font-semibold mb-1 text-white truncate">Web Design for Beginners</h3>
            <div class="flex flex-wrap gap-1 mb-1">
                <span class="bg-blue-600 text-xs px-2 py-1 rounded">Design</span>
            </div>
            <div class="flex flex-wrap gap-1 mb-2">
                <span class="bg-green-600 text-xs px-2 py-1 rounded">UI/UX</span>
            </div>
            <div class="flex items-center mb-2">
                <img src="https://via.placeholder.com/32" alt="Teacher Avatar" class="w-6 h-6 rounded-full mr-2">
                <span class="text-xs text-gray-400 truncate">Jesse Showalter - Designer</span>
            </div>
            <div class="flex items-center mb-2">
                <i class="fas fa-star text-yellow-400 text-xs"></i>
                <span class="ml-1 text-xs text-gray-300">4.7</span>
                <span class="mx-2 text-gray-400 text-xs">|</span>
                <span class="text-xs text-gray-400">1120 students</span>
            </div>
            <div>
                <a href="vedio.php" class="text-blue-400 text-xs hover:text-blue-300">Join Course →</a>
            </div>
        </div>
    </article>
</div>
      <!-- Document Grid (Initially Hidden) -->
      <div id="documentsContent" class="hidden grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-7xl mx-auto px-4 pb-8">
        <!-- Alternative Document Card 1 -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg transform hover:scale-105 transition duration-300 flex flex-col">
          <!-- Card Header -->
          <div class="flex items-center p-4 border-b dark:border-gray-700">
            <i class="fas fa-file-pdf text-4xl text-red-500"></i>
            <div class="ml-4">
              <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 truncate">Business Plan 2024</h3>
              <p class="text-sm text-gray-600 dark:text-gray-400">Jane Doe</p>
            </div>
          </div>
          <!-- Card Body -->
          <div class="p-4 flex-grow">
          <p class="text-gray-700 dark:text-gray-300 text-sm mb-2">descreption</p>
            <p class="text-gray-700 dark:text-gray-300 text-sm mb-4">
              An in-depth business plan outlining strategic goals and projections for the upcoming fiscal year.
            </p>
            <div class="flex flex-wrap gap-2">
              <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded-full">Business</span>
              <span class="bg-green-600 text-white text-xs px-2 py-1 rounded-full">Strategy</span>
            </div>
          </div>
          <!-- Card Footer (Pinned to Bottom) -->
          <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 flex items-center justify-between mt-auto">
            <div class="flex items-center">
              <img src="https://via.placeholder.com/40" alt="Teacher Avatar" class="w-10 h-10 rounded-full mr-2">
              <span class="text-sm text-gray-700 dark:text-gray-300">Teacher</span>
            </div>
            <a href="document.php" class="text-blue-500 text-sm font-medium hover:underline">Join Course →</a>
          </div>
        </div>

        <!-- Alternative Document Card 2 -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg transform hover:scale-105 transition duration-300 flex flex-col">
          <!-- Card Header -->
          <div class="flex items-center p-4 border-b dark:border-gray-700">
            <i class="fas fa-file-excel text-4xl text-green-500"></i>
            <div class="ml-4">
              <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 truncate">Financial Report Q1</h3>
              <p class="text-sm text-gray-600 dark:text-gray-400">John Smith</p>
            </div>
          </div>
          <!-- Card Body -->
          <div class="p-4 flex-grow">
          <p class="text-gray-700 dark:text-gray-300 text-sm mb-2">descreption</p>
            <p class="text-gray-700 dark:text-gray-300 text-sm mb-4">
              Quarterly financial report detailing revenue, expenditures, and profit margins.
            </p>
            <div class="flex flex-wrap gap-2">
              <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded-full">Finance</span>
            </div>
          </div>
          <!-- Card Footer (Pinned to Bottom) -->
          <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 flex items-center justify-between mt-auto">
            <div class="flex items-center">
              <img src="https://via.placeholder.com/40" alt="Teacher Avatar" class="w-10 h-10 rounded-full mr-2">
              <span class="text-sm text-gray-700 dark:text-gray-300">Teacher</span>
            </div>
            <a href="document.php" class="text-blue-500 text-sm font-medium hover:underline">Join Course →</a>
          </div>
        </div>

        <!-- Add more document cards as needed -->
      </div>

      <!-- Pagination (Static Example) -->
      <div class="mt-12 flex justify-center">
        <nav class="flex items-center space-x-2">
          <a href="#"
             class="p-2 rounded-lg border dark:border-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 opacity-50 cursor-not-allowed">
            <i class="fas fa-chevron-left"></i>
          </a>
          <a href="#" class="px-4 py-2 rounded-lg bg-blue-600 text-white">1</a>
          <a href="#" class="px-4 py-2 rounded-lg border dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">2</a>
          <a href="#" class="px-4 py-2 rounded-lg border dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">3</a>
          <a href="#"
             class="p-2 rounded-lg border dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
            <i class="fas fa-chevron-right"></i>
          </a>
        </nav>
      </div>
      <div class="text-center mt-4 text-sm text-gray-600 dark:text-gray-400">
        Showing page 1 of 3 (256 total videos)
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="dark-transition bg-gray-800 dark:bg-gray-900 text-white mt-12">
    <div class="max-w-7xl mx-auto py-12 px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Footer content can go here -->
      </div>
      <div class="mt-8 pt-8 border-t border-gray-700">
        <p class="text-center text-gray-400">© 2024 Youdemy. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script>
    // Toggle between Video and Document views
    let currentView = 'video';

    function toggleView(view) {
      currentView = view;
      const courseGrid = document.getElementById('courseGrid');
      const documentsContent = document.getElementById('documentsContent');
      const videoViewBtn = document.getElementById('videoViewBtn');
      const documentViewBtn = document.getElementById('documentViewBtn');

      if (currentView === 'video') {
        courseGrid.classList.remove('hidden');
        documentsContent.classList.add('hidden');
        videoViewBtn.classList.add('active');
        documentViewBtn.classList.remove('active');
      } else if (currentView === 'document') {
        courseGrid.classList.add('hidden');
        documentsContent.classList.remove('hidden');
        videoViewBtn.classList.remove('active');
        documentViewBtn.classList.add('active');
      }
    }

    // Dark Mode Toggle
    function toggleDarkMode() {
      document.body.classList.toggle('dark');
    }

    // Optional: Prevent Enter key on search inputs from submitting form twice
    document.querySelectorAll('input[type="text"]').forEach(input => {
      input.addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
          event.preventDefault();
          this.closest('form').submit();
        }
      });
    });
  </script>
</body>
</html>
