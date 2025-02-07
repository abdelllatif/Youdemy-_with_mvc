<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-900 text-white">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white dark:bg-gray-800 shadow-lg">
        <!-- Navigation content here -->
    </nav>

    <main class="pt-20">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <!-- Profile Header -->
            <div class="bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                <div class="flex flex-col md:flex-row items-center md:items-start">
                    <div class="mb-4 md:mb-0 md:mr-6 text-center">
                        <img src="https://via.placeholder.com/150" alt="Profile" class="rounded-full w-24 h-24">
                        <form action="change_photo.php" method="POST" enctype="multipart/form-data" class="mt-2">
                            <label for="profile_photo" class="cursor-pointer text-blue-400 text-sm hover:text-blue-300">Change Photo</label>
                            <input type="file" name="profile_photo" id="profile_photo" class="hidden" accept="image/*">
                            <button type="submit" class="hidden">Submit</button>
                        </form>
                    </div>
                    <div class="text-center md:text-left flex-grow">
                        <h1 class="text-xl font-bold mb-2">John Doe</h1>
                        <p class="text-gray-400 mb-4">Student</p>
                        <div class="flex flex-wrap justify-center md:justify-start gap-2">
                            <div><i class="fas fa-book-reader mr-1"></i><span>5 Courses</span></div>
                            <div><i class="fas fa-certificate mr-1"></i><span>3 Certificates</span></div>
                            <div><i class="fas fa-calendar-alt mr-1"></i><span>Age: 25</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Toggle Buttons -->
            <div class="mb-6">
                <div class="flex space-x-2">
                    <button id="showVideosBtn" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-500 text-sm">Videos</button>
                    <button id="showDocsBtn" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-500 text-sm">Documents</button>
                </div>
            </div>

            <!-- Video Content -->
            <div id="videoContent">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="videoCardsContainer">
                    <!-- Video cards will be dynamically inserted here -->
                </div>
            </div>

            <!-- Document Content -->
            <div id="docContent" class="hidden">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="docCardsContainer">
                    <!-- Document cards will be dynamically inserted here -->
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 border-t border-gray-700 mt-8">
        <!-- Footer content here -->
    </footer>

    <script>
        // Sample Data
        const videos = [
            {
                title: "Introduction to Quantum Physics",
                thumbnail: "https://via.placeholder.com/640x360.png?text=Video+Thumbnail",
                duration: "00:15:30",
                category: "Science",
                tags: ["Quantum", "Physics"],
                teacher: { name: "Dr. Marie Curie", avatar: "https://via.placeholder.com/32" },
                rating: 4.8,
                students: 1250,
                link: "video.php"
            },
            {
                title: "Advanced JavaScript Concepts",
                thumbnail: "https://via.placeholder.com/640x360.png?text=Video+Thumbnail",
                duration: "00:20:45",
                category: "Programming",
                tags: ["JavaScript", "Web Development"],
                teacher: { name: "John Smith", avatar: "https://via.placeholder.com/32" },
                rating: 4.7,
                students: 980,
                link: "video.php"
            }
        ];

        const documents = [
            {
                title: "Business Plan 2024",
                type: "pdf",
                author: "Jane Doe",
                description: "An in-depth business plan outlining strategic goals and projections for the upcoming fiscal year.",
                tags: ["Business", "Strategy"],
                teacher: { name: "Teacher", avatar: "https://via.placeholder.com/40" },
                link: "document.php"
            }
        ];

        // Render Video Cards
        const videoCardsContainer = document.getElementById('videoCardsContainer');
        videos.forEach(video => {
            videoCardsContainer.innerHTML += `
                <article class="course-card bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="${video.thumbnail}" alt="Video Thumbnail" class="w-full h-32 object-cover">
                        <span class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white text-xs px-2 py-1 rounded">${video.duration}</span>
                    </div>
                    <div class="p-3">
                        <h3 class="text-sm font-semibold mb-1 text-white truncate">${video.title}</h3>
                        <div class="flex flex-wrap gap-1 mb-1">
                            <span class="bg-blue-600 text-xs px-2 py-1 rounded">${video.category}</span>
                        </div>
                        <div class="flex flex-wrap gap-1 mb-2">
                            ${video.tags.map(tag => `<span class="bg-green-600 text-xs px-2 py-1 rounded">${tag}</span>`).join('')}
                        </div>
                        <div class="flex items-center mb-2">
                            <img src="${video.teacher.avatar}" alt="Teacher Avatar" class="w-6 h-6 rounded-full mr-2">
                            <span class="text-xs text-gray-400 truncate">${video.teacher.name}</span>
                        </div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                            <span class="ml-1 text-xs text-gray-300">${video.rating}</span>
                            <span class="mx-2 text-gray-400 text-xs">|</span>
                            <span class="text-xs text-gray-400">${video.students} students</span>
                        </div>
                        <div>
                            <a href="${video.link}" class="text-blue-400 text-xs hover:text-blue-300">Join Course →</a>
                        </div>
                    </div>
                </article>
            `;
        });

        // Render Document Cards
        const docCardsContainer = document.getElementById('docCardsContainer');
        documents.forEach(doc => {
            docCardsContainer.innerHTML += `
                <div class="bg-gray-800 rounded-lg shadow-lg transform hover:scale-105 transition duration-300 flex flex-col">
                    <div class="flex items-center p-4 border-b border-gray-700">
                        <i class="fas fa-file-pdf text-4xl text-red-500"></i>
                        <div class="ml-4">
                            <h3 class="text-sm font-bold text-white truncate">${doc.title}</h3>
                            <p class="text-xs text-gray-400">${doc.author}</p>
                        </div>
                    </div>
                    <div class="p-4 flex-grow">
                        <p class="text-gray-300 text-xs mb-4">${doc.description}</p>
                        <div class="flex flex-wrap gap-2">
                            ${doc.tags.map(tag => `<span class="bg-blue-600 text-white text-xs px-2 py-1 rounded-full">${tag}</span>`).join('')}
                        </div>
                    </div>
                    <div class="bg-gray-700 px-4 py-3 flex items-center justify-between mt-auto">
                        <div class="flex items-center">
                            <img src="${doc.teacher.avatar}" alt="Teacher Avatar" class="w-8 h-8 rounded-full mr-2">
                            <span class="text-xs text-gray-300">${doc.teacher.name}</span>
                        </div>
                        <a href="${doc.link}" class="text-blue-400 text-xs hover:text-blue-300">Join Course →</a>
                    </div>
                </div>
            `;
        });

        // Toggle Sections
        document.getElementById('showVideosBtn').addEventListener('click', () => {
            document.getElementById('videoContent').classList.remove('hidden');
            document.getElementById('docContent').classList.add('hidden');
        });

        document.getElementById('showDocsBtn').addEventListener('click', () => {
            document.getElementById('docContent').classList.remove('hidden');
            document.getElementById('videoContent').classList.add('hidden');
        });
    </script>
</body>
</html>