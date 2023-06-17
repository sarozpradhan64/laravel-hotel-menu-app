
<x-app-layout>
    <x-slot name="header" class="flex">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu items') }}
        </h2>

        <a href="{{route('menu-items.create')}}">
            <x-primary-button> Add New </x-primary-button>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="flex items-center justify-between pb-4">

                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items">
                    </div>
                </div>
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
                        @foreach($items as $item)
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
                                    @if($item->$col == true)
                                    Active
                                    @else
                                    False
                                    @endif
                                @elseif($col === 'image')
                                <a href="{{$item->image_url}}" target="_blank"><img class="w-10 h-10 rounded-full"
                                        src="{{$item->image_url}}" alt="{{$item->title}}"></a>
                                @else
                                {{$item->$col}}
                                @endif
                            </td>
                            @endforeach

                            <td class="flex justify-start items-center py-3">
                                <a href="{{route('menu-items.show', $item)}}"
                                 class="flex justify-center items-center rounded-full w-8 h-8 mx-1 hover:bg-blue-100">
                                    <box-icon name='show-alt' color='#4413ea' size="18px"></box-icon>
                                </a>
                                <a href="{{route('menu-items.edit', $item)}}"
                                class="flex justify-center items-center rounded-full w-8 h-8 mx-1 hover:bg-green-100">
                                    <box-icon name='edit' flip='horizontal' color='#27b200' size="18px" ></box-icon>    
                                </a>
                                <a href="javascript:;"
                                class="flex justify-center items-center rounded-full w-8 h-8 mx-1 hover:bg-red-100"
                                    onclick="document.getElementById('delete-item-{{$item->id}}').submit()">
                                    <box-icon name='message-square-x' type='solid' color='#b20000' size="18px"></box-icon>
                                </a>
                                <form method="post" id="delete-item-{{$item->id}}"
                                    action="{{route('menu-items.destroy', $item)}}">
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