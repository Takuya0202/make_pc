<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PcListPart extends Model
{
    protected $fillable = [
        'name',
        'price',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parts():BelongsToMany
    {
        return $this->belongsToMany(Part::class);
    }
}
