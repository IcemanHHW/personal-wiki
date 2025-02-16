<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WikiPage;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WikiPageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $wikiPages = WikiPage::query()->get();

        return view('backend.wikiPage.index', compact('wikiPages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return view('backend.wikiPage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'image_path' => ['required', 'image'],
            'content' => ['required'],
        ]);

        try {
            $data['image_path'] = $request->file('image_path')->store('wikiPage-images', 'public');

            WikiPage::query()->create($data);

        } catch (Exception $e) {
            dd($e->getMessage());
        }

        return redirect()->route('wiki-pages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WikiPage $wikiPage
     * @return View
     */
    public function edit(WikiPage $wikiPage) : View
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
    public function update(Request $request, WikiPage $wikiPage) : RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'image_path' => ['nullable', 'image'],
            'content' => ['required'],
        ]);

        try {
            if ($request->hasFile('image_path')) {
                if ($wikiPage->image_path) {
                    Storage::disk('public')->delete($wikiPage->image_path);
                }
                $data['image_path'] = $request->file('image_path')->store('wikiPage-images', 'public');
            }

            $wikiPage->update($data);

        } catch (Exception $e) {
            dd($e->getMessage());
        }

        return redirect()->route('wiki-pages.index');
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

        return redirect()->route('wiki-pages.index');
    }
}
