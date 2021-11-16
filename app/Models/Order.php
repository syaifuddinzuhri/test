<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'buyer_id',
        'junk_id',
        'status'
    ];

    /**
     * Get the buyer that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
}
