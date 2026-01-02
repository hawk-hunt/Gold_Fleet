<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Driver') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('drivers.update', $driver) }}">
                        @csrf
                        @method('PATCH')

                        <!-- First Name -->
                        <div class="mb-6">
                            <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                First Name
                            </label>
                            <input type="text" name="first_name" id="first_name" 
                                value="{{ old('first_name', $driver->first_name) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('first_name') border-red-500 @else border @enderror"
                                required>
                            @error('first_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="mb-6">
                            <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Last Name
                            </label>
                            <input type="text" name="last_name" id="last_name" 
                                value="{{ old('last_name', $driver->last_name) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('last_name') border-red-500 @else border @enderror"
                                required>
                            @error('last_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Email Address
                            </label>
                            <input type="email" name="email" id="email" 
                                value="{{ old('email', $driver->email) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('email') border-red-500 @else border @enderror"
                                required>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-6">
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Phone Number
                            </label>
                            <input type="tel" name="phone" id="phone" 
                                value="{{ old('phone', $driver->phone) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('phone') border-red-500 @else border @enderror"
                                required>
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- License Number -->
                        <div class="mb-6">
                            <label for="license_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                License Number
                            </label>
                            <input type="text" name="license_number" id="license_number" 
                                value="{{ old('license_number', $driver->license_number) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('license_number') border-red-500 @else border @enderror"
                                required>
                            @error('license_number')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- License Expiry -->
                        <div class="mb-6">
                            <label for="license_expiry" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                License Expiry Date
                            </label>
                            <input type="date" name="license_expiry" id="license_expiry" 
                                value="{{ old('license_expiry', $driver->license_expiry) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('license_expiry') border-red-500 @else border @enderror"
                                required>
                            @error('license_expiry')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-6">
                            <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Address
                            </label>
                            <input type="text" name="address" id="address" 
                                value="{{ old('address', $driver->address) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required>
                            @error('address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- City -->
                        <div class="mb-6">
                            <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                City
                            </label>
                            <input type="text" name="city" id="city" 
                                value="{{ old('city', $driver->city) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                required>
                            @error('city')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Date of Birth -->
                        <div class="mb-6">
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Date of Birth
                            </label>
                            <input type="date" name="date_of_birth" id="date_of_birth" 
                                value="{{ old('date_of_birth', $driver->date_of_birth) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @error('date_of_birth')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-6">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Status
                            </label>
                            <select name="status" id="status" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white border"
                                required>
                                <option value="active" {{ old('status', $driver->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $driver->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Notes
                            </label>
                            <textarea name="notes" id="notes" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white border">{{ old('notes', $driver->notes) }}</textarea>
                            @error('notes')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center justify-between gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Update Driver
                            </button>
                            <a href="{{ route('drivers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
