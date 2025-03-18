<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Part extends Model
{
    protected $fillable = [
        'img',
        'name',
        'detail',
        'price',
        'url',
        'category',
    ];

    public function reviews():HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function pcLists():BelongsToMany
    {
        return $this->belongsToMany(PcList::class)->withPivot('quantity');
    }
}
