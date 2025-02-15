<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $image_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */

class WikiPage extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
