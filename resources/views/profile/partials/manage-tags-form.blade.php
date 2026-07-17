<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Manage Tags') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Create and manage tags for organizing your notes.') }}
        </p>
    </header>

    <!-- Create New Tag -->
    <form method="post" action="{{ route('tags.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Tag Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="e.g., Important, Work, Personal" required />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create Tag') }}</x-primary-button>

            @if (session('status') === 'tag-created')
                <p x-data="{ show: true }" x-show="show" x-transition x-transition.out="fade" @click="show = false" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Tag created successfully.') }}</p>
            @endif
        </div>
    </form>

    <!-- Existing Tags -->
    @if (Auth::user()->tags->count())
        <div class="mt-8">
            <h3 class="text-md font-medium text-gray-900 mb-4">{{ __('Your Tags') }}</h3>
            <div class="space-y-2">
                @foreach (Auth::user()->tags as $tag)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-700 font-mono">{{ $tag->name }}</span>
                        <form method="post" action="{{ route('tags.destroy', $tag->id) }}" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm" onclick="return confirm('Are you sure?')">{{ __('Delete') }}</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</section>