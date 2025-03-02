@extends('site.layout.layout')
@section('content')
    <div class="flex justify-between items-center border-b pb-3 mb-4">
        <h1 class="text-3xl font-bold">Blablabla</h1>
    </div>
    <img src="https://picsum.photos/1200/400" alt="Wiki Image" class="w-full h-64 object-cover rounded-lg mb-6">
    <form action="#" method="GET" class="mb-6">
        <div class="flex">
            <input type="text" name="q" placeholder="Zoeken placeholder"
                   class="w-full p-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700">
                Zoeken
            </button>
        </div>
    </form>

    <div class="bg-gray-50 p-4 rounded-lg border flex items-center space-x-4">
        <img src="https://picsum.photos/200/150"
             alt="Uigelicht"
             class="w-32 h-24 object-cover rounded-lg shadow-md">
        <div>
            <h2 class="text-lg font-semibold">Uitgelicht</h2>
            <a href="#" class="text-blue-600 hover:underline text-xl font-bold">
               Blablablabla
            </a>
            <p class="text-sm text-gray-700 mt-1">
                Blablablabla Blablablabla Blablablabla Blablablabla Blablablabla Blablablabla Blablablabla Blablablabla
            </p>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-lg font-semibold mb-2">Nieuwste pagina's</h2>
        <ul class="list-disc pl-5 space-y-1 text-sm">
            <li><a href="#" class="text-blue-600 hover:underline"> Blablablabla</a></li>
            <li><a href="#" class="text-blue-600 hover:underline"> Blablablabla</a></li>
        </ul>
    </div>
@endsection
