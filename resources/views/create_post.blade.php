<form action="/api/posts" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required><br>

    <label for="content">Content:</label>
    <textarea name="content" id="content" required></textarea><br>

    <button type="submit">Create Post</button>
</form>
