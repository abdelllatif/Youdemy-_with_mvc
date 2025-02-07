<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="flex min-h-screen">
        <div class="bg-white w-64">
            <div class="flex items-center justify-center mt-10">
                <span class="text-2xl font-bold">Youdemy Admin</span>
            </div>
            <nav class="mt-10">
                <a href="#" class="flex items-center px-6 py-2 text-gray-600 hover:bg-gray-200" onclick="showSection('dashboard');">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-6 py-2 mt-4 text-gray-600 hover:bg-gray-200" onclick="showSection('teachers');">
                    <i class="fas fa-chalkboard-teacher mr-3"></i>
                    Teachers
                </a>
                <a href="#" class="flex items-center px-6 py-2 mt-4 text-gray-600 hover:bg-gray-200" onclick="showSection('users');">
                    <i class="fas fa-users mr-3"></i>
                    Users
                </a>
                <a href="#" class="flex items-center px-6 py-2 mt-4 text-gray-600 hover:bg-gray-200" onclick="showSection('courses');">
                    <i class="fas fa-book mr-3"></i>
                    Courses
                </a>
                <a href="#" class="flex items-center px-6 py-2 mt-4 text-gray-600 hover:bg-gray-200" onclick="showSection('categories');fetchcategorie();">
                    <i class="fas fa-list-alt mr-3"></i>
                    Categories
                </a>
                <a href="#" class="flex items-center px-6 py-2 mt-4 text-gray-600 hover:bg-gray-200" onclick="fetchTags(); showSection('tags');">
                <i class="fas fa-tags mr-3"></i>
                Tags
                </a>
                <a href="#" class="flex items-center px-6 py-2 mt-4 text-gray-600 hover:bg-gray-200" onclick="showSection('statistics');">
                    <i class="fas fa-chart-bar mr-3"></i>
                    Statistics
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 bg-gray-100">
            <div class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-200">
                <h1 class="text-xl font-semibold">Dashboard</h1>
                <div class="flex items-center">
                    <button class="p-2 rounded-full hover:bg-gray-100">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                    </button>
                    <div class="relative">
                        <button class="flex items-center space-x-2">
                            <img src="/api/placeholder/32/32" alt="Profile" class="h-8 w-8 rounded-full">
                            <span>Admin</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-8">

                <!-- Dashboard Section -->
                <div id="dashboard" class="section">
                    <h2 class="text-2xl font-bold text-gray-700 mb-4">Dashboard</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold">Total Courses</h3>
                            <p class="text-2xl font-bold">120</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold">Total Users</h3>
                            <p class="text-2xl font-bold">540</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold">Top Instructor</h3>
                            <p class="text-2xl font-bold">John Doe</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold">Top Course</h3>
                            <p class="text-2xl font-bold">Python Bootcamp</p>
                        </div>
                    </div>
                </div>

                <!-- Users Section -->
                <div id="users" class="section hidden">
                    <h2 class="text-2xl font-bold text-gray-700 mb-4">User Management</h2>
                    <table class="min-w-full bg-white rounded-lg shadow-lg">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4">Name</th>
                                <th class="py-2 px-4">Email</th>
                                <th class="py-2 px-4">Role</th>
                                <th class="py-2 px-4">Status</th>
                                <th class="py-2 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray">
                                <td class="py-2 px-4">Jane Smith</td>
                                <td class="py-2 px-4">jane@example.com</td>
                                <td class="py-2 px-4">Admin</td>
                                <td class="py-2 px-4">Active</td>
                                <td class="py-2 px-4">
                                    <button class="text-red-600 hover:text-red-900">Suspend</button>
                                </td>
                            </tr>
                            <tr class="border-b border-gray">
                                <td class="py-2 px-4">John Doe</td>
                                <td class="py-2 px-4">john@example.com</td>
                                <td class="py-2 px-4">User</td>
                                <td class="py-2 px-4">Suspended</td>
                                <td class="py-2 px-4">
                                    <button class="text-green-600 hover:text-green-900">Activate</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

               <!-- Teachers Section -->
