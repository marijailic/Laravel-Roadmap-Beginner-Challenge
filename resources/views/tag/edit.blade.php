<x-app-layout>
    <form method="POST" action="{{ route('tag.update', $tag->id) }}">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mt-10 mr-10 ml-10">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$tag->name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Edit') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-app-layout>
