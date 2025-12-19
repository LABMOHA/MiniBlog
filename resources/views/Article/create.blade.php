<!DOCTYPE html>
<html lang="en" data-theme="lofi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen p-8">

    <div class="max-w-2xl mx-auto bg-base-100 p-8 rounded-xl shadow-xl">
        <h1 class="text-2xl font-bold mb-6">Write a New Article</h1>

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf <div class="form-control w-full mb-4">
                <label class="label"><span class="label-text">Title</span></label>
                <input type="text" name="title" placeholder="Article Title" class="input input-bordered w-full" required />
            </div>

            <div class="form-control w-full mb-6">
                <label class="label"><span class="label-text">Content</span></label>
                <textarea name="content" class="textarea textarea-bordered h-32" placeholder="Write something..." required></textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="btn btn-primary">Save Article</button>
                <a href="/" class="btn btn-ghost">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>