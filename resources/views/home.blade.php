<!DOCTYPE html>
<html lang="en" data-theme="lofi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniBlog - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col bg-base-200 font-sans">

    <nav class="navbar bg-base-100 shadow-sm sticky top-0 z-50">
        <div class="navbar-start">
            <a href="/" class="btn btn-ghost text-xl">📝 MiniBlog</a>
        </div>
        <div class="navbar-end gap-2">
            <a href="/articles/create" class="btn btn-primary btn-sm">Create Article</a>
        </div>
    </nav>

    <main class="flex-1 container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Latest Posts</h1>

        <div class="max-w-3xl mx-auto space-y-6">

            @forelse ($articles as $article)
                <div class="card bg-base-100 shadow-xl bg-green-100">
                    <div class="card-body">
                        <div class="card-actions justify-end mt-4 items-center gap-2">
    <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning btn-xs">Edit</a>

    <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-error btn-xs">Delete</button>
    </form>
</div>
                        <h2 class="card-title text-2xl text-red-300">
                            {{ $article->title }}
                        </h2>
                        
                        
                        <div class="text-xs text-gray-500 mb-2">
                            Written by: <span class="font-bold">{{ $article->user->name ?? 'Anonymous' }}</span>
                        </div>

                        <p class="text-gray-700">
                            {{ $article->content }}
                        </p>

                        <div class="card-actions justify-end mt-4">
                            <a href="/articles/{{ $article->id }}" class="btn btn-ghost btn-sm">Read More</a>
                        </div>
                        
                        
                    </div>
                </div>
                @empty
            <p class="text-gray-500"> No Articles .Add Articles</p>
            @endforelse
            </div>
    </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs mt-auto">
        <div>
            
        </div>
    </footer>

</body>
</html>