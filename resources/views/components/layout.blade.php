<!doctype html>

<title>{{ config('app.name', 'Laravel Cookbook') }}</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

@stack('styles')
@livewireStyles

<style>
    .content a {
        color: blue;
    }

    .content ul {
        list-style-type: disc;
        margin-left: 10px;
    }
</style>

<body style="font-family: Open Sans, sans-serif">

    <section class="px-6 py-8">

        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="{{ asset('./images/logo.svg') }}" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 flex space-x-4 md:mt-0">
                <a href="/" class="hover:text-gray-200">Home Page</a>

                <a href="/chart" class="hover:text-gray-200">Chart</a>
                <a href="/stats" class="hover:text-gray-200">Stats</a>

                <a href="/drag-drop" class="hover:text-gray-200">Drag and Drop</a>
                <a href="/http-client" class="hover:text-gray-200">Http client</a>
            </div>
        </nav>

        <header class="max-w-xl mx-auto mt-20 text-center">
            <h1 class="text-4xl">
                <span class="text-blue-500">Laravel Cookbook</span>
            </h1>

            <p class="text-sm mt-14">

            </p>


        </header>

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            {{ $slot }}
        </main>

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="./images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Laravel cookbook </h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">


                </div>
            </div>
        </footer>
    </section>
    @livewireScripts
    @stack('scripts')
</body>
