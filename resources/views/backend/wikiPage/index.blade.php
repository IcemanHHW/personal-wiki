@extends('backend.layout.layout')

@section('content')
    <div class="flex justify-end mb-4">
        <a class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600" href="{{ route('wiki-pages.create') }}">Nieuwe Wiki pagina</a>
    </div>
    <div class="w-full bg-white rounded-lg shadow-md">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">Titel</th>
                    <th class="py-3 px-6 text-center">Uitgelicht</th>
                    <th class="py-3 px-6 text-center">Acties</th>
                </tr>
            </thead>
            <tbody>
                @if($wikiPages->isNotEmpty())
                    @foreach($wikiPages as $wikiPage)
                        <tr class="border-t">
                            <td class="py-3 px-6">{{ $wikiPage->title }}</td>
                            <td class="py-3">
                                <div class="flex items-center justify-center">
                                    @if($wikiPage->is_featured)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 stroke-green-500">
                                            <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 stroke-red-500">
                                            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600" href="{{ route('wiki-pages.edit', $wikiPage) }}">Aanpassen</a>
                                    <form method="POST" action="{{ route('wiki-pages.destroy', $wikiPage) }}" onsubmit="return confirm('Weet je zeker dat je deze pagina wilt verwijderen?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded cursor-pointer hover:bg-red-600">
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
@endsection
