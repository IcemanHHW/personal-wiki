<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $main_image
 * @property boolean $is_featured
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */

class Page extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function boot(): void
    {
        parent::boot();

        static::created(function() {
            Cache::forget('latest_pages');
        });

        static::saving(function (self $page) {
            if ($page->isDirty('title')) {
                $page->slug = static::generateUniqueSlug($page->title, $page->id);
            }
            if ($page->isDirty('is_featured')) {
                Cache::forget('featured_page');
            }
        });

        static::deleting(function(self $page) {
            Storage::disk('public')->delete($page->main_image);
        });
    }

    /**
     * Generate a unique slug based on the title and existing slugs
     *
     * @param string $title
     * @param int|null $pageId
     * @return string
     */
    protected static function generateUniqueSlug(string $title, int $pageId = null): string
    {
        $slug = Str::slug($title);
        $query = static::where('slug', 'LIKE', "{$slug}%");

        if ($pageId) {
            $query->where('id', '!=', $pageId);
        }

        $count = $query->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Scope a query to only include the featured article.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeFeatured(Builder $query) : Builder
    {
        return $query->where('is_featured', true);
    }

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
