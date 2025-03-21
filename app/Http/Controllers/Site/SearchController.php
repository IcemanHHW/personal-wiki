<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return redirect()->route('wiki.home')->with('error', 'Please enter a search term.');
        }

        $results = Page::where('title', 'like', "%{$query}%")->get();

        return view('site.search.results', compact('results', 'query'));
    }
}
