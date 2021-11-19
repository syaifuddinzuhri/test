<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Junk extends Model
{
    protected $fillable = [
        'id',
        'category_id',
        'name',
        'weight',
        'price'
    ];

    /**
     * Get the user that owns the Junk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
