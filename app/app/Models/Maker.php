<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Maker extends Model
{
    protected $fillable = [
        'name'
    ];

    public function parts():HasMany
    {
        return $this->hasMany(Part::class);
    }
}
