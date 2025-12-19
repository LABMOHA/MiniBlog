<!DOCTYPE html>
<html lang="en" data-theme="lofi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - MiniBlog</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen font-sans">

    <nav class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">
            <a href="/" class="btn btn-ghost text-xl">📝 MiniBlog</a>
        </div>
        <div class="navbar-end">
            <a href="/" class="btn btn-ghost btn-sm">Back to Home</a>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8 flex justify-center">
        <div class="max-w-3xl w-full">
            
            <div class="card bg-base-100 shadow-xl overflow-hidden">
                <div class="card-body p-8">
                    
                    <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                        <div class="flex items-center gap-2">
                            <div class="avatar placeholder">
                                <div class="bg-neutral text-neutral-content rounded-full w-8">
                                    <span>{{ substr($article->user->name ?? 'A', 0, 1) }}</span>
                                </div>
                            </div>
                            <span class="font-semibold">{{ $article->user->name ?? 'Anonymous' }}</span>
                        </div>
                        <span>{{ $article->created_at->format('F d, Y') }}</span>
                    </div>

                    <h1 class="text-4xl font-bold text-gray-800 mb-6 leading-tight">
                        {{ $article->title }}
                    </h1>

                    <div class="divider"></div>

                    <div class="prose max-w-none text-lg text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $article->content }}
                    </div>

                    <div class="divider mt-8"></div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="/" class="btn btn-outline">← Back to Articles</a>
                        
                        <div class="flex gap-2">
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit Article</a>

                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error">Delete</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs mt-8">
        <div>
        </div>
    </footer>

</body>
</html>