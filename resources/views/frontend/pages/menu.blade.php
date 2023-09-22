<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Menu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-200">
    <div class="container mx-auto py-8 lg:px-12 md:px-8 sm:px-3 px-2">
        <h1 class="text-3xl text-center font-bold mb-8">Hotel Menu</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($menuCategories as $category)
            <!-- Menu Item 1 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">{{$category->title}}</h2>
                <ul>
                    @foreach($category->menuItems as $item)
                    <li>{{$item->title}}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>