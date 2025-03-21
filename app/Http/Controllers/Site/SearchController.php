<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Handle the incoming search request and return the search results to the view
     *
     * @param Request $request
     *
     * @return RedirectResponse|View
     */
    public function __invoke(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return redirect()->route('wiki.home');
        }

        $results = Page::where('title', 'like', "%{$query}%")->get();

        return view('site.search.results', compact('results', 'query'));
    }
}
