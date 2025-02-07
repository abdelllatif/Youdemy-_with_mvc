<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Teacher Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .course-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .modal {
            display: none;
        }

        .modal.show {
            display: flex;
        }
    </style>
</head>

<body class="bg-gray-900 text-white">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-2">
                        <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 text-transparent bg-clip-text hover:scale-105 transition-transform">Youdemy</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="text-gray-600 hover:text-blue-600">
                            <i class="fas fa-bell"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                        </button>
                    </div>
                    <div class="relative">
                        <button class="flex items-center space-x-2 focus:outline-none">
                            <img src="<?php echo $user['avatar'] ?>" alt="Profile" class="h-8 w-8 rounded-full ring-2 ring-blue-500">
                            <span class="text-gray-700"><?php echo $user['first_name']." ".$user['last_name'] ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="pt-20">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <!-- Profile Header -->
            <div class="bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                <div class="flex flex-col md:flex-row items-center md:items-start">
                    <div class="relative mb-4 md:mb-0 md:mr-6">
                        <img id="profileImage" src="<?php echo $user['avatar'] ?>" alt="Profile" class="rounded-full w-32 h-32">
                    </div>
                    <div class="text-center md:text-left flex-grow">
                        <h1 class="text-2xl font-bold mb-2"><?php echo $user['first_name']." ".$user['last_name'] ?></h1>
                        <p class="text-gray-400 mb-4">Web Development Instructor</p>
                        <div class="flex flex-wrap justify-center md:justify-start gap-4">
                            <div>
                                <i class="fas fa-book-open mr-2"></i>
                                <span>5 Courses</span>
                            </div>
                            <div>
                                <i class="fas fa-user-graduate mr-2"></i>
                                <span>150 Students</span>
                            </div>
                            <div>
                                <i class="fas fa-calendar-alt mr-2"></i>
                                <span>Age: 35</span>
                            </div>
                            <div>
                                <i class="fas fa-envelope mr-2"></i>
                                <span><?php echo $user['email'] ?></span>
                            </div>
                        </div>
                        <button onclick="openPopup()" class="bg-blue-500 text-white px-4 py-2 mt-4">View Enrolled Students</button>
                    </div>
                </div>

                <!-- Popup Modal -->
                <div id="studentPopup" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white  text-black p-6 rounded-lg shadow-lg max-w-md w-full">
                        <h2 class="text-xl font-bold mb-4">Enrolled Students</h2>
                        <ul class="list-disc pl-5">
                            <li>Student 1 (student1@example.com)</li>
                            <li>Student 2 (student2@example.com)</li>
                            <li>Student 3 (student3@example.com)</li>
                        </ul>
                        <button onclick="closePopup()" class="mt-4 bg-red-500 text-white px-4 py-2">Close</button>
                    </div>
                </div>

                <script>
                    function openPopup() {
                        document.getElementById('studentPopup').classList.remove('hidden');
                    }

                    function closePopup() {
                        document.getElementById('studentPopup').classList.add('hidden');
                    }
                </script>
            </div>

            <!-- Detailed Statistics Section -->
            <div class="bg-gray-800 rounded-xl p-6 mb-10">
                <h2 class="text-xl font-bold mb-6">Detailed Statistics</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-400">Video Students</p>
                                <h3 class="text-2xl font-bold">80</h3>
                            </div>
                            <i class="fas fa-users text-3xl text-blue-500"></i>
                        </div>
                    </div>
                    <div class="bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-400">Document Students</p>
                                <h3 class="text-2xl font-bold">70</h3>
                            </div>
                            <i class="fas fa-file-alt text-3xl text-green-500"></i>
                        </div>
                    </div>
                    <div class="bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-400">Total Videos</p>
                                <h3 class="text-2xl font-bold">20</h3>
                            </div>
                            <i class="fas fa-video text-3xl text-purple-500"></i>
                        </div>
                    </div>
                    <div class="bg-gray-700 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-400">Total Documents</p>
                                <h3 class="text-2xl font-bold">15</h3>
                            </div>
                            <i class="fas fa-folder text-3xl text-yellow-500"></i>
                        </div>
                    </div>
                </div>

                <!-- Top Videos Section -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-4">Top 5 Most Popular Videos</h3>
                    <div class="bg-gray-700 rounded-lg p-4">
                        <ul class="space-y-4">
                            <li class="flex justify-between items-center">
                                <span class="text-gray-300">Introduction to Web Development</span>
                                <span class="bg-blue-600 px-3 py-1 rounded-full text-sm">50 students</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-gray-300">Advanced JavaScript Techniques</span>
                                <span class="bg-blue-600 px-3 py-1 rounded-full text-sm">30 students</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-gray-300">Responsive Web Design Basics</span>
                                <span class="bg-blue-600 px-3 py-1 rounded-full text-sm">25 students</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Content Tabs -->
            <div class="flex justify-center space-x-4 mb-8">
                <button id="showVideos" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">Videos</button>
                <button id="showDocuments" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600">Documents</button>
            </div>

            <div id="videosContent">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <article class="course-card bg-gray-800 rounded-xl overflow-hidden">
                        <div class="relative">
                            <img src="path_to_video_thumbnail.jpg" alt="Video thumbnail" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">Sample Video Title</h3>
                            <div class="flex justify-between mt-4">
                                <button onclick="openEditVideoPopup('Sample Video Title', 1)" class="text-yellow-500">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-500">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
                <button id="addNewVideoBtn" onclick="openAddVideoModal()" class="mt-8 px-6 py-3 bg-green-600 text-white rounded hover:bg-green-500">Add New Video</button>
                </div>

            <div id="documentsContent" class="hidden">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <article class="course-card bg-gray-800 rounded-xl overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">Sample Document Title</h3>
                            <div class="flex justify-between mt-4">
                                <button onclick="openEditDocumentPopup('Sample Document Title', 1)" class="text-yellow-500">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-500">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
                <button onclick="openAddDocsModal()" id="addNewDocBtn" class="mt-8 px-6 py-3 bg-green-600 text-white rounded hover:bg-green-500">Add New Document</button>
            </div>
        </div>
    </main>
    
