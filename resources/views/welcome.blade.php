<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gold Fleet - Professional Fleet Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gradient-to-br from-yellow-50 to-amber-50 min-h-screen">
    <div class="relative isolate px-6 pt-14 lg:px-8">
        <!-- Background decoration -->
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-yellow-400 to-amber-600 opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
        </div>

        <div class="mx-auto max-w-4xl py-32 sm:py-48 lg:py-56">
            <div class="text-center">
                <!-- Logo/Icon -->
                <div class="mb-8">
                    <div class="mx-auto h-24 w-24 rounded-full bg-gradient-to-r from-yellow-400 to-amber-500 flex items-center justify-center shadow-lg">
                        <svg class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0V15a6 6 0 0112 0v3.75a1.5 1.5 0 01-3 0V15a3 3 0 00-6 0v3.75zM12 9a3 3 0 100-6 3 3 0 000 6z" />
                        </svg>
                    </div>
                </div>

                <!-- Main heading -->
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                    <span class="text-yellow-600">Gold</span> Fleet
                </h1>
                <p class="mt-6 text-lg leading-8 text-amber-700">
                    Professional Fleet Management System for Modern Businesses
                </p>

                <!-- Description -->
                <p class="mt-6 text-base leading-7 text-yellow-800 max-w-2xl mx-auto">
                    Streamline your fleet operations with our comprehensive management platform.
                    Track vehicles, manage drivers, monitor maintenance, and optimize your business efficiency.
                </p>

                <!-- CTA Buttons -->
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    @auth
                        <a href="/dashboard" class="rounded-md bg-yellow-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600 transition-colors">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="/register" class="rounded-md bg-yellow-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600 transition-colors">
                            Get Started
                        </a>
                        <a href="/login" class="text-sm font-semibold leading-6 text-amber-700 hover:text-yellow-600 transition-colors">
                            Sign In <span aria-hidden="true">→</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Features section -->
        <div class="mx-auto max-w-7xl px-6 lg:px-8 py-24">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Everything you need to manage your fleet
                </h2>
                <p class="mt-6 text-lg leading-8 text-amber-700">
                    Comprehensive tools designed for fleet managers and business owners.
                </p>
            </div>

            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />
                            </svg>
                            Vehicle Tracking
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-yellow-800">
                            <p class="flex-auto">Real-time GPS tracking and comprehensive vehicle management with maintenance scheduling and fuel monitoring.</p>
                        </dd>
                    </div>

                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M4.632 3.533A2 2 0 016.577 2h6.846a2 2 0 011.945 1.533l1.976 8.234A3.489 3.489 0 0016 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234z" />
                                <path fill-rule="evenodd" d="M4 13a2 2 0 100 4h12a2 2 0 100-4H4zm11.24 2a.75.75 0 01.75-.75H16a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75h-.01a.75.75 0 01-.75-.75V15zm-2.25-.75a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75h-.01z" clip-rule="evenodd" />
                            </svg>
                            Driver Management
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-yellow-800">
                            <p class="flex-auto">Complete driver profiles with licensing, training records, performance metrics, and compliance tracking.</p>
                        </dd>
                    </div>

                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <svg class="h-5 w-5 flex-none text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.632 3.533A2 2 0 016.577 2h6.846a2 2 0 011.945 1.533l1.976 8.234A3.489 3.489 0 0016 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234z" />
                                <path fill-rule="evenodd" d="M4 13a2 2 0 100 4h12a2 2 0 100-4H4zm11.24 2a.75.75 0 01.75-.75H16a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75h-.01a.75.75 0 01-.75-.75V15zm-2.25-.75a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75h-.01z" clip-rule="evenodd" />
                            </svg>
                            Analytics & Reports
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-yellow-800">
                            <p class="flex-auto">Detailed analytics and customizable reports for fleet performance, costs, and operational efficiency.</p>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-white/50 backdrop-blur-sm border-t border-yellow-200">
            <div class="mx-auto max-w-7xl px-6 py-12 md:flex md:items-center md:justify-between lg:px-8">
                <div class="flex justify-center space-x-6 md:order-2">
                    <p class="text-center text-xs leading-5 text-amber-600">
                        &copy; 2024 Gold Fleet. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
