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
        <div class="hidden md:flex flex-1 items-center justify-center px-6">
        <form action="?route=course/vedios" method="POST" class="w-full max-w-lg relative">
            <input type="text" name="search_term" class="w-full dark-transition bg-gray-100 dark:bg-gray-700 rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-white" placeholder="Search for courses..." />
            <button type="submit" class="absolute right-3 top-3 text-gray-400">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>
      </div>
      <?php
if (!isset($results) || empty($results)) {
  echo "<p class='text-center text-gray-500'>No courses available.</p>";
} else {
  echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">';
  foreach ($results as $course) {
      ?>
      <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 flex flex-col overflow-hidden">
          <img src="<?= htmlspecialchars($course['thumbnail_path']); ?>" alt="Thumbnail" class="w-full h-40 object-cover">
          <div class="p-4 flex-grow">
              <h3 class="text-lg font-semibold text-gray-800 dark:text-white truncate"><?= htmlspecialchars($course['video_title']); ?></h3>
              <p class="text-sm text-gray-600 dark:text-gray-400"><?= htmlspecialchars($course['teacher_last_name'] . " " . $course['teacher_first_name']); ?></p>
              <span class="mt-2 inline-block bg-blue-600 text-white text-xs px-3 py-1 rounded-full"><?= htmlspecialchars($course['categorie']); ?></span>
          </div>
          <div class="flex items-center justify-between bg-gray-100 dark:bg-gray-700 px-4 py-3">
              <div class="flex items-center space-x-2">
                  <img src="<?= htmlspecialchars($course['avatar'] ?? 'default-avatar.png'); ?>" class="w-8 h-8 rounded-full">
                  <span class="text-sm text-gray-700 dark:text-gray-300"><?= htmlspecialchars($course['teacher_first_name']); ?></span>
              </div>
              <a href="#" class="text-blue-500 text-sm font-medium hover:underline">View Course</a>
          </div>
      </div>
      <?php
  }
  echo '</div>';
}

?>

<!-- Pagination -->
<div class="mt-12 flex justify-center">
    <nav class="flex items-center space-x-2">
        <?php
        // Pagination links
        $currentRoute = $_GET['route'] ?? 'course/vedios';
        $queryString = $term ? "&term=" . urlencode($term) : "";

        // Previous page button
        if ($page > 1) {
            echo '<a href="?route=' . $currentRoute . '&page=' . ($page - 1) . $queryString . '" class="p-2 rounded-lg border text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-200"><i class="fas fa-chevron-left"></i> Previous</a>';
        } else {
            echo '<span class="p-2 rounded-lg border text-gray-500 dark:text-gray-400 opacity-50 cursor-not-allowed"><i class="fas fa-chevron-left"></i> Previous</span>';
        }

        // Page numbers
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $page) {
                echo '<span class="px-4 py-2 rounded-lg bg-blue-600 text-white">' . $i . '</span>';
            } else {
                echo '<a href="?route=' . $currentRoute . '&page=' . $i . $queryString . '" class="px-4 py-2 rounded-lg border text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-200">' . $i . '</a>';
            }
        }

        // Next page button
        if ($page < $totalPages) {
            echo '<a href="?route=' . $currentRoute . '&page=' . ($page + 1) . $queryString . '" class="p-2 rounded-lg border text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-200">Next <i class="fas fa-chevron-right"></i></a>';
        } else {
            echo '<span class="p-2 rounded-lg border text-gray-500 dark:text-gray-400 opacity-50 cursor-not-allowed">Next <i class="fas fa-chevron-right"></i></span>';
        }
        ?>
    </nav>
</div>

<!-- عرض عدد النتائج -->
<div class="text-center mt-4 text-sm text-gray-600 dark:text-gray-400">
    Showing page <?= $page; ?> of <?= $totalPages; ?> (<?= $totalResults; ?> total courses)
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
//     document.addEventListener('DOMContentLoaded', function() {
//     fetchVideos();
// });

// function fetchCourses() {
//     fetch('http://localhost/youdemy%20with%20mvc/public/?route=course/vedios', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded'
//         },
//         body: 'page=1&perPage=10'  // You can dynamically set these parameters if needed
//     })
//     .then(response => {
//         if (!response.ok) {
//             throw new Error('Network response was not ok');
//         }
//         return response.json();
//     })
//     .then(responseData => {
//         // This assumes the responseData has a 'data' array and possibly pagination info
//         displayCourses(responseData.data);
//     })
//     .catch(error => {
//         console.error('Error fetching courses:', error);
//     });
// }

function displayCourses(courses) {
    const courseGrid = document.getElementById('courseGrid');  // Your grid container
    courseGrid.innerHTML = '';  // Clear any existing courses

    // Loop through the courses and generate HTML for each
    courses.forEach(course => {
        const videoCard = `
            <article class="course-card bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="relative">
                    <img src="http://localhost/youdemy/public/views/Uploads/${course.thumbnail_path.split('\\').pop()}" alt="Video Thumbnail" class="w-full h-40 object-cover">
                </div>
                <div class="p-3">
                    <h3 class="text-md font-semibold mb-1 text-white truncate">${course.video_title}</h3>
                    <div class="flex flex-wrap gap-1 mb-1">
                        <span class="bg-blue-600 text-xs px-2 py-1 rounded">${course.categorie}</span>
                    </div>
                    <div class="flex flex-wrap gap-1 mb-2">
                        ${course.tags ? course.tags.split(',').map(tag => `<span class="bg-green-600 text-xs px-2 py-1 rounded">${tag}</span>`).join(' ') : ''}
                    </div>
                    <div class="flex items-center mb-2">
                        <img src="https://via.placeholder.com/32" alt="Teacher Avatar" class="w-6 h-6 rounded-full mr-2">
                        <span class="text-xs text-gray-400 truncate">${course.teacher_first_name} ${course.teacher_last_name}</span>
                    </div>
                    <div>
                        <a href="video.php?id=${course.video_id}" class="text-blue-400 text-xs hover:text-blue-300">Join Course →</a>
                    </div>
                </div>
            </article>
        `;
        courseGrid.innerHTML += videoCard;
    });
}

// Call the function when the page loads
document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[name="search_term"]');
        const searchForm = searchInput.closest('form');

        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent the default form submission
                searchForm.submit(); // Submit the form
            }
        });
    });
  </script>
</body>
</html>
