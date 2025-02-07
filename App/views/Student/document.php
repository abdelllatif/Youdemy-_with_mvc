<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document Details - Youdemy</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
      animation: fadeIn 0.3s ease-out forwards;
    }
    .download-progress {
      width: 0%;
      transition: width 0.3s ease;
    }
    .description {
      white-space: pre-line;
    }
  </style>
</head>
<body class="bg-gray-900 text-white min-h-screen">
  <!-- Navigation -->
  <nav class="bg-gray-800 shadow-lg mb-8">
    <div class="max-w-7xl mx-auto px-4 py-4">
      <div class="flex justify-between items-center">
        <h1 class="text-xl font-bold">Document Platform</h1>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Document Details Card -->
    <div class="bg-gray-800 rounded-xl shadow-xl p-6 mb-8 animate-fade-in">
      <div class="flex flex-col md:flex-row">
        <!-- Left Column: Icon and Actions -->
        <div class="md:w-1/4 mb-6 md:mb-0">
          <div class="bg-gray-700 p-8 rounded-xl flex flex-col items-center">
            <!-- Replace these icons as needed based on the file extension -->
            <!-- For example, here we assume a PDF document -->
            <i class="fas fa-file-pdf text-red-500 text-6xl mb-4"></i>
            <!-- When user is logged in as student -->
            <a href="https://example.com/path/to/sample-document.pdf" target="_blank"
               class="mt-4 w-full bg-green-600 hover:bg-green-500 text-white py-2 px-4 rounded-lg flex items-center justify-center transition-colors">
              <i class="fas fa-eye mr-2"></i>
              <span>View</span>
            </a>
            <button onclick="downloadDocument()"
                    id="downloadBtn"
                    class="w-full bg-blue-600 hover:bg-blue-500 text-white py-2 px-4 rounded-lg flex items-center justify-center transition-colors mt-2">
              <i class="fas fa-download mr-2"></i>
              <span>Download</span>
            </button>
            <!-- Download Progress Bar -->
            <div id="downloadProgress" class="w-full mt-4 hidden">
              <div class="w-full bg-gray-600 rounded-full h-2">
                <div id="progressBar" class="download-progress bg-blue-500 h-2 rounded-full"></div>
              </div>
              <div class="text-center mt-2 text-sm text-gray-400">
                <span id="progressText">0%</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Right Column: Document Info -->
        <div class="md:w-3/4 md:pl-8">
          <h1 class="text-3xl font-bold mb-4">Sample Document Title</h1>
          <div class="flex flex-wrap gap-4 mb-6">
            <div class="flex items-center text-gray-400">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>Updated: Aug 15, 2024</span>
            </div>
            <div class="flex items-center text-gray-400">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>Created: Jul 01, 2024</span>
            </div>
            <div class="flex items-center text-gray-400">
              <img src="https://via.placeholder.com/40" alt="Teacher Avatar" class="w-10 h-10 rounded-full mr-2">
              <span>Teacher: Jane Doe</span>
            </div>
          </div>

          <!-- Categories -->
          <div class="mb-6">
            <h2 class="text-xl font-semibold mb-3">Categories</h2>
            <div class="flex flex-wrap gap-2">
              <span class="bg-blue-600 px-3 py-1 rounded-full text-sm">Business</span>
              <span class="bg-blue-600 px-3 py-1 rounded-full text-sm">Strategy</span>
            </div>
          </div>

          <!-- Tags -->
          <div class="mb-6">
            <h2 class="text-xl font-semibold mb-3">Tags</h2>
            <div class="flex flex-wrap gap-2">
              <span class="bg-blue-600 px-3 py-1 rounded-full text-sm">Plan</span>
              <span class="bg-blue-600 px-3 py-1 rounded-full text-sm">2024</span>
            </div>
          </div>

          <!-- Description -->
          <div class="mb-6">
            <h2 class="text-xl font-semibold mb-3">Description</h2>
            <p class="text-gray-300 leading-relaxed description">
              This is a sample document description.
              It explains the contents and purpose of the document.
              It can span multiple lines.
            </p>
          </div>

          <!-- Learning Objectives -->
          <div>
            <h2 class="text-xl font-semibold mb-3">Learning Objectives</h2>
            <ul class="space-y-2">
              <li class="flex items-center text-gray-300">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Understand the basics of business planning.
              </li>
              <li class="flex items-center text-gray-300">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Learn strategies for growth and sustainability.
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function downloadDocument() {
      const downloadBtn = document.getElementById('downloadBtn');
      const downloadProgress = document.getElementById('downloadProgress');
      const progressBar = document.getElementById('progressBar');
      const progressText = document.getElementById('progressText');

      downloadBtn.disabled = true;
      downloadBtn.classList.add('opacity-50');
      downloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Downloading...';

      downloadProgress.classList.remove('hidden');

      let progress = 0;
      const interval = setInterval(() => {
        progress += Math.random() * 30;
        if (progress > 100) progress = 100;
        progressBar.style.width = `${progress}%`;
        progressText.textContent = `${Math.round(progress)}%`;

        if (progress === 100) {
          clearInterval(interval);
          setTimeout(() => {
            // Simulate download by creating a temporary link element
            const link = document.createElement('a');
            link.href = 'https://example.com/path/to/sample-document.pdf';
            link.download = 'Sample Document.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            downloadBtn.disabled = false;
            downloadBtn.classList.remove('opacity-50');
            downloadBtn.innerHTML = '<i class="fas fa-download mr-2"></i>Download';
            downloadProgress.classList.add('hidden');
          }, 500);
        }
      }, 500);
    }

    // Dark Mode Toggle Example
    function toggleDarkMode() {
      document.documentElement.classList.toggle('dark');
      const isDark = document.documentElement.classList.contains('dark');
      localStorage.setItem('darkMode', isDark);
    }
    if (localStorage.getItem('darkMode') === 'true' ||
      (window.matchMedia('(prefers-color-scheme: dark)').matches && !localStorage.getItem('darkMode'))) {
      document.documentElement.classList.add('dark');
    }
  </script>
</body>
</html>
