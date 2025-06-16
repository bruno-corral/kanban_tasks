<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Boards') }}
            </h2>
            <div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="{{ route('board.create') }}">
                    + Board
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                @foreach ($boards as $board)
                    <div class="p-6 text-gray-900 flex justify-between">
                        <div class="text-black cursor-pointer hover:text-blue-500">
                            <a href="{{ route('board.show', $board->id) }}">
                                {{ $board->title }}
                            </a>
                        </div>
                        <div class="flex gap-2">
                            <div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                                <a href="{{ route('board.edit', $board->id) }}">
                                    Update
                                </a>
                            </div>
                            <form action="{{ route('board.destroy', $board->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este board?');">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
