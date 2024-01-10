@props(['contact'])

<x-container>
    <div class="flex-col items-center justify-center text-center">
        <a href="/contact/{{ $contact->id }}"><img class="hidden w-32 mx-auto mb-4 md:block"
                src="{{ $contact->logo ? asset('storage/' . $contact->logo) : asset('/images/no-image.png') }}"
                alt="" /></a>
        <div>
            <h3 class="text-2xl">
                {{ $contact->FirstName }}
            </h3>
            <div class="text-xl font-bold mb-4">{{ $contact->LastName }}</div>
            <div class="text-xl font-bold mb-4">{{ $contact->PhoneNumbers }}</div>
            <x-tags :tagsCsv="$contact->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $contact->location }}
            </div>
        </div>
    </div>
</x-container>
