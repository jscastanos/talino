<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Model;
use App\Models\News;

class Category extends Model
{
    use HasSlug;

    protected $fillable = [
        'published',
        'name',
        'badge_color'
    ];

    public $slugAttributes = [
        'name',
    ];

    public function news()
    {
        return $this->hasMany(News::class)
                    ->select(['id', 'title', 'created_at']);
    }
}
