<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
            <a href="{{ route('article.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Create
            </a>
        </div>
    </x-slot>

    @foreach($articles as $article)
        <div class="bg-white w-full items-center gap-x-8 gap-y-16 px-10 py-10 mt-6 shadow-md overflow-hidden sm:rounded-lg">
            <div class="w-full px-4">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{$article->title}}</h2>

                <a href="{{ route('article.edit', $article->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-4">Edit</a>
                <form action="{{ route('article.destroy', $article->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit">
                        {{ __('Delete') }}
                    </x-danger-button>
                </form>
            </div>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $articles->links() }}
    </div>
</x-app-layout>
