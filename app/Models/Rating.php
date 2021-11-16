<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'id',
        'seller_id',
        'buyer_id',
        'star',
        'comment'
    ];

    /**
     * Get the seller that owns the Rating
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    /**
     * Get the buyer that owns the Rating
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
}
