<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Model;

class Branch extends Model
{
    use HasSlug;

    protected $fillable = [
        'published',
        'name',
    ];

    public $slugAttributes = [
        'name',
    ];

}
