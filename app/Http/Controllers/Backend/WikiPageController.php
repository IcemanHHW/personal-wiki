<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WikiPage;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WikiPageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View|Application|\Illuminate\View\View|object
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
        return view('backend.wikiPage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'image_path' => ['required', 'image'],
            'content' => ['required'],
        ]);

        try {
            $wikiPage = WikiPage::query()->create($data);

        } catch (Exception $e) {
            dd($e->getMessage());
        }

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Factory|View|Application|\Illuminate\View\View|object
     */
    public function edit(WikiPage $wikiPage)
    {
        return view('backend.wikiPage.edit', compact('wikiPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param WikiPage $wikiPage
     * @return RedirectResponse
     */
    public function update(Request $request, WikiPage $wikiPage)
    {
        $data = $request->validate([
            'title' => ['required'],
            'image_path' => ['required', 'image'],
            'content' => ['required'],
        ]);

        try {
            $wikiPage->update($data);

        } catch (Exception $e) {
            dd($e->getMessage());
        }

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param WikiPage $wikiPage
     * @return RedirectResponse
     */
    public function destroy(WikiPage $wikiPage): RedirectResponse
    {
        $wikiPage->delete();

        return redirect('/');
    }
}
