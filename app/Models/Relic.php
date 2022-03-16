<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use App\Models\Festival;
use App\Models\Artifact;
use App\Models\Character;

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

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

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

    public function getfestival()
    {
        $festivals = Festival::where('relic_id', $this->id)->orderby('id', 'DESC')->get();
        return $festivals;
    }

    public function getartifact()
    {
        $artifacs = Artifact::where('relic_id', $this->id)->orderby('id', 'DESC')->get();
        return $artifacs;
    }

    public function getcharacter()
    {
        $characters = Character::where('relic_id', $this->id)->orderby('id', 'DESC')->get();
        return $characters;
    }
}
