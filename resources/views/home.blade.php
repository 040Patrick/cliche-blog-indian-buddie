<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COLTT Bytes - Home</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 antialiased">

    <!-- Header -->
    <header class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6">
            <nav class="flex items-center justify-between h-16">

                <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900"> 
                    ColTT <span class="text-gray-500">Bytes</span> 
                </a>

                <div class="flex items-center gap-6 text-sm font-medium">
                    <a href="{{ route('home') }}" class="text-gray-900 hover:text-black transition">
                        Home
                    </a>

                    @if(Route::has('login'))
                        @auth
                            <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-black transition">
                                Dashboard
                            </a>
                        @else
                        <!-- REGISTER AND LOGIN -->
                        <div>
                            <a
                                href="{{ route('login') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-black transition"
                            >
                                Login
                            </a>

                            <a
                                href="{{ route('register') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-black transition"
                            >
                                Register
                            </a>
                        </div>
                        @endauth
                    @endif
                </div>
            </nav>
        </div>
    </header>

    @auth
        <!-- Hero -->
        <section class="bg-gray-50 border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-6 py-24">

                <div class="max-w-3xl">
                    <h1 class="text-5xl font-bold text-gray-900 leading-tight mb-6">
                        Welcome to ColTT Bytes
                    </h1>

                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Discover amazing articles, tutorials and insights about Laravel,
                        PHP and modern web development.
                    </p>

                    <a
                        href="#"
                        class="inline-flex items-center px-6 py-3 bg-gray-900 border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-widest hover:bg-black transition"
                    >
                        Browse Articles
                    </a>
                </div>

            </div>
        </section>

        <!-- Featured Posts -->
        <main class="max-w-7xl mx-auto px-6 py-16">

            <div class="mb-10">
                <h2 class="text-3xl font-bold text-gray-900">
                    Featured Posts
                </h2>

                <p class="text-gray-600 mt-2">
                    Explore the latest articles from the community.
                </p>
            </div>

            <!-- POST CONTENT-->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)

                    <!-- Card -->
                    <article class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300">
                        <img
                            src="{{ Storage::url('posts/' . $post->image) }}"
                            alt="{{ $post->title }}"
                            class="w-full h-56 object-cover"
                        >

                        <div class="p-6">
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                                <span>{{ $post->created_at->diffForHumans() }}  | </span>
                                <span>Last Updated {{ $post->updated_at->diffForHumans() }}</span>
                            </div>

                            
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                POSTED BY {{ $post->user->name }} | {{ $post->user->usertype}}
                            </h3>
                            

                            <p class="text-gray-600 mb-5 leading-relaxed">
                                {{ Str::limit($post->content, 30) }}
                            </p>

                            <a href=" {{ route('post.show', $post->id) }}" class="text-gray-900 font-semibold hover:underline">
                                Read More →
                            </a>
                            <!-- DELETE AND UPDATE -->
                            <div class="flex items-center gap-3">

                            @can('is-admin')
                                    <a href="{{ route('post.edit', $post->id) }}"
                                    class="bg-orange-500 text-white px-3 py-1 rounded-md font-semibold hover:bg-orange-600 transition">
                                        EDIT
                                    </a>

                                    <form action="{{ route('post.destroy', $post->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete it?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded-md font-semibold hover:bg-red-600 transition">
                                            DELETE
                                        </button>
                                    </form>

                                @endcan
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </main>

    @else
        <section class="max-w-7xl mx-auto px-6 py-24">
            <div class="bg-white border border-gray-200 shadow-sm rounded-3xl p-12">

                <h1 class="text-5xl font-bold text-gray-900 mb-6">
                    Bem-vindo ao ColTT Bytes
                </h1>

                <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mb-8">
                    TUDO SOBRE AS ABILIDADES DE COLTT NO LARAVEL
                </p>

                <div class="flex items-center gap-4">
                    <a
                        href="{{ route('login') }}"
                        class="inline-flex items-center px-6 py-3 bg-gray-900 border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-widest hover:bg-black transition"
                    >
                        Login
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="inline-flex items-center px-6 py-3 bg-white border border-gray-300 rounded-xl font-semibold text-sm text-gray-700 uppercase tracking-widest hover:bg-gray-100 transition"
                    >
                        Register
                    </a>
                </div>

            </div>
        </section>
    @endauth

    <!-- Footer -->
     <footer class="bg-white border-t border-gray-200 mt-20">
        <div class="max-w-7xl mx-auto px-6 py-12">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        About ColTT Bytes
                    </h3>

                    <p class="text-gray-600 leading-relaxed max-w-md">
                        A blog dedicated to Laravel, PHP and modern web development practices.
                    </p>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">
                        Quick Links
                    </h3>

                    <ul class="space-y-3 text-gray-600">
                        <li><a href="{{ route('home') }}" class="hover:text-black transition">Home</a></li>
                        <li><a href="#" class="hover:text-black transition">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-200 mt-10 pt-6 text-sm text-gray-500">
                © 2026 ColTT Bytes. All rights reserved. Built with Laravel.
            </div>

        </div>
    </footer>

</body>
</html>