<!-- Add Video Modal -->
<div id="addVideoModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50">
<div class="bg-gray-800 rounded-lg shadow-xl p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Add New Video</h2>
        <button onclick="closeAddVideoModal()" class="closeModal text-gray-400 hover:text-white">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>
    <form id="addVideoForm" class="space-y-6" action="?route=teacher/dashboard/addvedio" method="POST" enctype="multipart/form-data">
        <!-- Basic Information -->
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Video Title</label>
            <input name="title" type="text" class="w-full rounded-md bg-gray-700 border-gray-600 text-white px-4 py-2" required>
        </div>

        <!-- Video Upload -->
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Video File</label>
            <div class="border-2 border-dashed border-gray-600 rounded-lg p-6 text-center">
                <input name="video" type="file" id="videoUpload" accept="video/*" class="hidden">
                <label for="videoUpload" class="cursor-pointer">
                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                    <p class="text-gray-400">Click to upload</p>
                    <p class="text-sm text-gray-500">MP4, MP3 or Ogg (MAX. 800MB)</p>
                </label>
            </div>
        </div>

        <!-- Thumbnail -->
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Thumbnail</label>
            <div class="border-2 border-dashed border-gray-600 rounded-lg p-6 text-center">
                <input name="thumbnail" type="file" id="thumbnailUpload" accept="image/*" class="hidden">
                <label for="thumbnailUpload" class="cursor-pointer">
                    <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                    <p class="text-gray-400">Click to upload thumbnail</p>
                    <p class="text-sm text-gray-500">JPG, PNG or GIF (MAX. 2MB)</p>
                </label>
            </div>
        </div>

        <!-- Categories -->
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Categories</label>
            <div class="flex gap-2">
                <div id="selectcategorie"></div>
                <select name="categorie" id="videoCategorySelect" class="flex-1 rounded-md bg-gray-700 border-gray-600 text-white px-4 py-2">
                <!-- <option value="" disabled selected>Loading categories...</option> -->
                </select>
            </div>
        </div>

        <!-- Tags -->
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Tags</label>
            <div class="flex flex-wrap gap-2 mb-2" id="videoTags"></div>
            <div class="flex gap-2">
            <select name="tags" id="videoTagSelect" class="flex-1 rounded-md bg-gray-700 border-gray-600 text-white px-4 py-2">
                <option value="" disabled selected>Loading tags...</option>
                </select>
                <button type="button" onclick="addTag('video')" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">
                    Add
                </button>
            </div>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full rounded-md bg-gray-700 border-gray-600 text-white px-4 py-2" required></textarea>
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-end gap-3">
            <button type="button" class="closeModal px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-500">
                Cancel
            </button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">
                Upload Video
            </button>
        </div>
    </form>
    </div>
    </div>

    <div id="addDocModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50" >
    <div class="bg-gray-800 rounded-lg shadow-xl p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Add New Document</h2>
            <button onclick="closeAddDocsModal()" class="closeModal text-gray-400 hover:text-white" onclick="closeAddDocModal()">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="addDocForm" class="space-y-6" action="?route=teacher/dashboard/adddocs" method="POST" enctype="multipart/form-data">
            <!-- Document Title -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Document Title</label>
                <input name="document_title" type="text" class="w-full rounded-md bg-gray-700 border-gray-600 text-white px-4 py-2" required>
            </div>

            <!-- Document File -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Document File</label>
                <div class="border-2 border-dashed border-gray-600 rounded-lg p-6 text-center">
                    <input name="document" type="file" id="docUpload" accept=".pdf,.doc,.docx,.xlsx" class="hidden">
                    <label for="docUpload" class="cursor-pointer">
                        <i class="fas fa-file-upload text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-400">Click to upload or drag and drop</p>
                        <p class="text-sm text-gray-500">PDF, DOC, or DOCX (MAX. 50MB)</p>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Categories</label>
                <div class="flex gap-2">
                    <div id="selectcategorieDoc"></div>
                    <select name="categorie" id="docCategorySelect" class="flex-1 rounded-md bg-gray-700 border-gray-600 text-white px-4 py-2">
                        <option value="" disabled selected>Loading categories...</option>
                    </select>
                </div>
            </div>

            <!-- Tags  -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Tags</label>
                <div class="flex flex-wrap gap-2 mb-2" id="docTags"></div>
                <div class="flex gap-2">
                    <select name="tags" id="docTagSelect" class="flex-1 rounded-md bg-gray-700 border-gray-600 text-white px-4 py-2">
                        <option value="" disabled selected>Loading tags...</option>
                    </select>
                    <button type="button" onclick="addTag('doc')" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">
                        Add
                    </button>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end gap-3">
                <button type="button" class="closeModal px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-500" onclick="closeAddDocModal()">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">
                    Upload Document
                </button>
            </div>
        </form>
    </div>
