<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Share') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex flex-col items-center p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl mb-8 font-bold">Download or share this QR Code</h2>
                    
                    <img src="data:image/png;base64, {!! base64_encode($qr) !!}" />
                    <a href="{{route('share.download')}}" class="mt-8">
                        <x-primary-button> Download </x-primary-button>
                    </a>

                    <div class="mt-8">
                        <a href="{{$share_url}}" target="_blank" rel="noreferrer" class="text-blue-600">{{$share_url}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>