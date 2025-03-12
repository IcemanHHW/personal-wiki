<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class WikiController extends Controller
{
    /**
     * Display the homepage with featured and latest wiki pages.
     * @return View
     */
    public function index(): View
    {
        $featuredPage = Cache::remember('featured_page', now()->addMinutes(10), function () {
            return Page::query()->featured()->first();
        });

        $latestPages = Cache::remember('latest_pages', now()->addMinutes(10), function () {
            return Page::query()->latest()->take(3)->get();
        });

        return view('site.index', compact('featuredPage', 'latestPages'));
    }

    /**
     * Display an individual wiki page
     * @param Page $page
     * @return View
     */
    public function show(Page $page): View
    {
        return view('site.show', compact('page'));
    }
}
