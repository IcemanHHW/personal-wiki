<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\HtmlSanitizerService;

class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $user = auth()->user();
        $pages = Page::query()->where('user_id', $user->id)->get();

        return view('backend.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request, HtmlSanitizerService $sanitizer) : RedirectResponse
    {
        $data = $request->validate([
            'is_featured' => ['present', 'boolean',],
            'title' => ['required', 'string', 'min:3', 'max:100',],
            'main_image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'content' => ['required', 'string', 'min:5', 'max:4294967296',],
        ],[], [
            'is_featured' => __('page.label.is_featured'),
            'title' => __('page.label.title'),
            'main_image' => __('page.label.main_image'),
            'content' => __('page.label.content'),
        ]);

        try {
            if ($request->input('is_featured')) {
                Page::where('is_featured', true)->update(['is_featured' => false]);
                $data['is_featured'] = true;
            }

            $data['content'] = $sanitizer->sanitize($data['content']);

            $data['main_image'] = $request->file('main_image')->store('page-images', 'public');

           $page =  Page::query()->create([
               ...$data,
               'user_id' => $request->user()->id,
           ]);

        } catch (Exception $e) {
            logger($e);
            return redirect()->back()->with('error', __('app.model.error', ['model' => __('page.model')]));
        }

        return redirect()->route('pages.index')->with('success', __('app.model.created', ['model' => $page->title]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return View
     */
    public function edit(Page $page) : View
    {
        return view('backend.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Page $page
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Page $page, HtmlSanitizerService $sanitizer) : RedirectResponse
    {
        $data = $request->validate([
            'is_featured' => ['present', 'boolean',],
            'title' => ['required', 'string', 'min:3', 'max:100',],
            'main_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'content' => ['required', 'string', 'min:100', 'max:4294967296',],
        ],[], [
            'is_featured' => __('page.label.is_featured'),
            'title' => __('page.label.title'),
            'main_image' => __('page.label.main_image'),
            'content' => __('page.label.content'),
        ]);

        try {
            if ($request->input('is_featured')) {
                Page::where('is_featured', true)->update(['is_featured' => false]);
                $data['is_featured'] = true;
            }

            if ($request->hasFile('main_image')) {
                if ($page->main_image) {
                    Storage::disk('public')->delete($page->main_image);
                }

                $data['content'] = $sanitizer->sanitize($data['content']);

                $data['main_image'] = $request->file('main_image')->store('page-images', 'public');
            }

            $page->update($data);

        } catch (Exception $e) {
            logger($e);
            return redirect()->back()->with('error', __('app.model.error', ['model' => $page->title]));
        }

        return redirect()->route('pages.index')->with('success',  __('app.model.updated', ['model' => $page->title]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return RedirectResponse
     */
    public function destroy(Page $page): RedirectResponse
    {
        $title = $page->title;
        $page->delete();

        return redirect()->route('pages.index')->with('success', __('app.model.deleted', ['model' => $title]));
    }

    /**
     * Handle the CKEditor image upload request and store the uploaded image.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $image = $request->file('upload');
        $path = $image->store('images', 'public');

        return response()->json([
            'url' => asset('storage/' . $path),
        ]);
    }
}
