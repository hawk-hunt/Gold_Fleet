<header class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-200">
    <div class="flex items-center">
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <h1 class="text-2xl font-semibold text-gray-800 ml-4 lg:ml-0">Dashboard</h1>
    </div>

    <div class="flex items-center space-x-4">
        <select class="form-select text-sm border-gray-300 rounded-md shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200">
            <option>All Groups</option>
            <option>Logistics</option>
        </select>

        <select class="form-select text-sm border-gray-300 rounded-md shadow-sm">
            <option>All Vehicles</option>
            <option>Truck #101</option>
        </select>

        <div class="relative">
            <button class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                Last 30 Days
            </button>
        </div>

        <button class="relative p-1 text-gray-400 hover:text-gray-600">
            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
        </button>

        <div class="flex items-center space-x-2">
            <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin+User&background=FBBF24&color=fff" alt="User avatar">
            <span class="text-sm font-medium text-gray-700 hidden md:block">Admin User</span>
        </div>
    </div>
</header>