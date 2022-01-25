<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Tag;
use App\Models\Category;

class Relic extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

    protected $guarded = [];

    protected $casts = [        
        'category' => 'array',
        'rate' => 'array',
        'tag' => 'array',
        'image' => 'array',
        'document' => 'array',
    ];

    /**
     * Get the user that owns the Relic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gettag()
    {
        return $this->belongsToJson('App\Models\Tag', 'tag');
    }

    public function getcategory()
    {
        return $this->belongsToJson('App\Models\Category', 'category');
    }

    public function getrate()
    {
        return $this->belongsToJson('App\Models\Rank', 'rate');
    }
}
