<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\District;

class Province extends Model
{
    use HasFactory;

    /**
     * Get all of the comments for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function district()
    {
        return $this->hasMany(District::class, 'id', 'province_id');
    }
}
