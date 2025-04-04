<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Part extends Model
{
    protected $fillable = [
        'image',
        'name',
        'detail',
        'price',
        'url',
        'category_id',
        'maker_id',
    ];

    public function reviews():HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function averageRatings()
    {
        return $this->reviews()->avg('rating');
    }

    public function pcLists():BelongsToMany
    {
        return $this->belongsToMany(PcList::class)->withPivot('quantity');
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function maker():BelongsTo
    {
        return $this->belongsTo(Maker::class);
    }
}
