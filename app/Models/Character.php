<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Relic;

class Character extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [        
        'image' => 'array',
        'document' => 'array',
    ];

    /**
     * Get the user associated with the Artifact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function relic()
    {
        return $this->hasOne(Relic::class, 'id', 'relic_id');
    }
}
