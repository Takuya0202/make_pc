<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PcList extends Model
{
    protected $table = 'pc_lists';

    protected $fillable = [
        'user_id',
        'name',
        'price',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parts():BelongsToMany
    {
        return $this->belongsToMany(Part::class,'pc_list_part')
        ->withPivot('quantity')
        ->withTimestamps();
    }
}
