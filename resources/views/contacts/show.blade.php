<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-container class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ $contact->logo ? asset('storage/' . $contact->logo) : asset('/images/no-image.png') }}"
                    alt="" />

                <h3 class="text-2xl mb-2">
                    {{ $contact->FirstName }}
                </h3>
                <h3 class="text-2xl mb-2">
                    {{ $contact->MiddleName }}
                </h3>
                <div class="text-xl font-bold mb-4 uppercase">{{ $contact->LastName }}</div>
                <div class="text-xl font-bold mb-4">{{ $contact->PhoneNumbers }}</div>
                <div class="text-xl font-bold mb-4">{{ $contact->company }}</div>
                <div class="text-xl font-bold mb-4">{{ $contact->email }}</div>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $contact->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">Comment</h3>
                    <div class="text-lg space-y-6">
                        {{ $contact->Comment }}
                    </div>
                </div>
            </div>
        </x-container>

        <x-container class="mt-4 p-2 flex space-x-6">
            <a href="/contact/{{ $contact->id }}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            <form method="POST" action="/contact/{{ $contact->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </x-container>
    </div>
</x-layout>
