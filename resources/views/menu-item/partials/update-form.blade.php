<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Edit New Menu Category') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('menu-categories.update', $menuCategory) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
            value="{{$menuCategory->title}}"
                autocomplete="current-password" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="description" placeholder="Write your thoughts here...">{{$menuCategory->description}}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="state" :value="__('State')" />

            <div class="flex items-center justify-items-center">
                <div class="flex items-center me-3">
                    <input  id="state-1" type="radio" @if($menuCategory->state == true) checked @endif   value="1" name="state"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="state-1"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
                </div>
                <div class="flex items-center">
                    <input  id="state-2" type="radio" @if($menuCategory->state == false) checked @endif value="0" name="state" 
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="state-2"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Inactive</label>
                </div>
            </div>


            {{--
            <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" autocomplete="new-state" /> --}}
            <x-input-error :messages="$errors->get('state')" class="mt-2" />
        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            
        </div>
    </form>
</section>