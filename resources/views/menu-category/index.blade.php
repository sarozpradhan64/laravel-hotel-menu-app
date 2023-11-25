
<x-app-layout>
    <x-slot name="header" class="flex">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex items-center justify-end pb-4">
                <a href="{{route('menu-categories.create')}}">
                    <x-primary-button> Add New </x-primary-button>
                </a>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            @foreach($cols as $col)
                            <th scope="col" class="px-6 py-3">
                                {{AppHelper::myTitle($col)}}
                            </th>
                            @endforeach
                            <th scope="col" class="uppercase px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            @foreach($cols as $col)
                            <td scope="row" @if($col==='title' )
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" @else
                                class="px-6 py-4" @endif>

                                @if($col === 'state')
                                    @if($category->$col == true)
                                    Active
                                    @else
                                    False
                                    @endif
                                @elseif($col === 'image')
                                <a href="{{$category->image_url}}" target="_blank"><img class="w-10 h-10 rounded-full"
                                        src="{{$category->image_url}}" alt="{{$category->title}}"></a>
                                @else
                                {{$category->$col}}
                                @endif
                            </td>
                            @endforeach

                            <td class="flex justify-start items-center py-3">
                                <a href="{{route('menu-categories.show', $category)}}"
                                 class="flex justify-center items-center rounded-full w-8 h-8 mx-1 text-green-600 hover:bg-blue-100">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="{{route('menu-categories.edit', $category)}}"
                                class="flex justify-center items-center rounded-full w-8 h-8 mx-1 text-blue-600 hover:bg-green-100">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="javascript:;"
                                class="flex justify-center items-center rounded-full w-8 h-8 mx-1 text-red-600 hover:bg-red-100"
                                    onclick="document.getElementById('delete-item-{{$category->id}}').submit()">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                                <form method="post" id="delete-item-{{$category->id}}"
                                    action="{{route('menu-categories.destroy', $category)}}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>