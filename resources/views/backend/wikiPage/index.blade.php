@extends('backend.layout.layout')

@section('content')
    <div class="flex-1 p-8">
        <div class="flex justify-end mb-4">
            <a class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600" href="{{ route('wiki-pages.create') }}">Nieuwe Wiki pagina</a>
        </div>
        <div class="w-full bg-white rounded-lg shadow-md">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">Titel</th>
                        <th class="py-3 px-6 text-center">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @if($wikiPages->isNotEmpty())
                        @foreach($wikiPages as $wikiPage)
                            <tr class="border-t">
                                <td class="py-3 px-6">{{ $wikiPage->title }}</td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <a class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600" href="{{ route('wiki-pages.edit', $wikiPage) }}">Aanpassen</a>
                                        <form method="POST" action="{{ route('wiki-pages.destroy', $wikiPage) }}" onsubmit="return confirm('Weet je zeker dat je deze pagina wilt verwijderen?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">
                                                Verwijderen
                                            </button>
                                        </form>
                                    </div>
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
