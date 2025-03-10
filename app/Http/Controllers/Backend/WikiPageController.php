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
            'is_featured' => ['present', 'boolean',],
            'title' => ['required', 'string', 'min:3', 'max:100',],
            'main_image' => ['required', 'image'],
            'content' => ['required', 'string', 'min:100', 'max:4294967296',],
        ],[], [
            'is_featured' => __('wiki_page.label.is_featured'),
            'title' => __('wiki_page.label.title'),
            'main_image' => __('wiki_page.label.main_image'),
            'content' => __('wiki_page.label.content'),
        ]);

        try {
            if ($request->input('is_featured')) {
                WikiPage::where('is_featured', true)->update(['is_featured' => false]);
                $data['is_featured'] = true;
            }

            $data['main_image'] = $request->file('main_image')->store('wikiPage-images', 'public');

           $wikiPage =  WikiPage::query()->create($data);

        } catch (Exception $e) {
            logger($e);
            return redirect()->back()->with('error', __('app.model.error', ['model' => __('wiki_page.model')]));
        }

        return redirect()->route('wiki-pages.index')->with('success', __('app.model.created', ['model' => $wikiPage->title]));
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
            'is_featured' => ['present', 'boolean',],
            'title' => ['required', 'string', 'min:3', 'max:100',],
            'main_image' => ['nullable', 'image'],
            'content' => ['required', 'string', 'min:100', 'max:4294967296',],
        ],[], [
            'is_featured' => __('wiki_page.label.is_featured'),
            'title' => __('wiki_page.label.title'),
            'main_image' => __('wiki_page.label.main_image'),
            'content' => __('wiki_page.label.content'),
        ]);

        try {
            if ($request->input('is_featured')) {
                WikiPage::where('is_featured', true)->update(['is_featured' => false]);
                $data['is_featured'] = true;
            }

            if ($request->hasFile('main_image')) {
                if ($wikiPage->main_image) {
                    Storage::disk('public')->delete($wikiPage->main_image);
                }
                $data['main_image'] = $request->file('main_image')->store('wikiPage-images', 'public');
            }

            $wikiPage->update($data);

        } catch (Exception $e) {
            logger($e);
            return redirect()->back()->with('error', __('app.model.error', ['model' => $wikiPage->title]));
        }

        return redirect()->route('wiki-pages.index')->with('success',  __('app.model.updated', ['model' => $wikiPage->title]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param WikiPage $wikiPage
     * @return RedirectResponse
     */
    public function destroy(WikiPage $wikiPage): RedirectResponse
    {
        $title = $wikiPage->title;
        $wikiPage->delete();

        return redirect()->route('wiki-pages.index')->with('success', __('app.model.deleted', ['model' => $title]));
    }
}
