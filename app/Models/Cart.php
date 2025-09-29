<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * Get the user that owns the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function myuser(){
        return $this->belongsTo(User::class, 'userid');
    }

    /**
     * Get the product that owns the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function myproduct(){
        return $this->belongsTo(Product::class, 'productid');
    }
}
