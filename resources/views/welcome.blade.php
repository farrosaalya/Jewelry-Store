<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Elegant Jewels - Fine Jewelry Store</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=playfair-display:400,600,700|inter:300,400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-navy-50">
        <!-- Navigation -->
        <nav class="bg-navy-700 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-playfair font-bold text-gold-400">Elegant Jewels</a>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:space-x-8">
                        <a href="#" class="text-navy-100 hover:text-gold-400 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Collections</a>
                        <a href="#" class="text-navy-100 hover:text-gold-400 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Rings</a>
                        <a href="#" class="text-navy-100 hover:text-gold-400 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Necklaces</a>
                        <a href="#" class="text-navy-100 hover:text-gold-400 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Earrings</a>
                        <a href="#" class="text-navy-100 hover:text-gold-400 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">About</a>
                        <a href="#" class="text-navy-100 hover:text-gold-400 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Contact</a>
                    </div>
                    <div class="flex items-center">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-navy-100 hover:text-gold-400 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-navy-100 hover:text-gold-400 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-navy-900 bg-gold-400 hover:bg-gold-500 px-4 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative bg-navy-800 text-white">
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-r from-navy-900 to-navy-700 opacity-75"></div>
            </div>
            <div class="relative max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl tracking-tight font-bold sm:text-5xl md:text-6xl font-playfair">
                        <span class="block text-gold-400">Timeless Elegance</span>
                        <span class="block mt-2">Exquisite Jewelry</span>
                    </h1>
                    <p class="mt-6 max-w-lg mx-auto text-navy-100 text-xl">
                        Discover our collection of fine jewelry, crafted with precision and passion. Each piece tells a unique story of beauty and sophistication.
                    </p>
                    <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                        <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
                            <a href="#" class="flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-navy-900 bg-gold-400 hover:bg-gold-500 md:py-4 md:text-lg md:px-10 transition duration-150 ease-in-out">
                                View Collection
                            </a>
                            <a href="#" class="flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-gold-400 bg-navy-600 hover:bg-navy-500 md:py-4 md:text-lg md:px-10 transition duration-150 ease-in-out">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Products -->
        <div class="bg-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <h2 class="text-3xl font-playfair font-bold text-navy-800">Featured Collection</h2>
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <div class="relative">
                            <select class="w-full sm:w-48 rounded-lg border-navy-200 text-navy-600 pr-8">
                                <option>All Categories</option>
                                @foreach($categories as $category)
                                    <option>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative">
                            <select class="w-full sm:w-48 rounded-lg border-navy-200 text-navy-600 pr-8">
                                <option>All Status</option>
                                <option>In Stock</option>
                                <option>Low Stock</option>
                                <option>Out of Stock</option>
                            </select>
                        </div>
                        <button class="w-full sm:w-auto px-6 py-2 bg-navy-600 text-white rounded-lg hover:bg-navy-700 transition-colors duration-200">
                            Filter
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($jewelries as $jewelry)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100">
                        <div class="relative">
                            <div class="aspect-w-4 aspect-h-3 rounded-t-xl overflow-hidden">
                                <img src="{{ $jewelry->image_url }}" 
                                     alt="{{ $jewelry->name }}" 
                                     class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
                            </div>
                            @if($jewelry->stock <= 0)
                                <div class="absolute top-2 right-2 bg-rose-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    Sold Out
                                </div>
                            @elseif($jewelry->stock <= 10)
                                <div class="absolute top-2 right-2 bg-amber-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    Low Stock
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <div class="mb-2">
                                <p class="text-sm text-navy-500 mb-1">{{ $jewelry->category->name }}</p>
                                <h3 class="text-lg font-semibold text-navy-800 line-clamp-1">{{ $jewelry->name }}</h3>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-navy-800">Rp {{ number_format($jewelry->price, 0, ',', '.') }}</span>
                                <span class="text-sm text-navy-600">Stock: {{ $jewelry->stock }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="bg-navy-700">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-baseline sm:justify-between">
                    <h2 class="text-3xl font-playfair font-bold tracking-tight text-white">Shop by Category</h2>
                    <a href="#" class="hidden text-sm font-medium text-gold-400 hover:text-gold-300 sm:block transition duration-150 ease-in-out">
                        Browse all categories<span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:grid-rows-2 sm:gap-x-6 lg:gap-8">
                    <div class="group aspect-w-2 aspect-h-1 rounded-lg overflow-hidden sm:aspect-h-1 sm:aspect-w-1 sm:row-span-2">
                        <img src="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?ixlib=rb-4.0.3" alt="Rings collection" class="object-center object-cover group-hover:opacity-75 transition duration-150 ease-in-out">
                        <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-navy-900 opacity-75"></div>
                        <div class="p-6 flex items-end">
                            <div>
                                <h3 class="font-medium text-white">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        Rings
                                    </a>
                                </h3>
                                <p aria-hidden="true" class="mt-1 text-sm text-gold-400">Shop now</p>
                            </div>
                        </div>
                    </div>
                    <div class="group aspect-w-2 aspect-h-1 rounded-lg overflow-hidden sm:relative sm:aspect-none sm:h-full">
                        <img src="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?ixlib=rb-4.0.3" alt="Necklaces collection" class="object-center object-cover group-hover:opacity-75 transition duration-150 ease-in-out sm:absolute sm:inset-0 sm:w-full sm:h-full">
                        <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-navy-900 opacity-75"></div>
                        <div class="p-6 flex items-end">
                            <div>
                                <h3 class="font-medium text-white">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        Necklaces
                                    </a>
                                </h3>
                                <p aria-hidden="true" class="mt-1 text-sm text-gold-400">Shop now</p>
                            </div>
                        </div>
                    </div>
                    <div class="group aspect-w-2 aspect-h-1 rounded-lg overflow-hidden sm:relative sm:aspect-none sm:h-full">
                        <img src="https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?ixlib=rb-4.0.3" alt="Earrings collection" class="object-center object-cover group-hover:opacity-75 transition duration-150 ease-in-out sm:absolute sm:inset-0 sm:w-full sm:h-full">
                        <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-navy-900 opacity-75"></div>
                        <div class="p-6 flex items-end">
                            <div>
                                <h3 class="font-medium text-white">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        Earrings
                                    </a>
                                </h3>
                                <p aria-hidden="true" class="mt-1 text-sm text-gold-400">Shop now</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:hidden">
                    <a href="#" class="block text-sm font-medium text-gold-400 hover:text-gold-300 transition duration-150 ease-in-out">
                        Browse all categories<span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-navy-900">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="space-y-8 xl:col-span-1">
                        <h2 class="text-2xl font-playfair font-bold text-gold-400">Elegant Jewels</h2>
                        <p class="text-navy-200 text-base">
                            Crafting timeless pieces that celebrate life's precious moments.
                        </p>
                        <div class="flex space-x-6">
                            <a href="#" class="text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gold-400 tracking-wider uppercase">Shop</h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">Collections</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">New Arrivals</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">Sale</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gold-400 tracking-wider uppercase">Support</h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">Contact</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">Shipping</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">Returns</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gold-400 tracking-wider uppercase">Company</h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">About</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">Blog</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">Careers</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gold-400 tracking-wider uppercase">Legal</h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">Privacy</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-navy-200 hover:text-gold-400 transition duration-150 ease-in-out">Terms</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-12 border-t border-navy-700 pt-8">
                    <p class="text-base text-navy-200 xl:text-center">
                        &copy; 2024 Elegant Jewels. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>
