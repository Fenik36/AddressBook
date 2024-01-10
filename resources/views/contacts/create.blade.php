<x-layout>
    <x-container class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Add New Contact</h2>
            <p class="mb-4">Add New Contact To Your Address Book</p>
        </header>

        <form method="POST" action="/contact" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="firstname" class="inline-block text-lg mb-2">First Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="firstname"
                    value="{{ old('firstname') }}" />

                @error('firstname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="phonenumbers" class="inline-block text-lg mb-2">Phone Number</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="phonenumbers"
                    value="{{ old('phonenumbers') }}" />

                @error('phonenumbers')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="middlename" class="inline-block text-lg mb-2">Middle Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="middlename"
                    value="{{ old('middlename') }}" />

                {{-- @error('middlename')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-6">
                <label for="lastname" class="inline-block text-lg mb-2">Last Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="lastname"
                    value="{{ old('lastname') }}" />

                {{-- @error('lastname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">
                    Contact Email
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Company</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
                    value="{{ old('company') }}" />

                {{-- @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">
                    Location
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    value="{{ old('location') }}" />

                {{-- @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc" value="{{ old('tags') }}" />

                {{-- @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Photo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

                {{-- @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-6">
                <label for="comment" class="inline-block text-lg mb-2">
                    Comment
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="comment" rows="10"
                    placeholder="Comments about the contact">{{ old('comment') }}</textarea>

                {{-- @error('comment')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Add New
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-container>
</x-layout>
