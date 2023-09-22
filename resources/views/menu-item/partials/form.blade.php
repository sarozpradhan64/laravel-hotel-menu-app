<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add New Menu Item') }}
        </h2>


    </header>

    <form method="post" action="{{ route('menu-items.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        {{-- @method('put') --}}

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title"
                value="{{old('title')}}" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="menu_category_id" :value="__('Menu Category')" />
            <select id="menu_category_id" name="menu_category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="">Choose a category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('menu_category_id')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="currency" :value="__('Currency')" />
            <select id="currency" name="currency"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="">Choose a currency</option>
                @foreach(Config::get('custom.currencies') as $key => $value)
                <option value="{{$key}}" @if($key==='NRS.' ) selected @endif>{{$value}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('currency')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" autocomplete="price"
                value="{{old('price')}}" />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="quantity" :value="__('Quantity')" />
            <x-text-input id="quantity" name="quantity" type="text" class="mt-1 block w-full" autocomplete="quantity"
                value="{{old('quantity')}}" />
            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
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
                name="description" placeholder="Write your thoughts here...">{{old('description')}}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="state" :value="__('State')" />

            <div class="flex items-center justify-items-center">
                <div class="flex items-center me-3">
                    <input checked id="state-1" type="radio" value="1" name="state"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="state-1"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
                </div>
                <div class="flex items-center">
                    <input id="state-2" type="radio" value="0" name="state"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="state-2"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Inactive</label>
                </div>
            </div>

            <x-input-error :messages="$errors->get('state')" class="mt-2" />
        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>