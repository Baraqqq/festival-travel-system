<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
        <x-auth-session-status :status="session('status')" />
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    @if (session('message') !== '')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 4000)"
                            class="text-sm text-red-600"
                        >{{ session('message') }}</p>
                    @endif
                    <x-button class="mt-3" onclick="location.href='{{ route('book.create') }}';">
                        {{ __('Create book') }}
                    </x-button>
                    <x-table>
                        <x-slot name="thead">
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th style="width: 200px;">Action</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->ISBN }}</td>
                                    <td style="display:flex; flex-direction:row; justify-content: center;">
                                        <x-button onclick="location.href={{ route('book.edit', $book) }}">Edit</x-button>
                                        &nbsp;
                                        <form action="{{ route('book.destroy', $book) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit">Delete</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </x-slot>
                    </x-table>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>