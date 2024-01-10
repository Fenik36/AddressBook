<x-layout>
  <x-container class="p-10">
    <header>
      <h1 class="text-3xl text-center font-bold my-6 uppercase">
        Manage Contacts
      </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
      <tbody>
        @unless($contacts->isEmpty())
        @foreach($contacts as $contact)
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="/contacts/{{$contact->id}}"> {{$contact->FirstName}} </a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="/contact/{{$contact->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                class="fa-solid fa-pen-to-square"></i>
              Edit</a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <form method="POST" action="/contact/{{ $contact->id }}">
              @csrf
              @method('DELETE')
              <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <p class="text-center">No Contactss Found</p>
          </td>
        </tr>
        @endunless

      </tbody>
    </table>
  </x-container>
</x-layout>
