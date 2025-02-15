@extends('backend.layout.layout')

@section('content')
    <div class="flex-1 p-8">
        <div class="flex justify-end mb-4">
            <button class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600">Create New Page</button>
        </div>
        <div class="w-full bg-white rounded-lg shadow-md">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">Title</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($wikiPages)
                        @foreach($wikiPages as $wikiPage)
                            <tr class="border-t">
                                <td class="py-3 px-6">{{ $wikiPage->title }}</td>
                                <td class="py-3 px-6 text-center">
                                    <button class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 mr-2">Edit</button>
                                    <button class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-t">
                            <td class="py-3 px-6">Er zijn nog geen pagina's</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
