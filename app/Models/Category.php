<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Model;

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

}
