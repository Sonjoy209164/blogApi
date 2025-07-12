<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Testing Interface</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2 {
            color: #4A90E2;
            text-align: center;
        }

        h2 {
            margin-top: 40px;
        }

        /* Form styling */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input:focus, .form-group textarea:focus {
            border-color: #4A90E2;
            outline: none;
        }

        button {
            background-color: #4A90E2;
            color: #fff;
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #357ABD;
        }

        /* Response area */
        #response {
            margin-top: 30px;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            word-wrap: break-word;
        }

        /* Section styling */
        .api-section {
            margin-bottom: 40px;
        }

        .api-section .section-title {
            background-color: #E1F5FE;
            color: #0277BD;
            padding: 12px;
            border-radius: 4px;
            font-weight: 500;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                margin: 20px auto;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>API Testing Interface</h1>

    <!-- Create Post Section -->
    <div class="api-section">
        <h2 class="section-title">Create Post</h2>
        <div class="form-group">
            <input type="text" id="postTitle" placeholder="Enter Post Title" required>
        </div>
        <div class="form-group">
            <textarea id="postContent" placeholder="Enter Post Content" required></textarea>
        </div>
        <button onclick="createPost()">Create Post</button>
    </div>

    <!-- View Post Section -->
    <div class="api-section">
        <h2 class="section-title">View Post</h2>
        <div class="form-group">
            <input type="number" id="postId" placeholder="Enter Post ID" required>
        </div>
        <button onclick="viewPost()">View Post</button>
    </div>

    <!-- List Posts Section -->
    <div class="api-section">
        <h2 class="section-title">List All Posts</h2>
        <button onclick="listPosts()">Get All Posts</button>
    </div>

    <!-- User Registration Section -->
    <div class="api-section">
        <h2 class="section-title">Register User</h2>
        <div class="form-group">
            <input type="text" id="userName" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <input type="email" id="userEmail" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <input type="password" id="userPassword" placeholder="Enter Password" required>
        </div>
        <button onclick="registerUser()">Register User</button>
    </div>

    <!-- Task Management Section -->
    <div class="api-section">
        <h2 class="section-title">Manage Tasks</h2>
        <div class="form-group">
            <input type="text" id="taskTitle" placeholder="Enter Task Title" required>
        </div>
        <button onclick="createTask()">Create Task</button>

        <div class="form-group">
            <input type="number" id="taskId" placeholder="Enter Task ID" required>
        </div>
        <button onclick="completeTask()">Mark Task as Completed</button>

        <button onclick="getPendingTasks()">Get Pending Tasks</button>
    </div>

    <!-- Response Area -->
    <div id="response"></div>

</div>

<script>
    const apiUrl = 'http://127.0.0.1:8000/api';  // Replace with your API URL if different

    // Create Post
    async function createPost() {
        const title = document.getElementById('postTitle').value;
        const content = document.getElementById('postContent').value;

        const response = await fetch(`${apiUrl}/posts`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ title, content })
        });

        const data = await response.json();
        document.getElementById('response').innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
    }

    // View Post by ID
    async function viewPost() {
        const id = document.getElementById('postId').value;

        const response = await fetch(`${apiUrl}/posts/${id}`);
        const data = await response.json();
        document.getElementById('response').innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
    }

    // List All Posts
    async function listPosts() {
        const response = await fetch(`${apiUrl}/posts`);
        const data = await response.json();
        document.getElementById('response').innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
    }

    // Register User
    async function registerUser() {
        const name = document.getElementById('userName').value;
        const email = document.getElementById('userEmail').value;
        const password = document.getElementById('userPassword').value;

        const response = await fetch(`${apiUrl}/register`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name, email, password })
        });

        const data = await response.json();
        document.getElementById('response').innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
    }

    // Create Task
    async function createTask() {
        const title = document.getElementById('taskTitle').value;

        const response = await fetch(`${apiUrl}/tasks`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ title })
        });

        const data = await response.json();
        document.getElementById('response').innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
    }

    // Mark Task as Completed
    async function completeTask() {
        const id = document.getElementById('taskId').value;

        const response = await fetch(`${apiUrl}/tasks/${id}`, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ is_completed: true })
        });

        const data = await response.json();
        document.getElementById('response').innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
    }

    // Get Pending Tasks
    async function getPendingTasks() {
        const response = await fetch(`${apiUrl}/tasks/pending`);
        const data = await response.json();
        document.getElementById('response').innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
    }
</script>
</body>
</html>
