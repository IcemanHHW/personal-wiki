<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WikiPage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WikiPageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wikiPages = WikiPage::query()->get();

        return view('backend.wikiPage.index', compact('wikiPages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return WikiPage
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'image_path' => ['required'],
            'content' => ['required'],
        ]);

        return WikiPage::create($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WikiPage $wikiPage)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param WikiPage $wikiPage
     * @return WikiPage
     */
    public function update(Request $request, WikiPage $wikiPage)
    {
        $data = $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'image_path' => ['required'],
            'content' => ['required'],
        ]);

        $wikiPage->update($data);

        return $wikiPage;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param WikiPage $wikiPage
     * @return JsonResponse
     */
    public function destroy(WikiPage $wikiPage)
    {
        $wikiPage->delete();

        return response()->json();
    }
}
