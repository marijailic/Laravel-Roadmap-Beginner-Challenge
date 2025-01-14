<x-app-layout>
    <div class="mt-10 mr-10 ml-10">
        <form method="POST" action="{{ route('article.store') }}">
            @csrf

            <!-- Title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus maxlength="50" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Body -->
            <div class="mt-4">
                <x-input-label for="body" :value="__('Body')" />
                <textarea id="body" class="block mt-1 w-full rounded-md" name="body" rows="5" required maxlength="2048">{{ old('body') }}</textarea>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>

            <!-- Category -->
            <div class="mt-4">
                <x-input-label for="category" :value="__('Category')" />
                <select id="category" name="category_id" class="block mt-1 w-full rounded-md" required>
                    <option value="" disabled selected>{{ __('Select a Category') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>

            <!-- Tags -->
            <div class="mt-4">
                <x-input-label for="tags" :value="__('Tags')" />
                <div class="flex flex-wrap gap-4 mt-2">
                    @foreach($tags as $tag)
                        <label class="inline-flex items-center">
                            <input
                                type="checkbox"
                                name="tags[]"
                                value="{{ $tag->id }}"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                {{ collect(old('tags'))->contains($tag->id) ? 'checked' : '' }}>
                            <span class="ml-2">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
                <x-input-error :messages="$errors->get('tags')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