<div id="teachers" class="section hidden">
    <h2 class="text-2xl font-bold text-gray-700 mb-4">Teacher Management</h2>
    
    <!-- Tabs -->
    <div class="flex space-x-4 mb-6">
        <button onclick="switchTeacherTab('accepted')" id="acceptedTab" class="px-6 py-2 font-medium rounded-lg bg-green-100 text-green-600">
            Accepted Teachers
        </button>
        <button onclick="switchTeacherTab('pending')" id="pendingTab" class="px-6 py-2 font-medium rounded-lg bg-gray-100 text-gray-600">
            Pending Approval
            <span class="ml-2 px-2 py-1 text-xs rounded-full bg-red-500 text-white">2</span>
        </button>
    </div>

    <!-- Accepted Teachers Table -->
    <div id="acceptedTeachers" class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray">
                    <td class="py-2 px-4">Michael Johnson</td>
                    <td class="py-2 px-4">michael@example.com</td>
                    <td class="py-2 px-4">
                        <span class="px-2 py-1 text-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full">Active</span>
                    </td>
                    <td class="py-2 px-4">
                        <button class="text-red-600 hover:text-red-900">Suspend</button>
                    </td>
                </tr>
                <tr class="border-b border-gray">
                    <td class="py-2 px-4">Sara Connor</td>
                    <td class="py-2 px-4">sara@example.com</td>
                    <td class="py-2 px-4">
                        <span class="px-2 py-1 text-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full">Active</span>
                    </td>
                    <td class="py-2 px-4">
                        <button class="text-red-600 hover:text-red-900">Suspend</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pending Teachers Table -->
    <div id="pendingTeachers" class="overflow-x-auto hidden">
        <table class="min-w-full bg-white rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Specialization</th>
                    <th class="py-2 px-4">Join Date</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray">
                    <td class="py-2 px-4">John Doe</td>
                    <td class="py-2 px-4">john@example.com</td>
                    <td class="py-2 px-4">Web Development</td>
                    <td class="py-2 px-4">2023-01-15</td>
                    <td class="py-2 px-4">
                        <button class="text-green-600 hover:text-green-900 mr-2">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
                <tr class="border-b border-gray">
                    <td class="py-2 px-4">Jane Smith</td>
                    <td class="py-2 px-4">jane@example.com</td>
                    <td class="py-2 px-4">Data Science</td>
                    <td class="py-2 px-4">2023-02-20</td>
                    <td class="py-2 px-4">
                        <button class="text-green-600 hover:text-green-900 mr-2">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

                <!-- Courses Section -->
                <div id="courses" class="section hidden">
                    <div class="mb-6">
                    <button onclick="showContent('videos')" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">Show Videos</button>
                    <button onclick="showContent('documents')" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500 ml-4">Show Documents</button>
                 </div>

                    <!-- Videos Section -->
                    <div id="videos" class="content-section ">
                        <h2 class="text-2xl font-bold text-gray-700 mb-4">Videos</h2>
                        <table class="min-w-full bg-white rounded-lg shadow-lg">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="py-2 px-4">Title</th>
                                    <th class="py-2 px-4">Category</th>
                                    <th class="py-2 px-4">Instructor</th>
                                    <th class="py-2 px-4">Enrollments</th>
                                    <th class="py-2 px-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray">
                                    <td class="py-2 px-4">Python Bootcamp</td>
                                    <td class="py-2 px-4">Programming</td>
                                    <td class="py-2 px-4">Michael Johnson</td>
                                    <td class="py-2 px-4">200</td>
                                    <td class="py-2 px-4"><button class="text-red-600 hover:text-red-900">Suspend</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Documents Section -->
                    <div id="documents" class="content-section hidden">
                        <h2 class="text-2xl font-bold text-gray-700 mb-4">Documents</h2>
                        <table class="min-w-full bg-white rounded-lg shadow-lg">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="py-2 px-4">Title</th>
                                    <th class="py-2 px-4">Category</th>
                                    <th class="py-2 px-4">Instructor</th>
                                    <th class="py-2 px-4">Enrollments</th>
                                    <th class="py-2 px-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray">
                                    <td class="py-2 px-4">Design Document</td>
                                    <td class="py-2 px-4">Design</td>
                                    <td class="py-2 px-4">Sara Connor</td>
                                    <td class="py-2 px-4">150</td>
                                    <td class="py-2 px-4"><button class="text-red-600 hover:text-red-900">Suspend</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Categories Section -->
                <div id="categories" class="section hidden">
                    <h2 class="text-2xl font-bold text-gray-700 mb-4">Manage Categories</h2>
                    <form action="?route=admin/dashboard/addcategorie" method="POST">
                        <div class="flex gap-2 mb-4">
                            <input name="categorie[]" type="text" class="flex-1 rounded-md bg-gray-300 border-gray-600 px-4 py-2" placeholder="Category Name" required>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">Add</button>
                        </div>
                    </form>
                    <h3 class="text-lg font-semibold mb-2">Existing Categories</h3>
                    <ul id="categories-list" class="bg-white p-4 rounded shadow">
                    <!--categories-->
                </ul>
                </div>

                <!-- Tags Section -->
                <div id="tags" class="section hidden">
                <h2 class="text-2xl font-bold text-gray-700 mb-4">Manage Tags</h2>
                <form action="?route=admin/dashboard/addtags" method="POST">
                <div class="flex gap-2 mb-4">
                <input type="text" name="tags[]" class="flex-1 rounded-md bg-gray-300 border-gray-600 px-4 py-2" placeholder="Tag Name" required>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">Add</button>
                </div>
                </form>
                <h3 class="text-lg font-semibold mb-2">Existing Tags</h3>
                <ul id="tagsList" class="bg-white p-4 rounded shadow">
                    <!-- Tags  -->
                </ul>
                </div>

                <!-- Statistics Section -->
                <div id="statistics" class="section hidden">
                    <h2 class="text-2xl font-bold text-gray-700 mb-4">Statistics</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold">Total Courses</h3>
                            <p class="text-2xl font-bold">120</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold">Total Users</h3>
                            <p class="text-2xl font-bold">540</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold">Top Instructor</h3>
                            <p class="text-2xl font-bold">John Doe</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold">Top Course</h3>
                            <p class="text-2xl font-bold">Python Bootcamp</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');
        }

        function showContent(contentType) {
        const videos = document.getElementById('videos');
        const documents = document.getElementById('documents');

        if (contentType === 'videos') {
            videos.classList.remove('hidden');
            documents.classList.add('hidden');
        } else if (contentType === 'documents') {
            videos.classList.add('hidden');
            documents.classList.remove('hidden');
        }
    }

    // Optional: Show a specific section by default
    document.addEventListener('DOMContentLoaded', function() {
        showSection('dashboard');
        showContent('videos'); // Show videos by default
    });

    function switchTeacherTab(tab) {
        const acceptedTeachers = document.getElementById('acceptedTeachers');
        const pendingTeachers = document.getElementById('pendingTeachers');
        const acceptedTab = document.getElementById('acceptedTab');
        const pendingTab = document.getElementById('pendingTab');

        if (tab === 'accepted') {
            acceptedTeachers.classList.remove('hidden');
            pendingTeachers.classList.add('hidden');
            acceptedTab.classList.add('bg-green-100', 'text-green-600');
            acceptedTab.classList.remove('bg-gray-100', 'text-gray-600');
            pendingTab.classList.remove('bg-green-100', 'text-green-600');
            pendingTab.classList.add('bg-gray-100', 'text-gray-600');
        } else {
            acceptedTeachers.classList.add('hidden');
            pendingTeachers.classList.remove('hidden');
            pendingTab.classList.add('bg-green-100', 'text-green-600');
            pendingTab.classList.remove('bg-gray-100', 'text-gray-600');
            acceptedTab.classList.remove('bg-green-100', 'text-green-600');
            acceptedTab.classList.add('bg-gray-100', 'text-gray-600');
        }
    }
    function fetchTags() {
    console.log("Starting fetchTags...");

    fetch('http://localhost/youdemy%20with%20mvc/public/?route=admin/dashboard/get_tags') // adjust URL as needed
        .then(response => response.json())
        .then(data => {
            console.log('Fetched Data:', data);

            // Since your endpoint returns an array, ensure we work with it directly
            const tags = Array.isArray(data) ? data : data.data;
            console.log('Tags Array:', tags);

            const tagsList = document.getElementById('tagsList');
            if (!tagsList) {
                console.error('Element with id "tagsList" not found.');
                return;
            }
            tagsList.innerHTML = ''; // Clear existing tags

            if (tags.length > 0) {
                tags.forEach(tag => {
                    const li = document.createElement('li');
                    li.className = 'flex justify-between mb-2';
                    li.innerHTML = `
                        <span>${tag.name}</span>
                        <button class="text-red-600 hover:text-red-900" onclick="deleteTag(${tag.id})">Delete</button>
                    `;
                    tagsList.appendChild(li);
                });
            } else {
                tagsList.innerHTML = '<p>No tags found.</p>';
            }
        })
        .catch(error => console.error('Error fetching tags:', error));
}

function fetchcategorie() {
    fetch('?route=admin/dashboard/get_categories')
        .then(response => response.json())
        .then(data => {
            const categorieList = document.getElementById('categories-list');
            categorieList.innerHTML = '';

            if (data.length > 0) {
                data.forEach(categorie => {
                    const li = document.createElement('li');
                    li.className = 'flex justify-between mb-2';
                    li.innerHTML = `
                        <span>${categorie.name}</span>
                        <button class="text-red-600 hover:text-red-900" onclick="deleteTag(${categorie.id})">Delete</button>
                    `;
                    categorieList.appendChild(li);
                });
            } else {
                const p = document.createElement('p');
                p.textContent = 'No categorie found.';
                categorieList.appendChild(p);
            }
        })
        .catch(error => console.error('Error fetching categorie:', error));
}

    </script>
</body>

</html>