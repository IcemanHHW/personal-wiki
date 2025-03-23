<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
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
     * @throws AuthorizationException
     */
    public function index() : View
    {
        $this->authorize(Page::class);

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
        $this->authorize('create', Page::class);

        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePageRequest $request
     * @param HtmlSanitizerService $sanitizer
     * @return RedirectResponse
     */
    public function store(StorePageRequest $request, HtmlSanitizerService $sanitizer) : RedirectResponse
    {
        $this->authorize('create', Page::class);

        try {
            $data = $request->validated();

            if ($request->input('is_featured')) {
                Page::where('is_featured', true)->update(['is_featured' => false]);
                $data['is_featured'] = true;
            }

            $data['content'] = $sanitizer->sanitize($data['content']);
            $data['main_image'] = $this->handleMainImageUpload($request);

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
        $this->authorize('update', $page);

        return view('backend.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePageRequest $request
     * @param Page $page
     * @param HtmlSanitizerService $sanitizer
     * @return RedirectResponse
     */
    public function update(UpdatePageRequest $request, Page $page, HtmlSanitizerService $sanitizer) : RedirectResponse
    {
        $this->authorize('update', $page);

        try {
            $data = $request->validated();

            if ($request->input('is_featured')) {
                Page::where('is_featured', true)->update(['is_featured' => false]);
                $data['is_featured'] = true;
            }

            $data['content'] = $sanitizer->sanitize($data['content']);
            $data['main_image'] = $this->handleMainImageUpload($request, $page);

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
        $this->authorize('delete', $page);

        $title = $page->title;
        $page->delete();

        return redirect()->route('pages.index')->with('success', __('app.model.deleted', ['model' => $title]));
    }

    /**
     * Handle image upload and replace if needed.
     *
     * @param Request $request
     * @param Page|null $page
     * @return string|null
     */
    private function handleMainImageUpload(Request $request, ?Page $page = null): ?string
    {
        if ($request->hasFile('main_image')) {
            if ($page && $page->main_image) {
                Storage::disk('public')->delete($page->main_image);
            }
            return $request->file('main_image')->store('page-images', 'public');
        }

        return $page?->main_image;
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