</div>

    <!-- Edit Video Modal -->
    <div id="editVideoModal" class="modal fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-gray-800 rounded-lg shadow-xl p-6 w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4">Edit Video</h2>
            <form id="editVideoForm">
                <label class="block text-sm font-medium text-gray-300 mb-2">Video Title</label>
                <input type="text" id="editVideoTitle" class="w-full rounded-md bg-gray-700 border-gray-600 text-white px-4 py-2" required>
                <div class="flex justify-end mt-4">
                    <button type="button" class="closeModal px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-500">Cancel</button>
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Document Modal -->
    <div id="editDocModal" class="modal fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-gray-800 rounded-lg shadow-xl p-6 w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4">Edit Document</h2>
            <form id="editDocForm">
                <label class="block text-sm font-medium text-gray-300 mb-2">Document Title</label>
                <input type="text" id="editDocTitle" class="w-full rounded-md bg-gray-700 border-gray-600 text-white px-4 py-2" required>
                <div class="flex justify-end mt-4">
                    <button type="button" class="closeModal px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-500">Cancel</button>
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">Save Changes</button>
                </div>
            </form>
        </div>
    </div>



    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const showVideosBtn = document.getElementById('showVideos');
            const showDocsBtn = document.getElementById('showDocuments');
            const videosContent = document.getElementById('videosContent');
            const documentsContent = document.getElementById('documentsContent');

            showVideosBtn.addEventListener('click', () => {
                videosContent.classList.remove('hidden');
                documentsContent.classList.add('hidden');
            });

            showDocsBtn.addEventListener('click', () => {
                documentsContent.classList.remove('hidden');
                videosContent.classList.add('hidden');
            });
        });

        function openEditVideoPopup(title, id) {
            document.getElementById('editVideoTitle').value = title;
            document.getElementById('editVideoModal').classList.remove('hidden');
        }

        function openEditDocumentPopup(title, id) {
            document.getElementById('editDocTitle').value = title;
            document.getElementById('editDocModal').classList.remove('hidden');
        }

        document.querySelectorAll('.closeModal').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('editVideoModal').classList.add('hidden');
                document.getElementById('editDocModal').classList.add('hidden');
            });



  });
     // Update this to match the correct modal ID for add video modal
     function openAddVideoModal() {
            document.getElementById('addVideoModal').classList.remove('hidden');
            document.getElementById('addVideoModal').classList.add('flex');
        }

        function closeAddVideoModal() {
            document.getElementById('addVideoModal').classList.add('hidden');
            document.getElementById('addVideoModal').classList.remove('flex');
        }
        function openAddDocsModal() {
            document.getElementById('addDocModal').classList.remove('hidden');
            document.getElementById('addDocModal').classList.add('flex');
        }

        function closeAddDocsModal() {
            document.getElementById('addDocModal').classList.add('hidden');
            document.getElementById('addDocModal').classList.remove('flex');
        }
        document.addEventListener("DOMContentLoaded", function () {
    fetchCategories('video');
    fetchCategories('doc');
    fetchTags('video');
    fetchTags('doc');
});

function fetchCategories(type) {
    fetch('?route=admin/dashboard/get_categories')
        .then(response => response.json())
        .then(categories => {
            let categorySelect = document.getElementById(`${type}CategorySelect`);
            categorySelect.innerHTML = '<option value="" disabled selected>Select category</option>';

            categories.forEach(category => {
                let option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                categorySelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching categories:', error));
}

function fetchTags(type) {
    fetch('http://localhost/youdemy%20with%20mvc/public/?route=admin/dashboard/get_tags')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(responseData => {
            let tagSelect = document.getElementById(`${type}TagSelect`);
            tagSelect.innerHTML = '<option value="" disabled selected>Select tag</option>';

            // Check if responseData is an array; if not, try responseData.data
            const tags = Array.isArray(responseData) ? responseData : responseData.data || [];
            
            tags.forEach(tag => {
                let option = document.createElement('option');
                option.value = tag.id;
                option.textContent = tag.name;
                tagSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error fetching tags:', error);
            let tagSelect = document.getElementById(`${type}TagSelect`);
            tagSelect.innerHTML = '<option value="" disabled selected>Error loading tags</option>';
        });
}

function addTag(type) {
    const tagSelect = document.getElementById(`${type}TagSelect`);
    const selectedTags = Array.from(tagSelect.selectedOptions).map(option => option.text);
    const tagsContainer = document.getElementById(`${type}Tags`);

    selectedTags.forEach(tag => {
        if (!tagsContainer.textContent.includes(tag)) {
            const tagBadge = document.createElement('span');
            tagBadge.className = 'bg-green-500 text-white px-2 py-1 rounded-full text-sm';
            tagBadge.textContent = tag;
            tagsContainer.appendChild(tagBadge);
        }
    });
}


    </script>
</body>

</html>